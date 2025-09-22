<?php
$header_title = "Produits";
include __DIR__ . '/../includes/auth-nav.php'; ?>
<div class="min-h-screen flex flex-col py-12">
    <div id="filterPanel" class="fixed top-0 left-0 right-0 bg-white shadow-lg z-50 filter-panel">
        <div class="px-4 py-3 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900">Filtres</h2>
                <button id="closeFilterBtn" class="w-8 h-8 flex items-center justify-center cursor-pointer">
                    <i class="ri-close-line text-gray-600"></i>
                </button>
            </div>
        </div>
        <div class="px-4 py-4 max-h-96 overflow-y-auto">
            <div class="space-y-6 mb-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Par catégorie</label>
                    <div class="relative">
                        <select id="prCategory"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary appearance-none bg-white">
                            <option value="">Tous les categories</option>
                        </select>
                        <div
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Par date</label>
                    <div class="relative">
                        <select id="prDate"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary appearance-none bg-white">
                            <option value="desc">Plus récent</option>
                            <option value="asc">Plus ancien</option>
                        </select>
                        <div
                            class="absolute right-3 top-1/2 transform -translate-y-1/2 w-4 h-4 flex items-center justify-center">
                            <i class="ri-arrow-down-s-line text-gray-500"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-4 py-4 border-t border-gray-200 flex gap-3">
            <button id="applyFilters"
                class="flex-1 py-2.5 bg-primary text-white rounded-lg text-sm font-medium cursor-pointer !rounded-button">Appliquer</button>
        </div>
    </div>
    <div class="product-list px-4 mb-12">
        <div class="mb-4 pt-8">
            <div class="flex items-center justify-between mb-4">
                <input type="text" placeholder="Rechercher un produit..." id="searchProductInput"
                    class="w-5/6 px-4 py-2 bg-gray-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                <button id="filterBtn"
                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-lg cursor-pointer">
                    <i class="ri-filter-3-line text-gray-600"></i>
                </button>
            </div>
        </div>
        <div class="space-y-4" id="productList">

        </div>
    </div>
    <button class="w-full flex items-center justify-center text-primary mt-4" id="loadMore">Load more...</button>
    <button class="fixed bottom-6 right-6 w-14 h-14 bg-primary rounded-full flex items-center justify-center shadow-lg" @click="page='add-product'">
        <i class="ri-add-fill text-white text-2xl"></i>
    </button>
</div>