<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionnaire de Stock</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config = { theme: { extend: { colors: { primary: '#3B82F6', secondary: '#10B981' }, borderRadius: { 'none': '0px', 'sm': '4px', DEFAULT: '8px', 'md': '12px', 'lg': '16px', 'xl': '20px', '2xl': '24px', '3xl': '32px', 'full': '9999px', 'button': '8px' } } } }</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }

        .overlay {
            transition: opacity 0.3s ease-in-out;
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div id="sidebar"
            class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform -translate-x-full sidebar-transition lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex flex-col h-full">
                <!-- Header -->
                <div class="flex items-center justify-between p-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                            <span class="text-white font-['Pacifico'] text-sm">L</span>
                        </div>
                        <span class="font-['Pacifico'] text-primary text-lg">Logo</span>
                    </div>
                    <button id="closeSidebar" class="lg:hidden w-6 h-6 flex items-center justify-center cursor-pointer">
                        <i class="ri-close-line text-gray-600"></i>
                    </button>
                </div>
                <!-- User Profile -->
                <div class="p-4 border-b border-gray-200">
                    <div class="flex items-center space-x-3">
                        <div
                            class="w-10 h-10 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center">
                            <span class="text-white font-semibold text-sm">JD</span>
                        </div>
                        <div>
                            <p class="font-medium text-gray-900 text-sm">Jean Dupont</p>
                            <p class="text-xs text-gray-500">Gestionnaire</p>
                        </div>
                    </div>
                </div>
                <!-- Navigation Menu -->
                <nav class="flex-1 overflow-y-auto p-4">
                    <ul class="space-y-2">
                        <li>
                            <a href="#"
                                class="nav-item active flex items-center space-x-3 px-3 py-2 rounded-lg bg-primary text-white cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-dashboard-line"></i>
                                </div>
                                <span class="text-sm font-medium">Tableau de bord</span>
                            </a>
                        </li>
                        <li class="pt-4">
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Gestion</p>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-item flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-archive-line"></i>
                                </div>
                                <span class="text-sm font-medium">Liste des stocks</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-item flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-grid-line"></i>
                                </div>
                                <span class="text-sm font-medium">Catégories</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-item flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-map-pin-line"></i>
                                </div>
                                <span class="text-sm font-medium">Emplacements</span>
                            </a>
                        </li>
                        <li class="pt-4">
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Analyses</p>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-item flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-bar-chart-line"></i>
                                </div>
                                <span class="text-sm font-medium">Statistiques</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-item flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-file-chart-line"></i>
                                </div>
                                <span class="text-sm font-medium">Rapports</span>
                            </a>
                        </li>
                        <li class="pt-4">
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Mouvements</p>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-item flex items-center justify-between px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center space-x-3">
                                    <div class="w-5 h-5 flex items-center justify-center">
                                        <i class="ri-arrow-down-line text-secondary"></i>
                                    </div>
                                    <span class="text-sm font-medium">Entrées</span>
                                </div>
                                <span class="bg-secondary text-white text-xs px-2 py-1 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-item flex items-center justify-between px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 cursor-pointer">
                                <div class="flex items-center space-x-3">
                                    <div class="w-5 h-5 flex items-center justify-center">
                                        <i class="ri-arrow-up-line text-red-500"></i>
                                    </div>
                                    <span class="text-sm font-medium">Sorties</span>
                                </div>
                                <span class="bg-red-500 text-white text-xs px-2 py-1 rounded-full">8</span>
                            </a>
                        </li>
                        <li class="pt-4">
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Système</p>
                        </li>
                        <li>
                            <a href="#"
                                class="nav-item flex items-center space-x-3 px-3 py-2 rounded-lg text-gray-700 hover:bg-gray-100 cursor-pointer">
                                <div class="w-5 h-5 flex items-center justify-center">
                                    <i class="ri-settings-line"></i>
                                </div>
                                <span class="text-sm font-medium">Paramètres</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Footer -->
                <div class="p-4 border-t border-gray-200">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-xs text-gray-500">Version 2.1.0</span>
                        <div class="w-2 h-2 bg-secondary rounded-full"></div>
                    </div>
                    <button
                        class="w-full flex items-center justify-center space-x-2 px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg text-gray-700 cursor-pointer !rounded-button">
                        <div class="w-4 h-4 flex items-center justify-center">
                            <i class="ri-logout-box-line"></i>
                        </div>
                        <span class="text-sm font-medium">Déconnexion</span>
                    </button>
                </div>
            </div>
        </div>
        <!-- Overlay -->
        <div id="overlay"
            class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden opacity-0 pointer-events-none overlay"></div>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-3 lg:px-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <button id="openSidebar"
                            class="lg:hidden w-8 h-8 flex items-center justify-center cursor-pointer">
                            <i class="ri-menu-line text-gray-600 text-xl"></i>
                        </button>
                        <div class="hidden lg:block">
                            <nav class="flex items-center space-x-2 text-sm text-gray-500">
                                <span>Accueil</span>
                                <i class="ri-arrow-right-s-line"></i>
                                <span class="text-gray-900 font-medium">Tableau de bord</span>
                            </nav>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <button class="w-8 h-8 flex items-center justify-center cursor-pointer">
                                <i class="ri-notification-line text-gray-600 text-xl"></i>
                            </button>
                            <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></div>
                        </div>
                        <div
                            class="w-8 h-8 bg-gradient-to-br from-primary to-secondary rounded-full flex items-center justify-center cursor-pointer">
                            <span class="text-white font-semibold text-sm">JD</span>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main Content Area -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-4 lg:p-6">
                <!-- Dashboard Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900 mb-2">Tableau de bord</h1>
                    <p class="text-gray-600">Aperçu de votre inventaire et des mouvements récents</p>
                </div>
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Stock total</p>
                                <p class="text-2xl font-bold text-gray-900">2,847</p>
                                <p class="text-sm text-secondary font-medium">+12% ce mois</p>
                            </div>
                            <div class="w-12 h-12 bg-primary bg-opacity-10 rounded-lg flex items-center justify-center">
                                <i class="ri-archive-fill text-primary text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Entrées aujourd'hui</p>
                                <p class="text-2xl font-bold text-gray-900">156</p>
                                <p class="text-sm text-secondary font-medium">+8% vs hier</p>
                            </div>
                            <div
                                class="w-12 h-12 bg-secondary bg-opacity-10 rounded-lg flex items-center justify-center">
                                <i class="ri-arrow-down-fill text-secondary text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Sorties aujourd'hui</p>
                                <p class="text-2xl font-bold text-gray-900">89</p>
                                <p class="text-sm text-red-500 font-medium">-3% vs hier</p>
                            </div>
                            <div class="w-12 h-12 bg-red-50 rounded-lg flex items-center justify-center">
                                <i class="ri-arrow-up-fill text-red-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-600">Valeur totale</p>
                                <p class="text-2xl font-bold text-gray-900">Ar 181,920,000</p>
                                <p class="text-sm text-secondary font-medium">+15% ce mois</p>
                            </div>
                            <div class="w-12 h-12 bg-yellow-50 rounded-lg flex items-center justify-center">
                                <i class="ri-money-euro-circle-fill text-yellow-500 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Quick Actions -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions rapides</h3>
                        <div class="grid grid-cols-2 gap-4">
                            <button
                                class="flex flex-col items-center p-4 bg-secondary bg-opacity-10 rounded-lg hover:bg-opacity-20 transition-colors cursor-pointer !rounded-button">
                                <div class="w-10 h-10 bg-secondary rounded-lg flex items-center justify-center mb-2">
                                    <i class="ri-add-line text-white text-lg"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-900">Nouvelle entrée</span>
                            </button>
                            <button
                                class="flex flex-col items-center p-4 bg-red-50 rounded-lg hover:bg-red-100 transition-colors cursor-pointer !rounded-button">
                                <div class="w-10 h-10 bg-red-500 rounded-lg flex items-center justify-center mb-2">
                                    <i class="ri-subtract-line text-white text-lg"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-900">Nouvelle sortie</span>
                            </button>
                            <button
                                class="flex flex-col items-center p-4 bg-primary bg-opacity-10 rounded-lg hover:bg-opacity-20 transition-colors cursor-pointer !rounded-button">
                                <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center mb-2">
                                    <i class="ri-search-line text-white text-lg"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-900">Rechercher</span>
                            </button>
                            <button
                                class="flex flex-col items-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition-colors cursor-pointer !rounded-button">
                                <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center mb-2">
                                    <i class="ri-file-chart-line text-white text-lg"></i>
                                </div>
                                <span class="text-sm font-medium text-gray-900">Rapport</span>
                            </button>
                        </div>
                    </div>
                    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Stock faible</h3>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-3 bg-red-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                                        <i class="ri-alert-line text-red-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 text-sm">Ordinateur portable Dell</p>
                                        <p class="text-xs text-gray-500">Stock: 3 unités</p>
                                    </div>
                                </div>
                                <span class="text-xs bg-red-500 text-white px-2 py-1 rounded-full">Critique</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-yellow-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                                        <i class="ri-error-warning-line text-yellow-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 text-sm">Souris sans fil Logitech</p>
                                        <p class="text-xs text-gray-500">Stock: 8 unités</p>
                                    </div>
                                </div>
                                <span class="text-xs bg-yellow-500 text-white px-2 py-1 rounded-full">Faible</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-orange-50 rounded-lg">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-orange-100 rounded-lg flex items-center justify-center">
                                        <i class="ri-information-line text-orange-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900 text-sm">Clavier mécanique</p>
                                        <p class="text-xs text-gray-500">Stock: 12 unités</p>
                                    </div>
                                </div>
                                <span class="text-xs bg-orange-500 text-white px-2 py-1 rounded-full">Attention</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Recent Movements -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100">
                    <div class="p-6 border-b border-gray-100">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-gray-900">Mouvements récents</h3>
                            <button class="text-primary hover:text-primary-dark font-medium text-sm cursor-pointer">Voir
                                tout</button>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="w-10 h-10 bg-secondary bg-opacity-10 rounded-lg flex items-center justify-center">
                                        <i class="ri-arrow-down-line text-secondary"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Entrée - Écran Samsung 24"</p>
                                        <p class="text-sm text-gray-500">Aujourd'hui à 14:30 • Quantité: +15</p>
                                    </div>
                                </div>
                                <span class="text-secondary font-semibold">+Ar 9,000,000</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                                        <i class="ri-arrow-up-line text-red-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Sortie - Imprimante HP LaserJet</p>
                                        <p class="text-sm text-gray-500">Aujourd'hui à 11:15 • Quantité: -3</p>
                                    </div>
                                </div>
                                <span class="text-red-500 font-semibold">-Ar 1,800,000</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <div
                                        class="w-10 h-10 bg-secondary bg-opacity-10 rounded-lg flex items-center justify-center">
                                        <i class="ri-arrow-down-line text-secondary"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Entrée - Tablette iPad Pro</p>
                                        <p class="text-sm text-gray-500">Hier à 16:45 • Quantité: +8</p>
                                    </div>
                                </div>
                                <span class="text-secondary font-semibold">+Ar 19,200,000</span>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-red-50 rounded-lg flex items-center justify-center">
                                        <i class="ri-arrow-up-line text-red-500"></i>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">Sortie - Casque audio Sony</p>
                                        <p class="text-sm text-gray-500">Hier à 09:20 • Quantité: -12</p>
                                    </div>
                                </div>
                                <span class="text-red-500 font-semibold">-Ar 7,200,000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <!-- FAB Button with Menu -->
    <div class="fixed bottom-6 right-6 z-30">
        <div id="fabMenu"
            class="absolute bottom-16 right-0 mb-2 bg-white rounded-lg shadow-xl scale-0 origin-bottom-right transition-transform duration-200 ease-in-out">
            <div class="py-2 w-64">
                <a href="https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/9ff5d53c-b8b9-460d-8da0-39cd03dfdc29"
                    data-readdy="true"
                    class="w-full px-4 py-2 flex items-center space-x-3 hover:bg-gray-100 transition-colors">
                    <div class="w-8 h-8 bg-secondary rounded-lg flex items-center justify-center">
                        <i class="ri-add-line text-white"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Nouvelle entrée de stock</span>
                </a>
                <a href="https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/1da87392-c740-4a6c-b6f3-a9889a239dd5"
                    data-readdy="true"
                    class="w-full px-4 py-2 flex items-center space-x-3 hover:bg-gray-100 transition-colors">
                    <div class="w-8 h-8 bg-red-500 rounded-lg flex items-center justify-center">
                        <i class="ri-subtract-line text-white"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Nouvelle sortie de stock</span>
                </a>
                <a href="https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/ba07a56e-80ea-4040-893e-c46f1d1e4b74"
                    data-readdy="true"
                    class="w-full px-4 py-2 flex items-center space-x-3 hover:bg-gray-100 transition-colors">
                    <div class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center">
                        <i class="ri-shopping-bag-line text-white"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Ajouter un produit</span>
                </a>
                <button class="w-full px-4 py-2 flex items-center space-x-3 hover:bg-gray-100 transition-colors">
                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                        <i class="ri-folder-add-line text-white"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-900">Créer une catégorie</span>
                </button>
            </div>
        </div>
        <button id="fabButton"
            class="w-14 h-14 bg-primary hover:bg-primary-dark shadow-lg rounded-full flex items-center justify-center cursor-pointer !rounded-button transition-transform duration-200">
            <i class="ri-add-fill text-white text-2xl"></i>
        </button>
    </div>
    <script id="sidebar-toggle">
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const openSidebar = document.getElementById('openSidebar');
            const closeSidebar = document.getElementById('closeSidebar');
            function showSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('opacity-0', 'pointer-events-none');
            }
            function hideSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0', 'pointer-events-none');
            }
            openSidebar.addEventListener('click', showSidebar);
            closeSidebar.addEventListener('click', hideSidebar);
            overlay.addEventListener('click', hideSidebar);
        });
    </script>
    <script id="navigation-handler">
        document.addEventListener('DOMContentLoaded', function () {
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    navItems.forEach(nav => {
                        nav.classList.remove('active', 'bg-primary', 'text-white');
                        nav.classList.add('text-gray-700', 'hover:bg-gray-100');
                    });
                    this.classList.add('active', 'bg-primary', 'text-white');
                    this.classList.remove('text-gray-700', 'hover:bg-gray-100');
                    if (window.innerWidth < 1024) {
                        const sidebar = document.getElementById('sidebar');
                        const overlay = document.getElementById('overlay');
                        sidebar.classList.add('-translate-x-full');
                        overlay.classList.add('opacity-0', 'pointer-events-none');
                    }
                });
            });
        });
    </script>
    <script id="responsive-handler">
        document.addEventListener('DOMContentLoaded', function () {
            function handleResize() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    overlay.classList.add('opacity-0', 'pointer-events-none');
                } else {
                    sidebar.classList.add('-translate-x-full');
                    overlay.classList.add('opacity-0', 'pointer-events-none');
                }
            }
            window.addEventListener('resize', handleResize);
            handleResize();
        });
    </script>
    <script id="fab-handler">
        document.addEventListener('DOMContentLoaded', function () {
            const fabButton = document.getElementById('fabButton');
            const fabMenu = document.getElementById('fabMenu');
            let isMenuOpen = false;
            function toggleMenu() {
                isMenuOpen = !isMenuOpen;
                if (isMenuOpen) {
                    fabMenu.classList.remove('scale-0');
                    fabMenu.classList.add('scale-100');
                    fabButton.style.transform = 'rotate(45deg)';
                } else {
                    fabMenu.classList.remove('scale-100');
                    fabMenu.classList.add('scale-0');
                    fabButton.style.transform = 'rotate(0)';
                }
            }
            fabButton.addEventListener('click', toggleMenu);
            document.addEventListener('click', function (event) {
                const isClickInside = fabButton.contains(event.target) || fabMenu.contains(event.target);
                if (!isClickInside && isMenuOpen) {
                    toggleMenu();
                }
            });
        });
    </script>
</body>

</html>