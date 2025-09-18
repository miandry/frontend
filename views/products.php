<?php
$header_title = "All products";
include __DIR__ . '/../includes/auth-nav.php'; ?>
<div class="min-h-screen flex flex-col py-12">
    <div class="product-list px-4">
        <div class="mb-4 pt-8">
            <div class="flex items-center justify-between mb-4">
                <input type="text" placeholder="Rechercher un produit..."
                    class="w-full px-4 py-2 bg-gray-50 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
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