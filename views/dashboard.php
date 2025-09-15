<?php
$header_title = "Dashboard";
include __DIR__ . '/../includes/auth-nav.php'; ?>

<div class="flex h-screen overflow-hidden">
    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Main Content Area -->
        <main class="flex-1 overflow-x-hidden pt-24 overflow-y-auto bg-gray-50 p-4 lg:p-6">
            <!-- Dashboard Header -->
            <div class="mb-6 hidden">
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