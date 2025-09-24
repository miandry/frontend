<?php
$header_title = "Catégories";
include __DIR__ . '/../includes/auth-nav.php'; ?>

<div class="flex-1 px-4 py-12">
    <div class="p-4 space-y-6">
        <div id="messageContainer" class="hidden">
            <div id="messageBox" class="p-3 rounded text-sm font-medium"></div>
        </div>

        <div class="bg-white rounded-lg border border-gray-200 p-4">
            <h2 class="text-base font-medium text-gray-900 mb-4">Informations de la catégorie</h2>

            <form id="categoryForm" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Nom de la catégorie *
                    </label>
                    <input
                        type="text"
                        id="categoryName"
                        name="name"
                        placeholder="Ex: Électronique"
                        class="w-full px-3 py-3 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                        required>
                </div>

                <div class="flex gap-3 pt-4">
                    <button
                        type="button"
                        id="cancelBtn"
                        class="flex-1 py-3 px-4 bg-gray-100 text-gray-700 rounded-button text-sm font-medium whitespace-nowrap">
                        Annuler
                    </button>
                    <button
                        type="submit"
                        id="submitBtn"
                        class="flex-1 py-3 px-4 bg-primary text-white rounded-button text-sm font-medium whitespace-nowrap">
                        Enregistrer
                    </button>
                </div>
            </form>
        </div>

        <div class="bg-white rounded-lg border border-gray-200">
            <div class="p-4 border-b border-gray-200">
                <h3 class="text-base font-medium text-gray-900">Liste des catégories</h3>
            </div>
            <div id="categoriesList" class="divide-y divide-gray-200">
                <div class="p-4 text-center text-gray-500 text-sm">
                    Chargement des catégories...
                </div>
            </div>
        </div>
    </div>
</div>

<div id="deleteConfirmDialog" class="fixed inset-0 z-50 flex items-center justify-center hidden">
    <div class="absolute inset-0 bg-black bg-opacity-50"></div>
    <div class="relative bg-white rounded-xl p-6 w-80 space-y-4">
        <h3 class="text-lg font-medium text-gray-900">Supprimer la categorie</h3>
        <p class="text-gray-600">Cette action est irréversible. Êtes-vous sûr de vouloir supprimer cette catégorie ?</p>
        <div class="flex space-x-3">
            <button id="cancelDeletion" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium">Annuler</button>
            <button id="confirmDeletion" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-medium">Supprimer</button>
        </div>
    </div>
</div>