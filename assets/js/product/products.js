function initProductsPage() {
  let products = [];
  let pageNumber = 0;
  let totalProducts = 0;
  let totalPages = 0;
  let searchTerm = "";
  let dateFilterValue = "desc";
  let catFilterValue = "";
  let catQuery = "";
  const perPage = 10;
  const loadMore = document.getElementById("loadMore");
  const searchProductInput = document.getElementById("searchProductInput");
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
  async function loadProducts() {
    // showLoader();
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
      // hideLoader();
    }
  }

  searchProductInput.addEventListener("input", function () {
    searchTerm = this.value.trim().toLowerCase();
    // fait le recherche a partir de 4 caractere
    if (searchTerm.length > 3 || searchTerm == "") {
      loadProducts();
    }
  });

  applyFilters.addEventListener('click', function () {
    dateFilterValue = prDate.value;
    if (prCategory.value) {
      catFilterValue = "&filters[field_category][val]=" + prCategory.value;
    } else {
      catFilterValue = "";
    }
    loadProducts();
    filterPanel.classList.remove("active");
  })

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
                                <div class="mt-2 flex items-center justify-between">
                                    <span class="text-primary font-medium">${
                                      pr.field_price
                                    } Ar</span>
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
    console.log(pageNumber, totalPages);
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
      categories.forEach(cat => {
        const option = document.createElement("option");
        option.value = cat.tid;       // si tid est l'identifiant
        option.textContent = cat.name; // si name est le libellé
        select.appendChild(option);
      });

    } catch (error) {
      console.error("Error loading categories:", error);
    }
  }
  loadCategories();
  loadProducts();
}
