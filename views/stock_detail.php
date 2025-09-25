<!-- auth navigation -->
<?php
$header_title = "Details";
include __DIR__ . '/../includes/auth-nav.php'; ?>
<!-- auth navigation -->

<div class="pt-20 px-4">
    <div class="space-y-4 mb-8">
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <div class="flex justify-between items-start mb-4">
                <div class="flex-1">
                    <div class="w-full h-48 rounded-lg overflow-hidden mb-4">
                        <img 
                            alt="Image du produit" id="productImage" class="w-full h-full object-contain">
                    </div>
                    <div class="mb-3">
                        <h2 class="text-lg font-semibold text-gray-900 mb-1" id="productName"></h2>
                    </div>
                    <div class="flex items-center space-x-2 mb-2">
                        <span class="text-sm text-gray-600">Auteur :</span>
                        <span class="text-sm text-blue-500 font-medium capitalize" id="author"></span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-2">
                            <span class="px-2 py-1 rounded-full text-xs font-medium" id="type"></span>
                            <span class="text-sm text-gray-600">Qté :</span><span id="stQtty"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Informations Produit</h3>
            <div class="space-y-4">
                <div class="py-2 border-b border-gray-100">
                    <p class="text-sm font-medium text-gray-600 mb-2">Nom du Produit :</p>
                    <p class="text-sm text-gray-900 ms-2" id="prName"></p>
                </div>
                <div class="py-2 border-b border-gray-100">
                    <p class="text-sm font-medium text-gray-600 mb-2">Catégorie :</p>
                    <p class="text-sm text-gray-900 ms-2" id="productCategorie"></p>
                </div>
                <div class="py-2 border-b border-gray-100">
                    <p class="text-sm font-medium text-gray-600 mb-2">Référence :</p>
                    <p class="text-sm text-gray-900 font-mono ms-2" id="ref">REF-203</p>
                </div>
                <div class="py-2 border-b border-gray-100">
                    <p class="text-sm font-medium text-gray-600 mb-2">Quantité Disponible :</p>
                    <p class="text-sm font-semibold text-gray-500 ms-2"><span id="prQttyDispo"></span> <span>unités</span></p>
                </div>
                <div class="py-2">
                    <p class="text-sm font-medium text-gray-600 mb-2">Description :</p>
                    <div class="text-sm text-gray-900 text-justify ms-2" id="description">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>