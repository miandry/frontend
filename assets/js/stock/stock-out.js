function initStockOutPage() {
  //     PRODUCT SEARCH;
  showLoader();
  const productSearch = document.getElementById("productSearch");
  const productDropdown = document.getElementById("productDropdown");
  const productId = document.getElementById("productId");
  let user = JSON.parse(sessionStorage.getItem("user"));
  let products = [];
  let key = "";
  let prQuantityDefault = null;
  const API_BASE = "/crud/save";
  productSearch.addEventListener("input", async function () {
    const searchTerm = this.value.trim().toLowerCase();
    // fait le recherche a partir de 4 caractere
    if (searchTerm == "") {
      productDropdown.classList.add("hidden");
    } else if (searchTerm.length > 3) {
      // Charger les catégories depuis l’API
      try {
        key = searchTerm.toLowerCase().startsWith("ref-") ? "field_sku" : "title";
        const response = await fetch(
          `/api/v2/node/product?filters[${key}][val]=${searchTerm}&filters[${key}][op]=CONTAINS&sort[val]=nid&sort[op]=desc`
        );
        const data = await response.json();
        products = data.rows;
        renderProducts();
      } catch (error) {
        console.error("Error loading products:", error);
      }
    }
  });

  function renderProducts() {
    const container = document.getElementById("productList");
    container.innerHTML = "";
    if (products.length > 0) {
      container.innerHTML = products
        .map(
          (pr) => `
                        <div class="flex items-center px-3 py-2 hover:bg-gray-50 rounded cursor-pointer"
                             onclick="showSelected(${pr.nid}, '${pr.title}',${pr.field_quantite_disponible} );">
                          <img
                            src="${pr.field_images[0].image.url}"
                            alt="product image" class="w-10 h-10 object-cover rounded">
                          <span class="ml-3 text-sm">${pr.title}</span>
                        </div>
                  `
        )
        .join("");
    } else {
      container.innerHTML = `
                <div class="flex items-center px-3 py-2 hover:bg-gray-50 rounded cursor-pointer">
                    <p class="font-medium text-center text-gray-500">No items found with this keyword</p>
                  </div>
            `;
    }
    productDropdown.classList.remove("hidden");
  }

  function showSelected(id, title, quantity) {
    productId.value = id;
    productSearch.value = title;
    prQuantityDefault = quantity;
    document.getElementById("quantity").value = quantity;
    document.getElementById("qttyDipso").textContent = quantity;
    document.getElementsByClassName("qttyDipso")[0].classList.remove("hidden");
    productDropdown.classList.add("hidden");
  }

  document.addEventListener("click", function (event) {
    if (
      !productSearch.contains(event.target) &&
      !productDropdown.contains(event.target)
    ) {
      productDropdown.classList.add("hidden");
    }
  });

  //   FORM HANDLER
  const form = document.getElementById("stockEntryForm");
  form.addEventListener("submit", async function (e) {
    e.preventDefault();
    showLoader();
    const data = {
      pId: document.getElementById("productId").value,
      product: document.getElementById("productSearch").value,
      prQuantityDefault: prQuantityDefault,
      quantity: document.getElementById("quantity").value,
      productDescription: document.getElementById("productDescription").value,
      stockRaison: document.getElementById("stockRaison").value
    };

    try {
      const newStockIn = {
        entity_type: "node",
        bundle: "stock",
        uid: user.id,
        status: 1,
        title: data.product + " stock",
        field_product_id: parseInt(data.pId),
        field_quantite: parseInt(data.quantity),
        field_description: data.productDescription,
        field_type: "Sortie",
        field_raison: data.stockRaison,
      };

      const productData = {
        nid: parseInt(data.pId),
        uid: user.id,
        status: 1,
        entity_type: "node",
        bundle: "product",
        field_quantite_disponible: parseInt(data.prQuantityDefault) - parseInt(data.quantity),
      };

      const res = await fetch(API_BASE, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(newStockIn),
      });

      const resPr = await fetch(API_BASE, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(productData),
      });

      const payload = await res.json();
      const payloadPr = await resPr.json();

      if (!res.ok) {
        const msg = payload?.message || `Erreur serveur (${res.status})`;
      }
      if (!resPr.ok) {
        const msg = payloadPr?.message || `Erreur serveur (${resPr.status})`;
      }
    } catch (err) {
      console.error(err);
    } finally {
      showNotification("Ajout effectué avec succès !", "success");
      window.app.page = "all-stocks";
      hideLoader();
    }

    if (!(data.product && data.quantity && data.stockRaison)) {
      const firstEmptyField = form.querySelector(
        "input:required:invalid, select:required:invalid"
      );
      if (firstEmptyField) {
        firstEmptyField.focus();
        firstEmptyField.classList.add("border-red-500");
        setTimeout(() => {
          firstEmptyField.classList.remove("border-red-500");
        }, 3000);
      }
    }
  });

  //   INPUT VALIDATION
  const requiredInputs = document.querySelectorAll(
    "input[required], select[required]"
  );
  requiredInputs.forEach((input) => {
    input.addEventListener("blur", function () {
      if (!this.value.trim()) {
        this.classList.add("border-red-300");
      } else {
        this.classList.remove("border-red-300");
      }
    });
    input.addEventListener("input", function () {
      if (this.value.trim()) {
        this.classList.remove("border-red-300");
      }
    });
  });

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
  hideLoader();

  window.showSelected = showSelected;
}
