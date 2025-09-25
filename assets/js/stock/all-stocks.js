function initAllStocksPage() {
  showLoader();
  let stocks = [];
  let pageNumber = 0;
  let totalStocks = 0;
  let totalPages = 0;
  let searchTerm = "";
  let dateFilterValue = "desc";
  let stType = "";
  let typeFilterValue = "";
  let typeFilterQuery = "";
  let stockIdToDelete = "";
  const perPage = 10;
  const loadMore = document.getElementById("loadMore");
  const searchStockInput = document.getElementById("searchStockInput");
  // filter variable
  const typeFilter = document.getElementById("typeFilter");

  // Charger les catégories depuis l’API
  async function loadStocks() {
    try {
      const response = await fetch(
        `/api/v2/node/stock?sort[val]=nid&sort[op]=${dateFilterValue}${typeFilterQuery}&filters[title][val]=${searchTerm}&filters[title][op]=CONTAINS&${stType}&pager=${pageNumber}&offset=${perPage}`
      );
      const dataArray = await response.json();
      let data = dataArray.rows;
      if (pageNumber == 0) {
        stocks = data;
      } else {
        data.forEach((item) => {
          const index = stocks.findIndex((pr) => pr.nid === item.nid);
          if (index !== -1) {
            // Si l'élément existe déjà, on le remplace
            stocks[index] = item;
          } else {
            // Sinon, on l'ajoute
            stocks.push(item);
          }
        });
      }
      totalStocks = dataArray.total;
      totalPages = Math.ceil(totalStocks / perPage);
      renderStocks();
      if (pageNumber >= totalPages - 1) {
        loadMore.classList.add("hidden");
      } else {
        loadMore.classList.remove("hidden");
      }
    } catch (error) {
      console.error("Error loading stocks:", error);
    } finally {
      hideLoader();
    }
  }

  searchStockInput.addEventListener("input", function () {
    searchTerm = this.value.trim().toLowerCase();
    // fait le recherche a partir de 4 caractere
    if (searchTerm.length > 3 || searchTerm == "") {
      loadStocks();
    }
  });

  typeFilter.addEventListener("change", function () {
    showLoader();
    // récupère la valeur sélectionnée
    typeFilterValue = typeFilter.value;
    if (typeFilterValue) {
      // tu peux maintenant l’utiliser dans ton instruction
      typeFilterQuery = `&filters[field_type][val]=${encodeURIComponent(
        typeFilterValue
      )}`;
    } else {
      typeFilterQuery = "";
    }
    loadStocks();
  });

  function renderStocks() {
    const container = document.getElementById("stockList");
    container.innerHTML = "";
    if (stocks.length > 0) {
      container.innerHTML = stocks
        .map(
          (st) => `
                    <div class="bg-white p-2 rounded-lg shadow-sm border ${
                      st.field_type == "Entrée"
                        ? "border-green-500"
                        : "border-red-500"
                    }" data-id="${st.nid}" onclick="showStock(event, ${st.nid});">
                        <div class="flex space-x-4 items-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden text-center flex items-center align-center">
                                <span class="text-sm text-gray-500">${formatDate(st.created)}</span>
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">${
                                  st.title
                                }</h3>
                                <div class="text-sm text-gray-500 mt-1"></div>
                                <div class="mt-1 flex items-center text-sm">
                                <span class="text-gray-500 mr-2">Auteur: </span><span class="text-blue-500 capitalize">${st.uid.name}</span>
                                  <!--/*${
                                    st.field_raison
                                      ? `<span class="text-blue-500">${st.field_raison}</span>`
                                      : `
                                        <span title="Prix" class="text-yellow-500">PA: ${st.field_price} Ar</span>
                                        <span title="Prix de vente" class="text-green-500">PV: ${st.field_prix_de_vente} Ar</span>
                                      `
                                  }*/-->
                                </div>
                                <div class="mt-1 text-sm flex items-center justify-between">
                                    <span class="${
                                      st.field_type == "Entrée"
                                        ? "text-green-500"
                                        : "text-red-500"
                                                                }">${
                                        st.field_type == "Entrée" ? "Entrée" : "Sortie"
                                      }</span>
                                    <span class="text-purple-500">Qtté: ${
                                      st.field_quantite
                                    }</span>
                                    <div class="flex justify-start items-center gap-2">
                                      <button class="edit-btn w-6 h-6 flex items-center justify-center rounded-full bg-blue-100 hover:bg-blue-200 transition-colors"
                                        onclick="editStock(event,${st.nid});">
                                        <i class="ri-edit-line text-blue-600 text-sm"></i>
                                      </button>
                                      <button class="remove-btn w-6 h-6 flex items-center justify-center rounded-full bg-red-100 hover:bg-red-200 transition-colors" onclick="showDeleteModal(${
                                        st.nid
                                      });">
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
    loadStocks();
    if (pageNumber == totalPages - 1) {
      this.classList.add("hidden");
    }
  });

  function showDeleteModal(id) {
    stockIdToDelete = id;
    deleteConfirmDialog.classList.remove("hidden");
  }

  cancelDeletion.addEventListener("click", function () {
    stockIdToDelete = "";
    deleteConfirmDialog.classList.add("hidden");
  });

  confirmDeletion.addEventListener("click", function () {
    if (stockIdToDelete) {
      deleteStock(stockIdToDelete);
    }
    deleteConfirmDialog.classList.add("hidden");
  });

  function editStock(e, id) {
    e.stopPropagation();
    e.preventDefault();
    const stockToEdit = stocks.find((st) => st.nid == id);
    sessionStorage.setItem("stockObject", JSON.stringify(stockToEdit));
    if (stockToEdit.field_type == "Entrée") {
      window.app.page = "edit-stock-in";
    } else {
      window.app.page = "edit-stock-out";
    }
  }

  function showStock(e, id) {
    e.stopPropagation();
    e.preventDefault();
    const stockToShow = stocks.find((st) => st.nid == id);
    sessionStorage.setItem("stockObjectToShow", JSON.stringify(stockToShow));
    window.app.page = "detail-stock";
  }

  async function deleteStock(id) {
    showLoader();
    try {
      const response = await fetch(`/confirm/node/${id}/delete`, {
        method: "POST",
      });

      const result = await response.json();

      if (response.ok) {
        window.scrollTo(0, 0);
        showNotification("Stock supprimée avec succès", "success");
        stocks = stocks.filter((pr) => pr.nid != id);
        renderStocks();
      } else {
        throw new Error(result.message || "Erreur lors de la suppression");
      }
    } catch (error) {
      showNotification(
        "Erreur lors de la suppression: " + error.message,
        "error"
      );
    } finally {
      stockIdToDelete = "";
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

function formatDate(timestamp) {
  const date = new Date(timestamp * 1000); // convertir en ms

  let formatted = date.toLocaleDateString("fr-FR", {
    day: "2-digit",
    month: "short",
    year: "numeric"
  });

  // supprimer le "." éventuel après "sept."
  formatted = formatted.replace('.', '');

  return formatted;
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

  function showLoader() {
    document.getElementById("page-loader").classList.remove("hidden");
  }

  function hideLoader() {
    document.getElementById("page-loader").classList.add("hidden");
  }

  loadStocks();
  window.showDeleteModal = showDeleteModal;
  window.editStock = editStock;
  window.showStock = showStock;
}
