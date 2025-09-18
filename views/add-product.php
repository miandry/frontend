<?php
$header_title = "Add product";
include __DIR__ . '/../includes/auth-nav.php'; ?>

<div class="min-h-screen flex flex-col pt-12">
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
                    <p class="text-sm text-red-500 ms-2 hidden" id="imgError"></p>
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
                        <p class="text-sm text-red-500 ms-2 hidden" id="pNameError"></p>
                    </div>
                    <!-- Description -->
                    <div>
                        <label for="productDescription"
                            class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="productDescription" name="productDescription" rows="3" required
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg form-input text-sm resize-none"
                            placeholder="Description détaillée du produit..."></textarea>
                        <p class="text-sm text-red-500 ms-2 hidden" id="descError"></p>
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
                                <div id="categoryList" class="py-2"></div>
                            </div>
                            <p class="text-sm text-red-500 ms-2 hidden" id="catError">Veuillez sélectionner une catégorie.</p>
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
                        <input type="number" id="unitPrice" name="unitPrice" required
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