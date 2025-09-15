<nav class="fixed top-0 w-full bg-primary z-50 px-4 py-4 flex items-center justify-between">
    <div class="flex items-center space-x-3">
        <div class="w-6 h-6 flex items-center justify-center cursor-pointer" @click="goBack" v-if="history.length > 0">
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
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="ri-dashboard-line text-gray-500"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
                <a href="javascript:void(0)" @click="page='add-product'"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="ri-add-box-line text-gray-500"></i>
                    </div>
                    <span>Add product</span>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="ri-history-line text-gray-500"></i>
                    </div>
                    <span>History</span>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="ri-customer-service-line text-gray-500"></i>
                    </div>
                    <span>Support</span>
                </a>
                <a href="#"
                    class="flex items-center px-4 py-3 text-gray-700 hover:bg-gray-100 rounded-lg cursor-pointer">
                    <div class="w-5 h-5 flex items-center justify-center mr-3">
                        <i class="ri-settings-line text-gray-500"></i>
                    </div>
                    <span>Settings</span>
                </a>
                <div class="border-t border-gray-200 mt-4 pt-4">
                    <a href="javascript:void(0);"
                        class="flex items-center px-4 py-3 text-red-600 hover:bg-red-50 rounded-lg cursor-pointer"
                        id="logoutButton">
                        <div class="w-5 h-5 flex items-center justify-center mr-3">
                            <i class="ri-logout-box-line text-red-600"></i>
                        </div>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- <nav class="fixed bottom-0 w-full bg-white border-t border-gray-200 px-0 py-2 grid grid-cols-5">
    <div class="flex flex-col items-center justify-center py-2 cursor-pointer">
        <div class="w-6 h-6 flex items-center justify-center mb-1">
            <i class="ri-home-line text-gray-400 text-lg"></i>
        </div>
        <span class="text-xs text-gray-400">Home</span>
    </div>
    <div class="flex flex-col items-center justify-center py-2 cursor-pointer">
        <div class="w-6 h-6 flex items-center justify-center mb-1">
            <i class="ri-exchange-line text-gray-400 text-lg"></i>
        </div>
        <span class="text-xs text-gray-400">Transactions</span>
    </div>
    <div class="flex flex-col items-center justify-center py-2 cursor-pointer">
        <div class="w-6 h-6 flex items-center justify-center mb-1">
            <i class="ri-apps-line text-gray-400 text-lg"></i>
        </div>
        <span class="text-xs text-gray-400">Components</span>
    </div>
    <div class="flex flex-col items-center justify-center py-2 cursor-pointer">
        <div class="w-6 h-6 flex items-center justify-center mb-1">
            <i class="ri-bank-card-line text-gray-400 text-lg"></i>
        </div>
        <span class="text-xs text-gray-400">My Cards</span>
    </div>
    <div class="flex flex-col items-center justify-center py-2 cursor-pointer">
        <div class="w-6 h-6 flex items-center justify-center mb-1">
            <i class="ri-settings-line text-primary text-lg"></i>
        </div>
        <span class="text-xs text-primary font-medium">Settings</span>
    </div>
</nav> -->