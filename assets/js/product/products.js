function initProductsPage() {
  let products = [];
  let pageNumber = 0;
  let totalProducts = 0;
  let totalPages = 0;
  const perPage = 10;
  const loadMore = document.getElementById("loadMore");
  // Charger les catégories depuis l’API
  async function loadProducts() {
    showLoader();
    try {
      const response = await fetch(
        `/api/v2/node/product?sort[val]=nid&sort[op]=desc&pager=${pageNumber}&offset=${perPage}`
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

  function renderProducts() {
    const container = document.getElementById("productList");
    container.innerHTML = "";

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

  loadProducts();
}
