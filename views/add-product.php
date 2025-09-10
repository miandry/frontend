<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit - Gestionnaire de Stock</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#10B981'
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

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
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-3 sticky top-0 z-20">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2"
                        data-readdy="true"
                        class="w-8 h-8 flex items-center justify-center cursor-pointer hover:bg-gray-100 rounded-lg transition-colors">
                        <i class="ri-arrow-left-line text-gray-600 text-xl"></i>
                    </a>
                    <h1 class="text-lg font-semibold text-gray-900">Ajouter un produit</h1>
                </div>
                <div
                    class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center cursor-pointer">
                    <span class="text-white font-semibold text-sm">JD</span>
                </div>
            </div>
        </header>
        <!-- Main Content -->
        <main class="flex-1 px-4 py-6">
            <form id="productForm" class="space-y-6">
                <!-- Image Upload -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <label class="block text-sm font-medium text-gray-700 mb-3">Image du produit</label>
                    <div class="relative">
                        <input type="file" id="productImage" accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer">
                        <div id="imagePreview"
                            class="w-full h-48 bg-gray-50 border-2 border-dashed border-gray-300 rounded-lg image-upload-area flex flex-col items-center justify-center cursor-pointer hover:bg-gray-100 transition-colors">
                            <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center mb-3">
                                <i class="ri-camera-line text-gray-500 text-xl"></i>
                            </div>
                            <p class="text-sm font-medium text-gray-700 mb-1">Ajouter une photo</p>
                            <p class="text-xs text-gray-500">PNG, JPG jusqu'à 10MB</p>
                        </div>
                    </div>
                </div>
                <!-- Product Information -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations du produit</h3>
                    <div class="space-y-4">
                        <!-- Product Name -->
                        <div>
                            <label for="productName" class="block text-sm font-medium text-gray-700 mb-2">Nom du produit
                                *</label>
                            <input type="text" id="productName" name="productName" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg form-input text-sm"
                                placeholder="Ex: MacBook Pro 13 pouces">
                        </div>
                        <!-- Description -->
                        <div>
                            <label for="productDescription"
                                class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                            <textarea id="productDescription" name="productDescription" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg form-input text-sm resize-none"
                                placeholder="Description détaillée du produit..."></textarea>
                        </div>
                        <!-- Category -->
                        <div class="relative">
                            <label for="productCategory" class="block text-sm font-medium text-gray-700 mb-2">Catégorie
                                *</label>
                            <div class="relative">
                                <button type="button" id="categoryButton"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg form-input text-sm text-left bg-white flex items-center justify-between cursor-pointer">
                                    <span id="categoryText" class="text-gray-500">Sélectionner une catégorie</span>
                                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                                </button>
                                <div id="categoryDropdown"
                                    class="absolute top-full left-0 right-0 mt-1 bg-white border border-gray-300 rounded-lg shadow-lg z-10 hidden dropdown-menu">
                                    <div class="py-2">
                                        <button type="button"
                                            class="category-option w-full px-4 py-2 text-left text-sm hover:bg-gray-100 cursor-pointer"
                                            data-value="electronique">Électronique</button>
                                        <button type="button"
                                            class="category-option w-full px-4 py-2 text-left text-sm hover:bg-gray-100 cursor-pointer"
                                            data-value="informatique">Informatique</button>
                                        <button type="button"
                                            class="category-option w-full px-4 py-2 text-left text-sm hover:bg-gray-100 cursor-pointer"
                                            data-value="mobilier">Mobilier</button>
                                        <button type="button"
                                            class="category-option w-full px-4 py-2 text-left text-sm hover:bg-gray-100 cursor-pointer"
                                            data-value="fournitures">Fournitures</button>
                                        <button type="button"
                                            class="category-option w-full px-4 py-2 text-left text-sm hover:bg-gray-100 cursor-pointer"
                                            data-value="equipement">Équipement</button>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" id="selectedCategory" name="category" required>
                        </div>
                    </div>
                </div>
                <!-- Pricing -->
                <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Prix</h3>
                    <div>
                        <label for="unitPrice" class="block text-sm font-medium text-gray-700 mb-2">Prix unitaire (Ar)
                            *</label>
                        <div class="relative">
                            <input type="number" id="unitPrice" name="unitPrice" required min="0" step="100"
                                class="w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg form-input text-sm"
                                placeholder="0">
                            <div class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">Ar
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
        <!-- Action Buttons -->
        <div class="sticky bottom-0 bg-white border-t border-gray-200 px-4 py-4">
            <div class="flex space-x-3">
                <button type="button" id="cancelButton"
                    class="flex-1 px-6 py-3 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-colors cursor-pointer !rounded-button">
                    Annuler
                </button>
                <button type="submit" form="productForm" id="saveButton"
                    class="flex-1 px-6 py-3 bg-primary text-white font-medium rounded-lg hover:bg-blue-600 transition-colors cursor-pointer !rounded-button">
                    Enregistrer
                </button>
            </div>
        </div>
    </div>
    <script id="image-upload-handler">
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('productImage');
            const imagePreview = document.getElementById('imagePreview');
            imageInput.addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.innerHTML = `
<img src="${e.target.result}" alt="Aperçu du produit" class="w-full h-full object-cover rounded-lg">
<div class="absolute inset-0 bg-black bg-opacity-40 rounded-lg flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
<div class="text-white text-center">
<i class="ri-camera-line text-2xl mb-2"></i>
<p class="text-sm">Changer l'image</p>
</div>
</div>
`;
                        imagePreview.classList.remove('image-upload-area');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
    <script id="dropdown-handlers">
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButton = document.getElementById('categoryButton');
            const categoryDropdown = document.getElementById('categoryDropdown');
            const categoryText = document.getElementById('categoryText');
            const selectedCategory = document.getElementById('selectedCategory');
            const categoryOptions = document.querySelectorAll('.category-option');

            function toggleDropdown(dropdown, button) {
                const isHidden = dropdown.classList.contains('hidden');
                document.querySelectorAll('.dropdown-menu').forEach(menu => {
                    if (menu !== dropdown) {
                        menu.classList.add('hidden');
                    }
                });
                if (isHidden) {
                    dropdown.classList.remove('hidden');
                    button.querySelector('i').classList.add('rotate-180');
                } else {
                    dropdown.classList.add('hidden');
                    button.querySelector('i').classList.remove('rotate-180');
                }
            }
            categoryButton.addEventListener('click', function(e) {
                e.preventDefault();
                toggleDropdown(categoryDropdown, categoryButton);
            });
            categoryOptions.forEach(option => {
                option.addEventListener('click', function() {
                    const value = this.dataset.value;
                    const text = this.textContent;
                    categoryText.textContent = text;
                    categoryText.classList.remove('text-gray-500');
                    categoryText.classList.add('text-gray-900');
                    selectedCategory.value = value;
                    categoryDropdown.classList.add('hidden');
                    categoryButton.querySelector('i').classList.remove('rotate-180');
                });
            });
            document.addEventListener('click', function(e) {
                if (!categoryButton.contains(e.target) && !categoryDropdown.contains(e.target)) {
                    categoryDropdown.classList.add('hidden');
                    categoryButton.querySelector('i').classList.remove('rotate-180');
                }
            });
        });
    </script>
    <script id="form-validation">
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('productForm');
            const saveButton = document.getElementById('saveButton');
            const cancelButton = document.getElementById('cancelButton');
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const formData = new FormData(form);
                const productName = formData.get('productName');
                const category = formData.get('category');
                const unitPrice = formData.get('unitPrice');
                if (!productName || !category || !unitPrice) {
                    showNotification('Veuillez remplir tous les champs obligatoires.', 'error');
                    return;
                }
                saveButton.innerHTML = `
<div class="flex items-center justify-center space-x-2">
<div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
<span>Enregistrement...</span>
</div>
`;
                saveButton.disabled = true;
                setTimeout(() => {
                    showNotification('Produit ajouté avec succès !', 'success');
                    setTimeout(() => {
                        window.location.href = 'https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2';
                    }, 1500);
                }, 2000);
            });
            cancelButton.addEventListener('click', function() {
                if (confirm('Êtes-vous sûr de vouloir annuler ? Toutes les données saisies seront perdues.')) {
                    window.location.href = 'https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2';
                }
            });
            scanButton.addEventListener('click', function() {
                showNotification('Fonction de scan en cours de développement.', 'info');
            });

            function showNotification(message, type) {
                const notification = document.createElement('div');
                const bgColor = type === 'success' ? 'bg-secondary' : type === 'error' ? 'bg-red-500' : 'bg-primary';
                notification.className = `fixed top-4 left-4 right-4 ${bgColor} text-white px-4 py-3 rounded-lg shadow-lg z-50 transform -translate-y-full transition-transform duration-300`;
                notification.innerHTML = `
<div class="flex items-center space-x-3">
<i class="ri-${type === 'success' ? 'check' : type === 'error' ? 'error-warning' : 'information'}-line text-lg"></i>
<span class="text-sm font-medium">${message}</span>
</div>
`;
                document.body.appendChild(notification);
                setTimeout(() => {
                    notification.style.transform = 'translateY(0)';
                }, 100);
                setTimeout(() => {
                    notification.style.transform = 'translateY(-100%)';
                    setTimeout(() => {
                        document.body.removeChild(notification);
                    }, 300);
                }, 3000);
            }
        });
    </script>
    <script id="input-formatting">
        document.addEventListener('DOMContentLoaded', function() {
            const unitPriceInput = document.getElementById('unitPrice');
            unitPriceInput.addEventListener('input', function(e) {
                let value = e.target.value.replace(/[^\d]/g, '');
                if (value) {
                    value = parseInt(value).toLocaleString('fr-FR');
                }
            });
            unitPriceInput.addEventListener('blur', function(e) {
                let value = e.target.value.replace(/[^\d]/g, '');
                if (value) {
                    e.target.value = parseInt(value);
                }
            });
        });
    </script>
</body>

</html>