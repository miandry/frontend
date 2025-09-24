function initProductsPage() {
  showLoader();
  let products = [];
  let pageNumber = 0;
  let totalProducts = 0;
  let totalPages = 0;
  let searchTerm = "";
  let dateFilterValue = "desc";
  let catFilterValue = "";
  let catQuery = "";
  let productIdToDelete = "";
  const perPage = 10;
  const loadMore = document.getElementById("loadMore");
  const searchProductInput = document.getElementById("searchProductInput");
  // filter variable
  const filterBtn = document.getElementById("filterBtn");
  const filterPanel = document.getElementById("filterPanel");
  const closeFilterBtn = document.getElementById("closeFilterBtn");
  const prCategory = document.getElementById("prCategory");
  const prDate = document.getElementById("prDate");
  // Modal for delete product
  const deleteConfirmDialog = document.getElementById("deleteConfirmDialog");
  const cancelDeletion = document.getElementById("cancelDeletion");
  const confirmDeletion = document.getElementById("confirmDeletion");
  // reinitialiser objet sur edit
  sessionStorage.removeItem("productObject");

  filterBtn.addEventListener("click", function () {
    filterPanel.classList.add("active");
  });
  closeFilterBtn.addEventListener("click", function () {
    filterPanel.classList.remove("active");
  });

  // Charger les catégories depuis l’API
  async function loadProducts() {
    if (catFilterValue) {
      catQuery = catFilterValue;
    }
    try {
      const response = await fetch(
        `/api/v2/node/product?sort[val]=nid&sort[op]=${dateFilterValue}&filters[title][val]=${searchTerm}${catQuery}&filters[title][op]=CONTAINS&pager=${pageNumber}&offset=${perPage}`
      );
      const dataArray = await response.json();
      let data = dataArray.rows;
      if (pageNumber == 0) {
        products = data;
      } else {
        data.forEach((item) => {
          const index = products.findIndex((pr) => pr.nid === item.nid);
          if (index !== -1) {
            // Si l'élément existe déjà, on le remplace
            products[index] = item;
          } else {
            // Sinon, on l'ajoute
            products.push(item);
          }
        });
      }
      totalProducts = dataArray.total;
      totalPages = Math.ceil(totalProducts / perPage);
      renderProducts();
      if (pageNumber >= totalPages - 1) {
        loadMore.classList.add("hidden");
      } else {
        loadMore.classList.remove("hidden");
      }
    } catch (error) {
      console.error("Error loading products:", error);
    } finally {
      hideLoader();
    }
  }

  searchProductInput.addEventListener("input", function () {
    searchTerm = this.value.trim().toLowerCase();
    // fait le recherche a partir de 4 caractere
    if (searchTerm.length > 3 || searchTerm == "") {
      loadProducts();
    }
  });

  applyFilters.addEventListener("click", function () {
    dateFilterValue = prDate.value;
    if (prCategory.value) {
      catFilterValue = "&filters[field_category][val]=" + prCategory.value;
    } else {
      catFilterValue = "";
    }
    loadProducts();
    filterPanel.classList.remove("active");
  });

  function renderProducts() {
    const container = document.getElementById("productList");
    container.innerHTML = "";
    if (products.length > 0) {
      container.innerHTML = products
        .map(
          (pr) => `
                    <div class="bg-white p-2 rounded-lg shadow-sm border border-gray-100" data-id="${
                      pr.nid
                    }">
                        <div class="flex space-x-4 items-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden">
                                <img src="${pr.field_images[0].image.url}"
                                    class="w-full h-full object-cover" alt="MacBook Pro">
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">${
                                  pr.title
                                }</h3>
                                <div class="text-sm text-gray-500 mt-1">${truncateHTML(
                                  pr.field_description,
                                  60
                                )}</div>
                                <div class="mt-1 text-sm flex items-center justify-between">
                                  <div>
                                    ${
                                      pr.field_quantite_disponible > 0
                                        ? `<span class="text-primary font-medium">En stock</span>`
                                        : `<span class="text-red-500 font-medium">Épuisé</span>`
                                    }
                                  </div>
                                  <div class="flex justify-start items-center gap-2">
                                    <button class="edit-btn w-6 h-6 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 transition-colors"
                                      onclick="editProduct(${pr.nid});">
                                      <i class="ri-edit-line text-blue-600 text-sm"></i>
                                    </button>
                                    <button class="remove-btn w-6 h-6 flex items-center justify-center rounded-full bg-red-100 hover:bg-red-200 transition-colors" data-id="${
                                      pr.nid
                                    }" onclick="showDeleteModal(${pr.nid});">
                                      <i class="ri-delete-bin-line text-red-600 text-sm"></i>
                                    </button>
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>

            `
        )
        .join("");
    } else {
      container.innerHTML = `
                <div class="mt-8 px-3 py-2 text-center hover:bg-gray-50 rounded cursor-pointer">
                    <p class="font-medium text-center text-gray-500">No items found</p>
                  </div>
            `;
    }
  }

  loadMore.addEventListener("click", function () {
    pageNumber++;
    loadProducts();
    if (pageNumber == totalPages - 1) {
      this.classList.add("hidden");
    }
  });

  function editProduct(id) {
    const productToEdit = products.find((p) => p.nid == id);
    sessionStorage.setItem("productObject", JSON.stringify(productToEdit));
    window.app.page = "edit-product";
  }

  function showDeleteModal(id) {
    productIdToDelete = id;
    deleteConfirmDialog.classList.remove("hidden");
  }

  cancelDeletion.addEventListener("click", function () {
    productIdToDelete = "";
    deleteConfirmDialog.classList.add("hidden");
  });

  confirmDeletion.addEventListener("click", function () {
    if (productIdToDelete) {
      deleteProduct(productIdToDelete);
    }
    deleteConfirmDialog.classList.add("hidden");
  });

  async function deleteProduct(id) {
    showLoader();
    try {
      const response = await fetch(`/confirm/node/${id}/delete`, {
        method: "POST",
      });

      const result = await response.json();

      if (response.ok) {
        window.scrollTo(0, 0);
        showNotification("Produit supprimée avec succès", "success");
        products = products.filter((pr) => pr.nid != id);
        renderProducts();
      } else {
        throw new Error(result.message || "Erreur lors de la suppression");
      }
    } catch (error) {
      showNotification(
        "Erreur lors de la suppression: " + error.message,
        "error"
      );
    } finally {
      productIdToDelete = "";
      hideLoader();
    }
  }

  function truncateHTML(html, maxLength) {
    const div = document.createElement("div");
    div.innerHTML = html;
    let text = div.textContent || div.innerText;

    if (text.length > maxLength) {
      text = text.substring(0, maxLength) + "...";
    }

    return text;
  }

  function showLoader() {
    document.getElementById("page-loader").classList.remove("hidden");
  }

  function hideLoader() {
    document.getElementById("page-loader").classList.add("hidden");
  }

  function showNotification(message, type) {
    const notification = document.createElement("div");
    const bgColor =
      type === "success"
        ? "bg-green-500"
        : type === "error"
        ? "bg-red-500"
        : "bg-primary";
    notification.className = `fixed top-4 left-4 right-4 ${bgColor} text-white px-4 py-3 rounded-lg shadow-lg z-50 transform -translate-y-full transition-transform duration-300`;
    notification.innerHTML = `
                    <div class="flex items-center space-x-3">
                    <i class="ri-${
                      type === "success"
                        ? "check"
                        : type === "error"
                        ? "error-warning"
                        : "information"
                    }-line text-lg"></i>
                    <span class="text-sm font-medium">${message}</span>
                    </div>
                    `;
    document.body.appendChild(notification);
    setTimeout(() => {
      notification.style.transform = "translateY(0)";
    }, 100);
    setTimeout(() => {
      notification.style.transform = "translateY(-100%)";
      setTimeout(() => {
        document.body.removeChild(notification);
      }, 300);
    }, 3000);
  }
  let categories = [];

  async function loadCategories() {
    try {
      const response = await fetch(
        "/api/v2/taxonomy_term/category?sort[val]=name&sort[op]=asc"
      );
      const data = await response.json();
      categories = data.rows;

      // Construire le select
      const select = document.getElementById("prCategory");
      categories.forEach((cat) => {
        const option = document.createElement("option");
        option.value = cat.tid; // si tid est l'identifiant
        option.textContent = cat.name; // si name est le libellé
        select.appendChild(option);
      });
    } catch (error) {
      console.error("Error loading categories:", error);
    }
  }
  loadCategories();
  loadProducts();

  window.editProduct = editProduct;
  window.showDeleteModal = showDeleteModal;
}
