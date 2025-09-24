<?php
$header_title = "Modifier sortie de Stock";
include __DIR__ . '/../includes/auth-nav.php'; ?>

<div class="min-h-screen flex flex-col">
  <!-- Main Content -->
  <main class="flex-1 pt-16 pb-6 px-4 max-w-md mx-auto w-full">
    <div class="mt-6">
      <!-- Form Card -->
      <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <form id="stockEntryForm" class="space-y-6">
          <!-- Product Selection -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Produit <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <input type="text" id="productSearch" placeholder="Rechercher ou sélectionner un produit"
                class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                required>
              <input type="number" id="productId" class="hidden">
              <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                <div class="w-5 h-5 flex items-center justify-center">
                  <i class="ri-search-line text-gray-400"></i>
                </div>
              </div>
              <div id="productDropdown"
                class="absolute top-full left-0 right-0 bg-white border border-gray-200 rounded-lg shadow-lg mt-1 dropdown-menu hidden z-10">
                <div class="p-2 space-y-1" id="productList">

                </div>
              </div>
            </div>
          </div>
          <!-- Quantity -->
          <div class="space-y-2">
            <div class="flex items-center justify-between">
              <label class="block text-sm font-medium text-gray-700">
                Quantité <span class="text-red-500">*</span>
              </label>
              <p class="hidden qttyDipso text-sm text-green-500">
                (<span id="qttyDipso"></span>
                <span class="text-sm"> disponibles</span>)
              </p>
            </div>
            <input type="number" id="quantity" placeholder="Entrer la quantité" min="1"
              class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
              required>
          </div>
          <!-- Raison -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700" for="stockRaison">
              Raison <span class="text-red-500">*</span>
            </label>
            <div class="relative">
              <input type="text" id="stockRaison" placeholder="Ajouter une raison" required
                class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
            </div>
          </div>
          <!-- commentaire -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700" for="productDescription">
              Description
            </label>
            <div class="relative">
              <input type="text" id="productDescription" placeholder="Ajouter un commentaire"
                class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
            </div>
          </div>
        </form>
      </div>
      <!-- Action Buttons -->
      <div class="mt-6 space-y-3">
        <button type="submit" form="stockEntryForm" id="saveButton"
          class="w-full bg-primary hover:bg-blue-600 text-white font-medium py-3 px-4 rounded-lg transition-colors cursor-pointer !rounded-button flex items-center justify-center space-x-2">
          <div class="w-5 h-5 flex items-center justify-center">
            <i class="ri-save-line"></i>
          </div>
          <span>Enregistrer l'entrée</span>
        </button>
      </div>
    </div>
  </main>
</div>