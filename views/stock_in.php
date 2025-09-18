<?php
$header_title = "Add Stock";
include __DIR__ . '/../includes/auth-nav.php'; ?>
<style>
  .form-input {
    transition: all 0.2s ease-in-out;
  }

  .form-input:focus {
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(59, 130, 246, 0.15);
  }

  .dropdown-menu {
    max-height: 200px;
    overflow-y: auto;
  }

  .success-animation {
    animation: successPulse 0.6s ease-in-out;
  }

  @keyframes successPulse {
    0% {
      transform: scale(1);
    }

    50% {
      transform: scale(1.05);
    }

    100% {
      transform: scale(1);
    }
  }
</style>
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
            <label class="block text-sm font-medium text-gray-700">
              Quantité <span class="text-red-500">*</span>
            </label>
            <input type="number" id="quantity" placeholder="Entrer la quantité" min="1"
              class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
              required>
          </div>
          <!-- Unit Price -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Prix unitaire (Ar) <span class="text-red-500">*</span>
            </label>
            <input type="number" id="unitPrice" placeholder="0" min="0" step="0.01"
              class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
              required>
          </div>
          <!-- Entry Date -->
          <div class="space-y-2">
            <label class="block text-sm font-medium text-gray-700">
              Date d'entrée <span class="text-red-500">*</span>
            </label>
            <input type="date" id="entryDate"
              class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm cursor-pointer"
              required>
          </div>
          <!-- Total Value Display -->
          <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
            <div class="flex items-center justify-between">
              <span class="text-sm font-medium text-gray-700">Valeur totale</span>
              <span id="totalValue" class="text-lg font-bold text-primary">Ar 0</span>
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
<!-- Success Modal -->
<div id="successModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4 hidden">
  <div class="bg-white rounded-xl p-6 max-w-sm w-full mx-4 success-animation">
    <div class="text-center">
      <div class="w-16 h-16 bg-secondary bg-opacity-10 rounded-full flex items-center justify-center mx-auto mb-4">
        <i class="ri-check-line text-secondary text-2xl"></i>
      </div>
      <h3 class="text-lg font-semibold text-gray-900 mb-2">Entrée enregistrée</h3>
      <p class="text-gray-600 text-sm mb-6">L'entrée de stock a été enregistrée avec succès dans le système.</p>
      <button id="closeModal"
        class="w-full bg-primary hover:bg-blue-600 text-white font-medium py-2 px-4 rounded-lg transition-colors cursor-pointer !rounded-button">
        Continuer
      </button>
    </div>
  </div>
</div>