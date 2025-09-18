function initCategoryPage() {
  let categories = [];
  let editingCategory = null;
  let user = JSON.parse(sessionStorage.getItem("user"));

  loadCategories();
  setupEventListeners();

  function setupEventListeners() {
    const form = document.getElementById("categoryForm");
    const cancelBtn = document.getElementById("cancelBtn");

    form.addEventListener("submit", handleSubmit);
    cancelBtn.addEventListener("click", resetForm);
  }

  async function loadCategories() {
    showLoader();
    try {
      const response = await fetch(
        "/api/v2/taxonomy_term/category?sort[val]=tid&sort[op]=desc"
      );
      const data = await response.json();
      categories = data.rows;
      renderCategories();
    } catch (error) {
      showMessage("Erreur lors du chargement des catégories", "error");
      console.error("Error loading categories:", error);
    } finally {
      hideLoader();
    }
  }

  function editCategory(id, name) {
    editingCategory = {
      id,
      name,
    };
    window.scrollTo(0, 0);
    document.getElementById("categoryName").value = name;
    document.getElementById("submitBtn").textContent = "Modifier";
    showMessage("Mode édition activé", "info");
  }

  function renderCategories() {
    const container = document.getElementById("categoriesList");

    if (categories.length === 0) {
      container.innerHTML = `
                    <div class="p-4 text-center text-gray-500 text-sm">
                        Aucune catégorie trouvée
                    </div>
                `;
      return;
    }

    container.innerHTML = categories
      .map(
        (category) => `
                <div class="p-4 flex items-center justify-between hover:bg-gray-50 transition-colors" data-id="${category.tid}">
                    <div class="flex-1">
                        <h4 class="text-sm font-medium text-gray-900">${category.name}</h4>
                    </div>
                    <div class="flex items-center gap-2">
                        <button 
                            onclick="editCategory(${category.tid}, '${category.name}')"
                            class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-primary hover:bg-primary/10 rounded-full transition-colors"
                        >
                            <i class="ri-edit-line text-sm"></i>
                        </button>
                        <button 
                            onclick="deleteCategory(${category.tid})"
                            class="w-8 h-8 flex items-center justify-center text-gray-500 hover:text-red-500 hover:bg-red-50 rounded-full transition-colors"
                        >
                            <i class="ri-delete-bin-line text-sm"></i>
                        </button>
                    </div>
                </div>
            `
      )
      .join("");
  }

  async function handleSubmit(e) {
    e.preventDefault();
    showLoader();
    const nameInput = document.getElementById("categoryName");
    const name = nameInput.value.trim();

    if (!name) {
      showMessage("Le nom de la catégorie est requis", "error");
      return;
    }

    const submitBtn = document.getElementById("submitBtn");
    submitBtn.disabled = true;
    submitBtn.textContent = "Enregistrement...";

    try {
      const payload = {
        entity_type: "taxonomy_term",
        bundle: "category",
        name: name,
        uid: user.id,
      };

      if (editingCategory) {
        payload.tid = editingCategory.id;
      }

      const response = await fetch("/crud/save", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(payload),
      });

      const result = await response.json();

      if (response.ok) {
        showMessage(
          editingCategory
            ? "Catégorie modifiée avec succès"
            : "Catégorie ajoutée avec succès",
          "success"
        );
        resetForm();
        await loadCategories();
      } else {
        throw new Error(result.message || "Erreur lors de l'enregistrement");
      }
    } catch (error) {
      showMessage("Erreur lors de l'enregistrement: " + error.message, "error");
      console.error("Error saving category:", error);
    } finally {
      submitBtn.disabled = false;
      submitBtn.textContent = "Enregistrer";
      hideLoader();
    }
  }

  async function deleteCategory(id) {
    if (!confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ?")) {
      return;
    }
    showLoader();
    try {
      const response = await fetch(`/confirm/taxonomy_term/${id}/delete`, {
        method: "POST",
      });

      const result = await response.json();

      if (response.ok) {
        window.scrollTo(0, 0);
        showMessage("Catégorie supprimée avec succès", "success");
        await loadCategories();
      } else {
        throw new Error(result.message || "Erreur lors de la suppression");
      }
    } catch (error) {
      showMessage("Erreur lors de la suppression: " + error.message, "error");
      console.error("Error deleting category:", error);
    } finally {
      hideLoader();
    }
  }

  function resetForm() {
    document.getElementById("categoryForm").reset();
    editingCategory = null;
    document.getElementById("submitBtn").textContent = "Enregistrer";
    hideMessage();
  }

  function showMessage(message, type) {
    const container = document.getElementById("messageContainer");
    const box = document.getElementById("messageBox");

    const colors = {
      success: "bg-green-100 text-green-800 border-green-200",
      error: "bg-red-100 text-red-800 border-red-200",
      info: "bg-blue-100 text-blue-800 border-blue-200",
    };

    box.className = `p-3 rounded text-sm font-medium border ${
      colors[type] || colors.info
    }`;
    box.textContent = message;
    container.classList.remove("hidden");

    setTimeout(() => {
      hideMessage();
    }, 5000);
  }

  function hideMessage() {
    document.getElementById("messageContainer").classList.add("hidden");
  }

  function showLoader() {
    document.getElementById("page-loader").classList.remove("hidden");
  }

  function hideLoader() {
    document.getElementById("page-loader").classList.add("hidden");
  }

  window.editCategory = editCategory;
  window.deleteCategory = deleteCategory;
}
