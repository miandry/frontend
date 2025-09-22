function initAllStocksPage() {
  showLoader();
  let stocks = [];
  let pageNumber = 0;
  let totalStocks = 0;
  let totalPages = 0;
  let searchTerm = "";
  let dateFilterValue = "desc";
  let stType = "";
  const perPage = 10;
  const loadMore = document.getElementById("loadMore");
  const searchStockInput = document.getElementById("searchStockInput");
  // filter variable
  const filterBtn = document.getElementById("filterBtn");
  const filterPanel = document.getElementById("filterPanel");
  const closeFilterBtn = document.getElementById("closeFilterBtn");
  const prCategory = document.getElementById("prCategory");
  const prDate = document.getElementById("prDate");

  filterBtn.addEventListener("click", function () {
    filterPanel.classList.add("active");
  });
  closeFilterBtn.addEventListener("click", function () {
    filterPanel.classList.remove("active");
  });

  // Charger les catégories depuis l’API
  async function loadStocks() {
    try {
      const response = await fetch(
        `/api/v2/node/stock?sort[val]=nid&sort[op]=${dateFilterValue}&filters[title][val]=${searchTerm}&filters[title][op]=CONTAINS&${stType}&pager=${pageNumber}&offset=${perPage}`
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

  applyFilters.addEventListener("click", function () {
    dateFilterValue = prDate.value;
    loadStocks();
    filterPanel.classList.remove("active");
  });

  function renderStocks() {
    const container = document.getElementById("stockList");
    container.innerHTML = "";
    if (stocks.length > 0) {
      container.innerHTML = stocks
        .map(
          (st) => `
                    <div class="bg-white p-2 rounded-lg shadow-sm border ${st.field_type == "Entrée" ? "border-green-500" : "border-red-500"}" data-id="${
                      st.nid
                    }">
                        <div class="flex space-x-4 items-center">
                            <div class="w-20 h-20 bg-gray-100 rounded-lg overflow-hidden">
                                <img src=""
                                    class="w-full h-full object-cover" alt="Image produit">
                            </div>
                            <div class="flex-1">
                                <h3 class="font-medium text-gray-900">${
                                  st.title
                                }</h3>
                                <div class="text-sm text-gray-500 mt-1"></div>
                                <div class="mt-2 flex items-center justify-between">
                                  ${
                                    st.field_raison
                                      ? `<span class="text-blue-500">${st.field_raison}</span>`
                                      : `
                                        <span title="Prix" class="text-yellow-500">PA: ${st.field_price} Ar</span>
                                        <span title="Prix de vente" class="text-green-500">PV: ${st.field_prix_de_vente} Ar</span>
                                      `
                                  }
                                </div>
                                <div class="mt-2 flex items-center justify-between">
                                    <span class="text-purple-500">Qtté: ${st.field_quantite}</span>
                                    <span class="${st.field_type == "Entrée" ? "text-green-500" : "text-red-500"}">${st.field_type == "Entrée" ? "Entrée" : "Sortie"}</span>
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

  loadStocks();
}
