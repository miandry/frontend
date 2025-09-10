<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nouvelle Entrée de Stock - Gestionnaire de Stock</title>
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
</head>

<body class="bg-gray-50 font-sans">
  <div class="min-h-screen flex flex-col">
    <!-- Navigation Bar -->
    <header class="fixed top-0 left-0 right-0 z-50 bg-white shadow-sm border-b border-gray-200">
      <div class="flex items-center justify-between px-4 py-3 max-w-md mx-auto">
        <a href="https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2"
          data-readdy="true"
          class="w-10 h-10 flex items-center justify-center rounded-lg hover:bg-gray-100 transition-colors cursor-pointer">
          <i class="ri-arrow-left-line text-gray-700 text-xl"></i>
        </a>
        <h1 class="text-lg font-semibold text-gray-900">Nouvelle Entrée de Stock</h1>
        <div class="w-10 h-10"></div>
      </div>
    </header>
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
                <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                  <div class="w-5 h-5 flex items-center justify-center">
                    <i class="ri-search-line text-gray-400"></i>
                  </div>
                </div>
                <div id="productDropdown"
                  class="absolute top-full left-0 right-0 bg-white border border-gray-200 rounded-lg shadow-lg mt-1 dropdown-menu hidden z-10">
                  <div class="p-2 space-y-1">
                    <div class="flex items-center px-3 py-2 hover:bg-gray-50 rounded cursor-pointer"
                      data-product="Ordinateur portable Dell XPS 13">
                      <img
                        src="https://readdy.ai/api/search-image?query=Modern%20sleek%20Dell%20XPS%2013%20laptop%2C%20professional%20product%20photography%20on%20white%20background%2C%20centered%20composition%2C%20high%20detail%20quality%2C%20clean%20and%20modern%20look&width=40&height=40&seq=1&orientation=squarish"
                        alt="Dell XPS 13" class="w-10 h-10 object-cover rounded">
                      <span class="ml-3 text-sm">Ordinateur portable Dell XPS 13</span>
                    </div>
                    <div class="flex items-center px-3 py-2 hover:bg-gray-50 rounded cursor-pointer"
                      data-product="Écran Samsung 24 pouces">
                      <img
                        src="https://readdy.ai/api/search-image?query=Samsung%2024%20inch%20monitor%20display%2C%20professional%20product%20photography%20on%20white%20background%2C%20centered%20composition%2C%20high%20detail%20quality%2C%20clean%20and%20modern%20look&width=40&height=40&seq=2&orientation=squarish"
                        alt="Samsung Monitor" class="w-10 h-10 object-cover rounded">
                      <span class="ml-3 text-sm">Écran Samsung 24 pouces</span>
                    </div>
                    <div class="flex items-center px-3 py-2 hover:bg-gray-50 rounded cursor-pointer"
                      data-product="Souris sans fil Logitech MX Master">
                      <img
                        src="https://readdy.ai/api/search-image?query=Logitech%20MX%20Master%20wireless%20mouse%2C%20professional%20product%20photography%20on%20white%20background%2C%20centered%20composition%2C%20high%20detail%20quality%2C%20clean%20and%20modern%20look&width=40&height=40&seq=3&orientation=squarish"
                        alt="Logitech Mouse" class="w-10 h-10 object-cover rounded">
                      <span class="ml-3 text-sm">Souris sans fil Logitech MX Master</span>
                    </div>
                    <div class="flex items-center px-3 py-2 hover:bg-gray-50 rounded cursor-pointer"
                      data-product="Clavier mécanique Corsair K95">
                      <img
                        src="https://readdy.ai/api/search-image?query=Corsair%20K95%20mechanical%20keyboard%2C%20professional%20product%20photography%20on%20white%20background%2C%20centered%20composition%2C%20high%20detail%20quality%2C%20clean%20and%20modern%20look&width=40&height=40&seq=4&orientation=squarish"
                        alt="Corsair Keyboard" class="w-10 h-10 object-cover rounded">
                      <span class="ml-3 text-sm">Clavier mécanique Corsair K95</span>
                    </div>
                    <div class="flex items-center px-3 py-2 hover:bg-gray-50 rounded cursor-pointer"
                      data-product="Imprimante HP LaserJet Pro">
                      <img
                        src="https://readdy.ai/api/search-image?query=HP%20LaserJet%20Pro%20printer%2C%20professional%20product%20photography%20on%20white%20background%2C%20centered%20composition%2C%20high%20detail%20quality%2C%20clean%20and%20modern%20look&width=40&height=40&seq=5&orientation=squarish"
                        alt="HP Printer" class="w-10 h-10 object-cover rounded">
                      <span class="ml-3 text-sm">Imprimante HP LaserJet Pro</span>
                    </div>
                    <div class="flex items-center px-3 py-2 hover:bg-gray-50 rounded cursor-pointer"
                      data-product="Tablette iPad Pro 12.9">
                      <img
                        src="https://readdy.ai/api/search-image?query=iPad%20Pro%2012.9%20tablet%2C%20professional%20product%20photography%20on%20white%20background%2C%20centered%20composition%2C%20high%20detail%20quality%2C%20clean%20and%20modern%20look&width=40&height=40&seq=6&orientation=squarish"
                        alt="iPad Pro" class="w-10 h-10 object-cover rounded">
                      <span class="ml-3 text-sm">Tablette iPad Pro 12.9</span>
                    </div>
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
            <!-- Supplier -->
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">
                Fournisseur <span class="text-red-500">*</span>
              </label>
              <div class="relative">
                <select id="supplier"
                  class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm appearance-none cursor-pointer"
                  required>
                  <option value="">Sélectionner un fournisseur</option>
                  <option value="TechnoMad SARL">TechnoMad SARL</option>
                  <option value="Digital Solutions Madagascar">Digital Solutions Madagascar</option>
                  <option value="Informatique Plus">Informatique Plus</option>
                  <option value="Madagascar Tech Import">Madagascar Tech Import</option>
                  <option value="Électronique Antananarivo">Électronique Antananarivo</option>
                  <option value="Matériel Informatique Pro">Matériel Informatique Pro</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <div class="w-5 h-5 flex items-center justify-center">
                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                  </div>
                </div>
              </div>
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
            <!-- Storage Location -->
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">
                Emplacement de stockage <span class="text-red-500">*</span>
              </label>
              <div class="relative">
                <select id="storageLocation"
                  class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm appearance-none cursor-pointer"
                  required>
                  <option value="">Sélectionner un emplacement</option>
                  <option value="Entrepôt A - Zone 1">Entrepôt A - Zone 1</option>
                  <option value="Entrepôt A - Zone 2">Entrepôt A - Zone 2</option>
                  <option value="Entrepôt B - Zone 1">Entrepôt B - Zone 1</option>
                  <option value="Entrepôt B - Zone 2">Entrepôt B - Zone 2</option>
                  <option value="Magasin Principal">Magasin Principal</option>
                  <option value="Réserve Sécurisée">Réserve Sécurisée</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <div class="w-5 h-5 flex items-center justify-center">
                    <i class="ri-arrow-down-s-line text-gray-400"></i>
                  </div>
                </div>
              </div>
            </div>
            <!-- Batch Number -->
            <div class="space-y-2">
              <label class="block text-sm font-medium text-gray-700">
                Numéro de lot
              </label>
              <input type="text" id="batchNumber" placeholder="Entrer le numéro de lot (optionnel)"
                class="form-input w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-sm">
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
          <a href="https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2"
            data-readdy="true"
            class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-3 px-4 rounded-lg transition-colors cursor-pointer !rounded-button flex items-center justify-center space-x-2">
            <div class="w-5 h-5 flex items-center justify-center">
              <i class="ri-close-line"></i>
            </div>
            <span>Annuler</span>
          </a>
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
  <script id="product-search">
    document.addEventListener('DOMContentLoaded', function () {
      const productSearch = document.getElementById('productSearch');
      const productDropdown = document.getElementById('productDropdown');
      const productOptions = productDropdown.querySelectorAll('[data-product]');
      productSearch.addEventListener('focus', function () {
        productDropdown.classList.remove('hidden');
      });
      productSearch.addEventListener('input', function () {
        const searchTerm = this.value.toLowerCase();
        let hasResults = false;
        productOptions.forEach(option => {
          const productName = option.dataset.product.toLowerCase();
          if (productName.includes(searchTerm)) {
            option.style.display = 'block';
            hasResults = true;
          } else {
            option.style.display = 'none';
          }
        });
        if (hasResults) {
          productDropdown.classList.remove('hidden');
        } else {
          productDropdown.classList.add('hidden');
        }
      });
      productOptions.forEach(option => {
        option.addEventListener('click', function () {
          productSearch.value = this.dataset.product;
          productDropdown.classList.add('hidden');
        });
      });
      document.addEventListener('click', function (event) {
        if (!productSearch.contains(event.target) && !productDropdown.contains(event.target)) {
          productDropdown.classList.add('hidden');
        }
      });
    });
  </script>
  <script id="total-calculator">
    document.addEventListener('DOMContentLoaded', function () {
      const quantityInput = document.getElementById('quantity');
      const unitPriceInput = document.getElementById('unitPrice');
      const totalValueDisplay = document.getElementById('totalValue');
      function calculateTotal() {
        const quantity = parseFloat(quantityInput.value) || 0;
        const unitPrice = parseFloat(unitPriceInput.value) || 0;
        const total = quantity * unitPrice;
        totalValueDisplay.textContent = `Ar ${total.toLocaleString('fr-FR')}`;
      }
      quantityInput.addEventListener('input', calculateTotal);
      unitPriceInput.addEventListener('input', calculateTotal);
    });
  </script>
  <script id="form-handler">
    document.addEventListener('DOMContentLoaded', function () {
      const form = document.getElementById('stockEntryForm');
      const entryDateInput = document.getElementById('entryDate');
      const successModal = document.getElementById('successModal');
      const closeModal = document.getElementById('closeModal');
      const today = new Date().toISOString().split('T')[0];
      entryDateInput.value = today;
      form.addEventListener('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(form);
        const data = {
          product: document.getElementById('productSearch').value,
          quantity: document.getElementById('quantity').value,
          unitPrice: document.getElementById('unitPrice').value,
          supplier: document.getElementById('supplier').value,
          entryDate: document.getElementById('entryDate').value,
          storageLocation: document.getElementById('storageLocation').value,
          batchNumber: document.getElementById('batchNumber').value
        };
        if (data.product && data.quantity && data.unitPrice && data.supplier && data.entryDate && data.storageLocation) {
          successModal.classList.remove('hidden');
        } else {
          const firstEmptyField = form.querySelector('input:required:invalid, select:required:invalid');
          if (firstEmptyField) {
            firstEmptyField.focus();
            firstEmptyField.classList.add('border-red-500');
            setTimeout(() => {
              firstEmptyField.classList.remove('border-red-500');
            }, 3000);
          }
        }
      });
      closeModal.addEventListener('click', function () {
        successModal.classList.add('hidden');
        window.location.href = 'https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2';
      });
    });
  </script>
  <script id="input-validation">
    document.addEventListener('DOMContentLoaded', function () {
      const requiredInputs = document.querySelectorAll('input[required], select[required]');
      requiredInputs.forEach(input => {
        input.addEventListener('blur', function () {
          if (!this.value.trim()) {
            this.classList.add('border-red-300');
          } else {
            this.classList.remove('border-red-300');
          }
        });
        input.addEventListener('input', function () {
          if (this.value.trim()) {
            this.classList.remove('border-red-300');
          }
        });
      });
    });
  </script>
</body>

</html>