<nav class="fixed top-0 w-full bg-primary z-50 px-4 py-4 flex items-center justify-between">
    <div class="flex items-center space-x-3" id="menuBurger">
        <div class="w-6 h-6 flex items-center justify-center cursor-pointer hidden" id="goBack">
            <i class="ri-arrow-left-line text-white text-lg"></i>
        </div>
        <div class="w-6 h-6 flex items-center justify-center cursor-pointer">
            <i class="ri-menu-line text-white text-lg"></i>
        </div>
    </div>
    <h1 class="text-white text-lg font-medium"><?= isset($header_title) ? $header_title : "Gestion de Stock" ?></h1>
    <div class="flex items-center space-x-3">
        <div class="relative cursor-pointer">
            <div class="w-6 h-6 flex items-center justify-center">
                <i class="ri-notification-line text-white text-lg"></i>
            </div>
            <div class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full flex items-center justify-center">
                <span class="text-white text-xs">1</span>
            </div>
        </div>
        <div class="w-8 h-8 bg-white rounded-full cursor-pointer"></div>
    </div>
</nav>

<div id="sideMenu" class="fixed inset-0 z-50 transform -translate-x-full transition-transform duration-300">
    <div class="absolute inset-0 bg-black bg-opacity-50" id="menuOverlay"></div>
    <div class="relative bg-white w-80 h-full shadow-xl">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Menu</h2>
                <button id="closeMenu" class="w-8 h-8 flex items-center justify-center cursor-pointer">
                    <i class="ri-close-line text-gray-500 text-xl"></i>
                </button>
            </div>
        </div>
        <div class="p-4">
            <div class="space-y-2">
                <a href="javascript:void(0)" @click="page='dashboard'"
                    :class="[
                                'flex items-center px-4 py-3 rounded-lg cursor-pointer',
                                page === 'dashboard' ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100'
                            ]">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i :class="page === 'dashboard' ? 'ri-dashboard-line text-white' : 'ri-dashboard-line text-gray-500'"></i>
                    </div>
                    <span>Dashboard</span>
                </a>

                <a href="javascript:void(0)" @click="page='add-category'"
                    :class="[
                                'flex items-center px-4 py-3 rounded-lg cursor-pointer',
                                page === 'add-category' ? 'bg-primary text-white' : 'text-gray-700 hover:bg-gray-100'
                            ]">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i :class="page === 'add-category' ? 'ri-add-box-line text-white' : 'ri-add-box-line text-gray-500'"></i>
                    </div>
                    <span>Categories</span>
                </a>
                <div class="menu-section">
                    <button
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-gray-100 cursor-pointer">
                        <div class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-product-hunt-line text-gray-500"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Produit</span>
                        </div>
                        <i class="ri-arrow-down-s-line transition-transform"></i>
                    </button>

                    <div class="submenu pl-6" :class="{
                                'active': page === 'all-products' || page === 'add-product'
                            }">
                        <a href="javascript:void(0)" @click="page='all-products'"
                            :class="[
                                    'block py-2 px-4 text-sm rounded-md',
                                    page === 'all-products' ? 'bg-primary text-white' : 'text-gray-600 hover:text-primary'
                                ]">
                            List
                        </a>

                        <a href="javascript:void(0)" @click="page='add-product'"
                            :class="[
                                    'block py-2 px-4 text-sm rounded-md',
                                    page === 'add-product' ? 'bg-primary text-white' : 'text-gray-600 hover:text-primary'
                                ]">
                            Ajouter
                        </a>
                    </div>
                </div>
                <div class="menu-section">
                    <button
                        class="w-full flex items-center justify-between px-4 py-3 rounded-lg hover:bg-gray-100 cursor-pointer">
                        <div class="flex items-center">
                            <div class="w-5 h-5 flex items-center justify-center">
                                <i class="ri-store-line text-gray-500"></i>
                            </div>
                            <span class="ml-3 text-gray-700">Stock</span>
                        </div>
                        <i class="ri-arrow-down-s-line transition-transform"></i>
                    </button>

                    <div class="submenu pl-6" :class="{
                                'active': page === 'all-stocks' || page === 'stock-in' || page === 'stock-out'
                            }">
                        <a href="javascript:void(0)" @click="page='all-stocks'"
                            :class="[
                                'block py-2 px-4 text-sm rounded-md',
                                page === 'all-stocks' ? 'bg-primary text-white' : 'text-gray-600 hover:text-primary'
                            ]">          
                            List
                        </a>

                        <a href="javascript:void(0)" @click="page='stock-in'"
                            :class="[
                                    'block py-2 px-4 text-sm rounded-md',
                                    page === 'stock-in' ? 'bg-primary text-white' : 'text-gray-600 hover:text-primary'
                                ]">
                            Nouvelle entrée
                        </a>

                        <a href="javascript:void(0)" @click="page='stock-out'"
                            :class="[
                                    'block py-2 px-4 text-sm rounded-md',
                                    page === 'stock-out' ? 'bg-primary text-white' : 'text-gray-600 hover:text-primary'
                                ]">
                            Nouvelle sortie
                        </a>
                    </div>
                </div>
                <div class="border-t border-gray-200 mt-4 pt-4">
                    <a href="javascript:void(0);"
                        class="flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg cursor-pointer"
                        id="logoutButton">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-logout-box-line text-red-600"></i>
                        </div>
                        <span>Se déconnecter</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="page-loader"
    class="fixed inset-0 z-50 flex items-center justify-center bg-black/10 backdrop-blur-sm hidden">
    <div class="w-12 h-12 border-4 border-gray-300 border-t-blue-600 rounded-full animate-spin"></div>
</div>