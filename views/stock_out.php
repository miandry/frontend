<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle sortie de stock - Gestionnaire de Stock</title>
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
            border-color: #3B82F6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .product-item:hover {
            background-color: #f8fafc;
        }

        .quantity-control {
            transition: all 0.15s ease-in-out;
        }

        .quantity-control:hover {
            transform: scale(1.05);
        }

        .modal-backdrop {
            backdrop-filter: blur(4px);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans h-screen overflow-hidden">
    <div class="fixed inset-0 z-50 bg-white">
        <!-- Header Navigation -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                    <a href="https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2"
                        data-readdy="true" class="w-8 h-8 flex items-center justify-center cursor-pointer">
                        <i class="ri-arrow-left-line text-gray-600 text-xl"></i>
                    </a>
                    <h1 class="text-lg font-semibold text-gray-900">Nouvelle sortie de stock</h1>
                </div>
                <button id="cancelButton" class="text-gray-500 hover:text-gray-700 font-medium text-sm cursor-pointer">
                    Annuler
                </button>
            </div>
        </header>
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto px-4 py-6 pb-24">
            <!-- Product Selection Section -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-900 mb-3">Sélectionner un produit</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="ri-search-line text-gray-400"></i>
                    </div>
                    <input type="text" id="productSearch" placeholder="Rechercher un produit..."
                        class="form-input w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:outline-none text-sm">
                </div>
                <!-- Product List -->
                <div id="productList" class="mt-3 bg-white border border-gray-200 rounded-lg max-h-48 overflow-y-auto">
                    <div class="product-item flex items-center justify-between p-3 border-b border-gray-100 cursor-pointer"
                        data-product="laptop-dell" data-stock="25" data-name="Ordinateur portable Dell XPS 13"
                        data-price="2400000">
                        <div class="flex items-center space-x-3">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20laptop%20computer%20Dell%20XPS%2C%20sleek%20silver%20design%2C%20high-quality%20product%20photography%2C%20clean%20white%20background%2C%20centered%20composition%2C%20professional%20lighting%2C%20detailed%20view&width=48&height=48&seq=laptop1&orientation=squarish"
                                alt="Laptop" class="w-12 h-12 rounded-lg object-cover">
                            <div>
                                <p class="font-medium text-gray-900 text-sm">Ordinateur portable Dell XPS 13</p>
                                <p class="text-xs text-gray-500">Stock disponible: 25 unités</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Ar 2,400,000</span>
                    </div>
                    <div class="product-item flex items-center justify-between p-3 border-b border-gray-100 cursor-pointer"
                        data-product="mouse-logitech" data-stock="8" data-name="Souris sans fil Logitech MX Master"
                        data-price="180000">
                        <div class="flex items-center space-x-3">
                            <img src="https://readdy.ai/api/search-image?query=Wireless%20computer%20mouse%20Logitech%2C%20ergonomic%20design%2C%20black%20color%2C%20high-quality%20product%20photography%2C%20clean%20white%20background%2C%20centered%20composition%2C%20professional%20lighting&width=48&height=48&seq=mouse1&orientation=squarish"
                                alt="Mouse" class="w-12 h-12 rounded-lg object-cover">
                            <div>
                                <p class="font-medium text-gray-900 text-sm">Souris sans fil Logitech MX Master</p>
                                <p class="text-xs text-red-500">Stock faible: 8 unités</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Ar 180,000</span>
                    </div>
                    <div class="product-item flex items-center justify-between p-3 border-b border-gray-100 cursor-pointer"
                        data-product="keyboard-mechanical" data-stock="12" data-name="Clavier mécanique RGB"
                        data-price="320000">
                        <div class="flex items-center space-x-3">
                            <img src="https://readdy.ai/api/search-image?query=Mechanical%20gaming%20keyboard%20with%20RGB%20lighting%2C%20black%20design%2C%20high-quality%20product%20photography%2C%20clean%20white%20background%2C%20centered%20composition%2C%20professional%20lighting&width=48&height=48&seq=keyboard1&orientation=squarish"
                                alt="Keyboard" class="w-12 h-12 rounded-lg object-cover">
                            <div>
                                <p class="font-medium text-gray-900 text-sm">Clavier mécanique RGB</p>
                                <p class="text-xs text-yellow-600">Stock attention: 12 unités</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Ar 320,000</span>
                    </div>
                    <div class="product-item flex items-center justify-between p-3 border-b border-gray-100 cursor-pointer"
                        data-product="monitor-samsung" data-stock="45" data-name="Écran Samsung 24 pouces"
                        data-price="600000">
                        <div class="flex items-center space-x-3">
                            <img src="https://readdy.ai/api/search-image?query=Computer%20monitor%20Samsung%2024%20inch%2C%20modern%20design%2C%20black%20frame%2C%20high-quality%20product%20photography%2C%20clean%20white%20background%2C%20centered%20composition%2C%20professional%20lighting&width=48&height=48&seq=monitor1&orientation=squarish"
                                alt="Monitor" class="w-12 h-12 rounded-lg object-cover">
                            <div>
                                <p class="font-medium text-gray-900 text-sm">Écran Samsung 24 pouces</p>
                                <p class="text-xs text-gray-500">Stock disponible: 45 unités</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Ar 600,000</span>
                    </div>
                    <div class="product-item flex items-center justify-between p-3 cursor-pointer"
                        data-product="printer-hp" data-stock="18" data-name="Imprimante HP LaserJet Pro"
                        data-price="850000">
                        <div class="flex items-center space-x-3">
                            <img src="https://readdy.ai/api/search-image?query=HP%20LaserJet%20printer%2C%20professional%20office%20equipment%2C%20white%20and%20black%20design%2C%20high-quality%20product%20photography%2C%20clean%20white%20background%2C%20centered%20composition&width=48&height=48&seq=printer1&orientation=squarish"
                                alt="Printer" class="w-12 h-12 rounded-lg object-cover">
                            <div>
                                <p class="font-medium text-gray-900 text-sm">Imprimante HP LaserJet Pro</p>
                                <p class="text-xs text-gray-500">Stock disponible: 18 unités</p>
                            </div>
                        </div>
                        <span class="text-sm font-medium text-gray-600">Ar 850,000</span>
                    </div>
                </div>
                <!-- Selected Product Display -->
                <div id="selectedProduct" class="hidden mt-4 p-4 bg-blue-50 border border-blue-200 rounded-lg">
                    <div class="flex items-center space-x-3">
                        <img id="selectedProductImage" src="" alt="" class="w-12 h-12 rounded-lg object-cover">
                        <div class="flex-1">
                            <p id="selectedProductName" class="font-medium text-gray-900 text-sm"></p>
                            <p id="selectedProductStock" class="text-xs text-gray-500"></p>
                        </div>
                        <button id="clearSelection" class="w-6 h-6 flex items-center justify-center cursor-pointer">
                            <i class="ri-close-line text-gray-400"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Quantity Section -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-900 mb-3">Quantité à retirer</label>
                <div class="flex items-center space-x-4">
                    <button id="decreaseQty"
                        class="quantity-control w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed !rounded-button">
                        <i class="ri-subtract-line text-gray-600"></i>
                    </button>
                    <input type="number" id="quantityInput" value="1" min="1"
                        class="form-input flex-1 text-center py-3 border border-gray-300 rounded-lg focus:outline-none text-lg font-medium">
                    <button id="increaseQty"
                        class="quantity-control w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-lg flex items-center justify-center cursor-pointer disabled:opacity-50 disabled:cursor-not-allowed !rounded-button">
                        <i class="ri-add-line text-gray-600"></i>
                    </button>
                </div>
                <div id="stockWarning"
                    class="hidden mt-2 p-2 bg-red-50 border border-red-200 rounded text-sm text-red-600">
                    <i class="ri-error-warning-line mr-1"></i>
                    <span>La quantité dépasse le stock disponible</span>
                </div>
                <p id="availableStock" class="mt-2 text-xs text-gray-500">Stock disponible: -- unités</p>
            </div>
            <!-- Reason Section -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-900 mb-3">Raison de la sortie</label>
                <div class="relative">
                    <button id="reasonButton"
                        class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none text-left flex items-center justify-between cursor-pointer">
                        <span id="reasonText" class="text-gray-500">Sélectionner une raison</span>
                        <i class="ri-arrow-down-s-line text-gray-400"></i>
                    </button>
                    <div id="reasonDropdown"
                        class="hidden absolute top-full left-0 right-0 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg z-10">
                        <div class="py-1">
                            <button
                                class="reason-option w-full px-4 py-2 text-left hover:bg-gray-50 text-sm cursor-pointer"
                                data-value="vente">
                                <i class="ri-shopping-cart-line mr-2 text-secondary"></i>
                                Vente
                            </button>
                            <button
                                class="reason-option w-full px-4 py-2 text-left hover:bg-gray-50 text-sm cursor-pointer"
                                data-value="defaut">
                                <i class="ri-error-warning-line mr-2 text-red-500"></i>
                                Défaut / Défectueux
                            </button>
                            <button
                                class="reason-option w-full px-4 py-2 text-left hover:bg-gray-50 text-sm cursor-pointer"
                                data-value="perte">
                                <i class="ri-question-line mr-2 text-orange-500"></i>
                                Perte / Vol
                            </button>
                            <button
                                class="reason-option w-full px-4 py-2 text-left hover:bg-gray-50 text-sm cursor-pointer"
                                data-value="transfert">
                                <i class="ri-truck-line mr-2 text-blue-500"></i>
                                Transfert
                            </button>
                            <button
                                class="reason-option w-full px-4 py-2 text-left hover:bg-gray-50 text-sm cursor-pointer"
                                data-value="retour">
                                <i class="ri-arrow-go-back-line mr-2 text-purple-500"></i>
                                Retour fournisseur
                            </button>
                            <button
                                class="reason-option w-full px-4 py-2 text-left hover:bg-gray-50 text-sm cursor-pointer"
                                data-value="autre">
                                <i class="ri-more-line mr-2 text-gray-500"></i>
                                Autre
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Comments Section -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-900 mb-3">
                    Commentaires
                    <span class="text-xs text-gray-500 font-normal">(Optionnel)</span>
                </label>
                <textarea id="commentsInput" placeholder="Ajouter des détails sur cette sortie de stock..." rows="4"
                    class="form-input w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none text-sm resize-none"></textarea>
                <div class="flex justify-between mt-2">
                    <p class="text-xs text-gray-500">Maximum 500 caractères</p>
                    <p id="charCount" class="text-xs text-gray-400">0/500</p>
                </div>

                <!-- Image Upload Section -->
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-900 mb-3">
                        Photos
                        <span class="text-xs text-gray-500 font-normal">(Optionnel - Max 3 photos)</span>
                    </label>
                    <div class="flex items-center space-x-3">
                        <label
                            class="w-20 h-20 flex flex-col items-center justify-center border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:border-primary transition-colors">
                            <input type="file" accept="image/*" class="hidden" id="imageInput" multiple>
                            <i class="ri-camera-line text-gray-400 text-xl mb-1"></i>
                            <span class="text-xs text-gray-500">Ajouter</span>
                        </label>
                        <div id="imagePreviewContainer" class="flex space-x-3">
                        </div>
                    </div>
                    <p class="mt-2 text-xs text-gray-500">Formats acceptés: JPG, PNG. Taille max: 5MB</p>
                </div>
            </div>
        </main>
        <!-- Fixed Bottom Button -->
        <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 p-4">
            <button id="confirmButton"
                class="w-full bg-red-500 hover:bg-red-600 text-white font-medium py-3 rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed cursor-pointer !rounded-button"
                disabled>
                Confirmer la sortie de stock
            </button>
        </div>
    </div>
    <!-- Confirmation Modal -->
    <div id="confirmationModal"
        class="hidden fixed inset-0 z-50 modal-backdrop bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-sm w-full mx-4 shadow-2xl">
            <div class="p-6">
                <div class="flex items-center justify-center w-16 h-16 bg-red-100 rounded-full mx-auto mb-4">
                    <i class="ri-arrow-up-line text-red-500 text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 text-center mb-2">Confirmer la sortie</h3>
                <p class="text-sm text-gray-600 text-center mb-4">Êtes-vous sûr de vouloir enregistrer cette sortie de
                    stock ?</p>
                <div id="confirmationSummary" class="bg-gray-50 rounded-lg p-4 mb-6">
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Produit:</span>
                            <span id="confirmProductName" class="font-medium text-gray-900"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Quantité:</span>
                            <span id="confirmQuantity" class="font-medium text-red-600"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Raison:</span>
                            <span id="confirmReason" class="font-medium text-gray-900"></span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Valeur totale:</span>
                            <span id="confirmValue" class="font-medium text-gray-900"></span>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <button id="cancelConfirmation"
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 rounded-lg transition-colors cursor-pointer !rounded-button">
                        Annuler
                    </button>
                    <button id="finalConfirm"
                        class="flex-1 bg-red-500 hover:bg-red-600 text-white font-medium py-2 rounded-lg transition-colors cursor-pointer !rounded-button">
                        Confirmer
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Success Modal -->
    <div id="successModal"
        class="hidden fixed inset-0 z-50 modal-backdrop bg-black bg-opacity-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl max-w-sm w-full mx-4 shadow-2xl">
            <div class="p-6 text-center">
                <div
                    class="flex items-center justify-center w-16 h-16 bg-secondary bg-opacity-10 rounded-full mx-auto mb-4">
                    <i class="ri-check-line text-secondary text-2xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Sortie enregistrée</h3>
                <p class="text-sm text-gray-600 mb-6">La sortie de stock a été enregistrée avec succès.</p>
                <button id="closeSuccess"
                    class="w-full bg-secondary hover:bg-secondary text-white font-medium py-2 rounded-lg transition-colors cursor-pointer !rounded-button">
                    Fermer
                </button>
            </div>
        </div>
    </div>
    <script id="product-selection">
        document.addEventListener('DOMContentLoaded', function () {
            const productSearch = document.getElementById('productSearch');
            const productList = document.getElementById('productList');
            const selectedProduct = document.getElementById('selectedProduct');
            const selectedProductImage = document.getElementById('selectedProductImage');
            const selectedProductName = document.getElementById('selectedProductName');
            const selectedProductStock = document.getElementById('selectedProductStock');
            const clearSelection = document.getElementById('clearSelection');
            const availableStock = document.getElementById('availableStock');
            let currentProduct = null;
            productSearch.addEventListener('input', function () {
                const searchTerm = this.value.toLowerCase();
                const productItems = document.querySelectorAll('.product-item');
                productItems.forEach(item => {
                    const productName = item.querySelector('p').textContent.toLowerCase();
                    if (productName.includes(searchTerm)) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
            document.querySelectorAll('.product-item').forEach(item => {
                item.addEventListener('click', function () {
                    const productData = {
                        id: this.dataset.product,
                        name: this.dataset.name,
                        stock: parseInt(this.dataset.stock),
                        price: parseInt(this.dataset.price),
                        image: this.querySelector('img').src
                    };
                    selectProduct(productData);
                });
            });
            function selectProduct(product) {
                currentProduct = product;
                selectedProductImage.src = product.image;
                selectedProductName.textContent = product.name;
                selectedProductStock.textContent = `Stock disponible: ${product.stock} unités`;
                availableStock.textContent = `Stock disponible: ${product.stock} unités`;
                selectedProduct.classList.remove('hidden');
                productList.classList.add('hidden');
                productSearch.value = '';
                updateFormValidation();
            }
            clearSelection.addEventListener('click', function () {
                currentProduct = null;
                selectedProduct.classList.add('hidden');
                productList.classList.remove('hidden');
                availableStock.textContent = 'Stock disponible: -- unités';
                updateFormValidation();
            });
            window.getCurrentProduct = () => currentProduct;
        });
    </script>
    <script id="quantity-controls">
        document.addEventListener('DOMContentLoaded', function () {
            const quantityInput = document.getElementById('quantityInput');
            const decreaseQty = document.getElementById('decreaseQty');
            const increaseQty = document.getElementById('increaseQty');
            const stockWarning = document.getElementById('stockWarning');
            function updateQuantity(value) {
                const currentProduct = window.getCurrentProduct();
                if (!currentProduct) return;
                const newValue = Math.max(1, value);
                quantityInput.value = newValue;
                if (newValue > currentProduct.stock) {
                    stockWarning.classList.remove('hidden');
                    quantityInput.classList.add('border-red-300', 'bg-red-50');
                } else {
                    stockWarning.classList.add('hidden');
                    quantityInput.classList.remove('border-red-300', 'bg-red-50');
                }
                decreaseQty.disabled = newValue <= 1;
                increaseQty.disabled = newValue >= currentProduct.stock;
                updateFormValidation();
            }
            decreaseQty.addEventListener('click', function () {
                const currentValue = parseInt(quantityInput.value) || 1;
                updateQuantity(currentValue - 1);
            });
            increaseQty.addEventListener('click', function () {
                const currentValue = parseInt(quantityInput.value) || 1;
                updateQuantity(currentValue + 1);
            });
            quantityInput.addEventListener('input', function () {
                const value = parseInt(this.value) || 1;
                updateQuantity(value);
            });
            window.getCurrentQuantity = () => parseInt(quantityInput.value) || 1;
        });
    </script>
    <script id="reason-dropdown">
        document.addEventListener('DOMContentLoaded', function () {
            const reasonButton = document.getElementById('reasonButton');
            const reasonText = document.getElementById('reasonText');
            const reasonDropdown = document.getElementById('reasonDropdown');
            const reasonOptions = document.querySelectorAll('.reason-option');
            let selectedReason = null;
            reasonButton.addEventListener('click', function () {
                reasonDropdown.classList.toggle('hidden');
            });
            reasonOptions.forEach(option => {
                option.addEventListener('click', function () {
                    selectedReason = this.dataset.value;
                    reasonText.textContent = this.textContent.trim();
                    reasonText.classList.remove('text-gray-500');
                    reasonText.classList.add('text-gray-900');
                    reasonDropdown.classList.add('hidden');
                    updateFormValidation();
                });
            });
            document.addEventListener('click', function (event) {
                if (!reasonButton.contains(event.target) && !reasonDropdown.contains(event.target)) {
                    reasonDropdown.classList.add('hidden');
                }
            });
            window.getSelectedReason = () => selectedReason;
            window.getSelectedReasonText = () => selectedReason ? reasonText.textContent.trim() : null;
        });
    </script>
    <script id="comments-handler">
        document.addEventListener('DOMContentLoaded', function () {
            const commentsInput = document.getElementById('commentsInput');
            const charCount = document.getElementById('charCount');
            const imageInput = document.getElementById('imageInput');
            const imagePreviewContainer = document.getElementById('imagePreviewContainer');
            const maxImages = 3;
            let uploadedImages = [];

            commentsInput.addEventListener('input', function () {
                const length = this.value.length;
                charCount.textContent = `${length}/500`;
                if (length > 500) {
                    charCount.classList.add('text-red-500');
                    charCount.classList.remove('text-gray-400');
                } else {
                    charCount.classList.remove('text-red-500');
                    charCount.classList.add('text-gray-400');
                }
            });

            imageInput.addEventListener('change', function (e) {
                const files = Array.from(e.target.files);
                const remainingSlots = maxImages - uploadedImages.length;
                const validFiles = files.slice(0, remainingSlots).filter(file => {
                    const isValidType = ['image/jpeg', 'image/png'].includes(file.type);
                    const isValidSize = file.size <= 5 * 1024 * 1024;
                    return isValidType && isValidSize;
                });

                validFiles.forEach(file => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const imageContainer = document.createElement('div');
                        imageContainer.className = 'relative w-20 h-20';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'w-20 h-20 rounded-lg object-cover';

                        const removeButton = document.createElement('button');
                        removeButton.className = 'absolute -top-2 -right-2 w-6 h-6 bg-white rounded-full shadow-md flex items-center justify-center cursor-pointer';
                        removeButton.innerHTML = '<i class="ri-close-line text-gray-500"></i>';

                        removeButton.addEventListener('click', function () {
                            imageContainer.remove();
                            uploadedImages = uploadedImages.filter(img => img.preview !== e.target.result);
                            imageInput.value = '';
                        });

                        imageContainer.appendChild(img);
                        imageContainer.appendChild(removeButton);
                        imagePreviewContainer.appendChild(imageContainer);

                        uploadedImages.push({
                            file: file,
                            preview: e.target.result
                        });
                    };
                    reader.readAsDataURL(file);
                });

                if (uploadedImages.length >= maxImages) {
                    imageInput.disabled = true;
                    imageInput.parentElement.classList.add('opacity-50', 'cursor-not-allowed');
                    imageInput.parentElement.classList.remove('hover:border-primary');
                }
            });

            window.getComments = () => commentsInput.value.trim();
            window.getUploadedImages = () => uploadedImages;
        });
    </script>
    <script id="form-validation">
        document.addEventListener('DOMContentLoaded', function () {
            const confirmButton = document.getElementById('confirmButton');
            function updateFormValidation() {
                const product = window.getCurrentProduct();
                const quantity = window.getCurrentQuantity();
                const reason = window.getSelectedReason();
                const isValid = product &&
                    quantity > 0 &&
                    quantity <= product.stock &&
                    reason;
                confirmButton.disabled = !isValid;
            }
            window.updateFormValidation = updateFormValidation;
        });
    </script>
    <script id="confirmation-modal">
        document.addEventListener('DOMContentLoaded', function () {
            const confirmButton = document.getElementById('confirmButton');
            const confirmationModal = document.getElementById('confirmationModal');
            const cancelConfirmation = document.getElementById('cancelConfirmation');
            const finalConfirm = document.getElementById('finalConfirm');
            const successModal = document.getElementById('successModal');
            const closeSuccess = document.getElementById('closeSuccess');
            const confirmProductName = document.getElementById('confirmProductName');
            const confirmQuantity = document.getElementById('confirmQuantity');
            const confirmReason = document.getElementById('confirmReason');
            const confirmValue = document.getElementById('confirmValue');
            confirmButton.addEventListener('click', function () {
                const product = window.getCurrentProduct();
                const quantity = window.getCurrentQuantity();
                const reason = window.getSelectedReasonText();
                if (!product || !quantity || !reason) return;
                confirmProductName.textContent = product.name;
                confirmQuantity.textContent = `-${quantity} unités`;
                confirmReason.textContent = reason;
                const totalValue = product.price * quantity;
                confirmValue.textContent = `Ar ${totalValue.toLocaleString()}`;
                confirmationModal.classList.remove('hidden');
            });
            cancelConfirmation.addEventListener('click', function () {
                confirmationModal.classList.add('hidden');
            });
            finalConfirm.addEventListener('click', function () {
                confirmationModal.classList.add('hidden');
                setTimeout(() => {
                    successModal.classList.remove('hidden');
                }, 300);
            });
            closeSuccess.addEventListener('click', function () {
                successModal.classList.add('hidden');
                window.location.href = 'https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2';
            });
        });
    </script>
    <script id="cancel-handler">
        document.addEventListener('DOMContentLoaded', function () {
            const cancelButton = document.getElementById('cancelButton');
            cancelButton.addEventListener('click', function () {
                if (confirm('Êtes-vous sûr de vouloir annuler ? Toutes les données saisies seront perdues.')) {
                    window.location.href = 'https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2';
                }
            });
        });
    </script>
</body>

</html>