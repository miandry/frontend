<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Stock Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <script src="https://unpkg.com/vue@3/dist/vue.global.prod.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#6366f1',
                        secondary: '#e0e7ff'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        /* add product */
        .image-upload-area {
            background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="%23d1d5db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21,15 16,10 5,21"/></svg>');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 48px 48px;
        }

        .form-input {
            transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .form-input:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .dropdown-menu {
            max-height: 200px;
            overflow-y: auto;
        }

        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }

        .submenu.active {
            max-height: 200px;
        }

        .filter-panel {
            transform: translateY(-100%);
            transition: transform 0.3s ease-in-out;
        }

        .filter-panel.active {
            transform: translateY(0);
        }
    </style>
</head>

<body>
    <div id="app">
        <template v-if="isReady">
            <div v-if="!isLoggedIn">
                <div v-if="page === 'sign-in'">
                    <?php
                    $header_title = "Sign in";
                    include 'mobile/views/sign_in.php'; ?>
                </div>

                <div v-if="page === 'sign-up'">
                    <?php
                    $header_title = "Sign up";
                    include 'mobile/views/sign_up.php'; ?>
                </div>

                <div v-if="page === 'password-reset'">
                    <?php
                    $header_title = "Reset password";
                    include 'mobile/views/password_reset.php'; ?>
                </div>
            </div>
            <div v-else>
                <div v-if="page === 'dashboard'">
                    <?php
                    include 'mobile/views/dashboard.php'; ?>
                </div>
                <div v-if="page === 'add-product'">
                    <?php
                    include 'mobile/views/add-product.php'; ?>
                </div>
                <div v-if="page === 'all-products'">
                    <?php
                    include 'mobile/views/products.php'; ?>
                </div>
                <div v-if="page === 'add-category'">
                    <?php
                    include 'mobile/views/add-category.php'; ?>
                </div>
                <div v-if="page === 'stock-in'">
                    <?php
                    include 'mobile/views/stock_in.php'; ?>
                </div>
            </div>
        </template>
    </div>
    <script src="/mobile/assets/js/auth/menu.js"></script>

    <script>
        const {
            createApp
        } = Vue;

        window.app = createApp({
            data() {
                return {
                    page: 'sign-in',
                    history: [],
                    isLoggedIn: false,
                    isReady: false,
                };
            },
            created() {
                // Vérifier si l'utilisateur est connecté
                const userStr = sessionStorage.getItem("user");
                if (userStr) {
                    this.isLoggedIn = true;
                }

                // Récupérer la dernière page visitée
                const savedPage = sessionStorage.getItem("currentPage");
                if (savedPage) {
                    this.page = savedPage;
                } else {
                    this.page = this.isLoggedIn ? "dashboard" : "sign-in";
                }

                this.isReady = true;
            },
            mounted() {
                // this.loadFor(this.page);
                if (typeof initMenu === "function") {
                    initMenu();
                }
            },
            watch: {
                page(newPage, oldPage) {
                    if (oldPage && oldPage !== newPage) {
                        this.history.push(oldPage);
                    }
                    // Sauvegarder la page actuelle pour persistance
                    sessionStorage.setItem("currentPage", newPage);

                    this.$nextTick(() => {
                        this.loadFor(newPage);
                        if (typeof initMenu === "function") {
                            initMenu();
                        }
                    });
                }
            },
            methods: {
                goBack() {
                    if (this.history.length > 0) {
                        this.page = this.history.pop();
                        sessionStorage.setItem("currentPage", this.page); // mettre à jour la page courante
                    }
                },
                loadFor(page) {
                    const map = {
                        'dashboard': {
                            src: '/mobile/assets/js/auth/dashboard.js',
                            init: 'initDashboardPage'
                        },
                        'sign-in': {
                            src: '/mobile/assets/js/auth/sign-in.js',
                            init: 'initSignInPage'
                        },
                        'sign-up': {
                            src: '/mobile/assets/js/auth/sign-up.js',
                            init: 'initSignUpPage'
                        },
                        'password-reset': {
                            src: '/mobile/assets/js/auth/reset-password.js',
                            init: 'initResetPasswordPage'
                        },
                        'all-products': {
                            src: '/mobile/assets/js/product/products.js',
                            init: 'initProductsPage'
                        },
                        'add-product': {
                            src: '/mobile/assets/js/product/add-product.js',
                            init: 'initAddPage'
                        },
                        'add-category': {
                            src: '/mobile/assets/js/category/add-category.js',
                            init: 'initCategoryPage'
                        },
                        'stock-in': {
                            src: '/mobile/assets/js/stock/stock-in.js',
                            init: 'initStockInPage'
                        }
                    };

                    const config = map[page];
                    if (!config) return;

                    // Supprimer les anciens scripts dynamiques
                    document.querySelectorAll('script[data-page-script]').forEach(s => s.remove());

                    const script = document.createElement('script');
                    script.src = config.src;
                    script.defer = true;
                    script.setAttribute('data-page-script', page);

                    script.onload = () => {
                        if (typeof window[config.init] === "function") {
                            window[config.init]();
                        }
                        app.$nextTick(() => {
                            if (typeof initMenu === "function") {
                                initMenu();
                            }
                        });
                    };

                    document.body.appendChild(script);
                }
            }
        }).mount('#app');
    </script>
</body>

</html>