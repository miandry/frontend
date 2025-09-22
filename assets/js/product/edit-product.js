function initEditPage() {
  showLoader();
  document.body.style.overflow = "auto";
  // === Configuration ===
  const API_BASE = "/crud/save";
  const ENDPOINT = `/api/v2/node/product`;

  // === Sélecteurs ===
  const form = document.getElementById("productForm");
  const productImageInput = document.getElementById("productImage");
  const imagePreview = document.getElementById("imagePreview");
  let base64File = null;
  const productName = document.getElementById("productName");
  const productDescription = document.getElementById("productDescription");
  const categoryButton = document.getElementById("categoryButton");
  const categoryDropdown = document.getElementById("categoryDropdown");
  const categoryText = document.getElementById("categoryText");
  const prQuantity = document.getElementById("prQuantity");
  const selectedCategory = document.getElementById("selectedCategory");
  const saveButton = document.getElementById("saveButton");
  let user = JSON.parse(sessionStorage.getItem("user"));
  let product = JSON.parse(sessionStorage.getItem("productObject"));

  // fill edit form from product data;
  productName.value = product.title;
  const dataFromServer = product.field_description;

  // Créer un élément temporaire pour parser le HTML
  const tempDiv = document.createElement("div");
  tempDiv.innerHTML = dataFromServer;

  // Extraire le texte sans les balises
  const textOnly = tempDiv.textContent || tempDiv.innerText || "";
  productDescription.value = textOnly;

  prQuantity.value = product.field_quantite_disponible;
  selectedCategory.value = product.field_category.tid;
  categoryText.textContent = product.field_category.title.trim();
  categoryText.classList.remove("text-gray-500");

  imagePreview.innerHTML = `
    <div class="w-full h-full rounded-lg overflow-hidden flex items-center justify-center">
      <img src="${product.field_images[0].image.url}" alt="preview" style="max-height:100%; max-width:100%; object-fit:contain;" />
    </div>
  `;
  base64File = "fake file"
  // FIn remplissage edit form


  function setFormBusy(busy = true) {
    saveButton.disabled = busy;
    saveButton.classList.toggle("opacity-60", busy);
    saveButton.classList.toggle("cursor-not-allowed", busy);
  }

  // === Image preview & validation ===
  const MAX_IMAGE_BYTES = 10 * 1024 * 1024; // 10MB
  productImageInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (!file) return clearImagePreview();
    if (!file.type.startsWith("image/")) {
      // showToast("Le fichier choisi n'est pas une image.", "error");
      productImageInput.value = "";
      return clearImagePreview();
    }
    if (file.size > MAX_IMAGE_BYTES) {
      // showToast("Image trop grande (max 10MB).", "error");
      productImageInput.value = "";
      return clearImagePreview();
    }
    const reader = new FileReader();
    reader.onload = () => {
      imagePreview.innerHTML = `
        <div class="w-full h-full rounded-lg overflow-hidden flex items-center justify-center">
          <img src="${reader.result}" alt="preview" style="max-height:100%; max-width:100%; object-fit:contain;" />
        </div>
      `;
      base64File = reader.result;
    };
    reader.readAsDataURL(file);
  });
  function clearImagePreview() {
    imagePreview.innerHTML = `
    <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center mb-3">
      <i class="ri-camera-line text-gray-500 text-xl"></i>
    </div>
    <p class="text-sm font-medium text-gray-700 mb-1">Ajouter une photo</p>
    <p class="text-xs text-gray-500">PNG, JPG jusqu'à 10MB</p>
  `;
  }
  imagePreview.addEventListener("click", () => productImageInput.click());

  // === Category dropdown ===
  categoryButton.addEventListener("click", (e) => {
    e.stopPropagation();
    categoryDropdown.classList.toggle("hidden");
  });
  document.addEventListener("click", () =>
    categoryDropdown.classList.add("hidden")
  );
  document.querySelectorAll(".category-option").forEach((btn) => {
    btn.addEventListener("click", () => {
      selectedCategory.value = btn.dataset.value;
      categoryText.textContent = btn.textContent.trim();
      categoryText.classList.remove("text-gray-500");
      categoryDropdown.classList.add("hidden");
    });
  });

  // === Validation ===
  function validateForm() {
    // Image obligatoire base64File
    const file = productImageInput.files[0];
    let nameError = document.getElementById("imgError");
    const input = document.querySelector("#imagePreview");
    if (base64File !== "fake file") {
      if (!file) {
        nameError.textContent = "L'image du produit est requis.";
        nameError.classList.remove("hidden");
        input.classList.replace("border-gray-300", "border-red-500");
        input.scrollIntoView({ behavior: "smooth", block: "center" });
        return false;
      }
      if (!file.type.startsWith("image/")) {
        nameError.textContent = "Le fichier doit être une image.";
        nameError.classList.remove("hidden");
        input.classList.replace("border-gray-300", "border-red-500");
        input.scrollIntoView({ behavior: "smooth", block: "center" });
        return false;
      }
      if (file.size > MAX_IMAGE_BYTES) {
        // console.log("L’image dépasse 10MB.", "error");
        nameError.textContent = "L’image dépasse 10MB.";
        nameError.classList.remove("hidden");
        input.classList.replace("border-gray-300", "border-red-500");
        input.scrollIntoView({ behavior: "smooth", block: "center" });
        return false;
      }
    }

    // Nom obligatoire (min 3 caractères)
    if (!productName.value.trim()) {
      let nameError = document.getElementById("pNameError");
      nameError.textContent = "Le nom du produit est requis.";
      nameError.classList.remove("hidden");
      const input = document.querySelector("#productName");
      input.classList.replace("border-gray-300", "border-red-500");
      input.scrollIntoView({ behavior: "smooth", block: "center" });
      return false;
    }
    if (productName.value.trim().length < 3) {
      let nameError = document.getElementById("pNameError");
      nameError.textContent =
        "Le nom du produit doit contenir au moins 3 caractères.";
      nameError.classList.remove("hidden");
      const input = document.querySelector("#productName");
      input.classList.replace("border-gray-300", "border-red-500");
      input.scrollIntoView({ behavior: "smooth", block: "center" });
      return false;
    }

    // Description (optionnelle mais max 500 caractères)
    if (productDescription.value.trim().length > 500) {
      let descError = document.getElementById("descError");
      descError.textContent =
        "La description ne doit pas dépasser 500 caractères.";
      descError.classList.remove("hidden");
      const input = document.querySelector("#productDescription");
      input.classList.replace("border-gray-300", "border-red-500");
      input.scrollIntoView({ behavior: "smooth", block: "center" });
      return false;
    }

    // Catégorie obligatoire
    if (!selectedCategory.value) {
      document.getElementById("catError").classList.remove("hidden");
      document
        .querySelector("#categoryButton")
        .classList.replace("border-gray-300", "border-red-500");
      return false;
    }

    return true;
  }

  // === Submit (direct) ===
  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    if (!validateForm()) return;
    await updateProduct();
  });

  // === AJAX envoi ===
  async function updateProduct() {
    showLoader();
    
    try {
      setFormBusy(true);
      const cat = document.getElementById("selectedCategory").value;
      const editProductData = {
        nid: parseInt(product.nid),
        title: productName.value.trim(),
        entity_type: "node",
        bundle: "product",
        field_category: parseInt(cat),
        field_description: productDescription.value.trim(),
        uid: user.id,
        status: 1,
        field_quantite_disponible: parseInt(prQuantity.value),
        field_images: base64File,
      };
      if (base64File == "fake file") {
        delete editProductData.field_images;
      }
      const res = await fetch(API_BASE, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(editProductData),
      });

      const payload = await res.json();

      if (!res.ok) {
        const msg = payload?.message || `Erreur serveur (${res.status})`;
      }
    } catch (err) {
      console.error(err);
    } finally {
      showNotification("Produit modifié avec succès !", "success");
      window.app.page = "all-products";
      hideLoader();
    }
  }

  let categories = [];

  // Charger les catégories depuis l’API
  async function loadCategories() {
    try {
      const response = await fetch(
        "/api/v2/taxonomy_term/category?sort[val]=tid&sort[op]=desc"
      );
      const data = await response.json();
      categories = data.rows;
      renderCategories();
    } catch (error) {
      console.error("Error loading categories:", error);
    }
  }

  // Générer la liste des catégories dans le dropdown
  function renderCategories() {
    const list = document.getElementById("categoryList");
    list.innerHTML = "";

    categories.forEach((cat) => {
      const btn = document.createElement("button");
      btn.type = "button";
      btn.className =
        "category-option w-full px-4 py-2 text-left text-sm hover:bg-gray-100 cursor-pointer";
      btn.dataset.value = cat.tid; // ou cat.id selon ta structure
      btn.textContent = cat.name; // ou cat.title

      btn.addEventListener("click", () => {
        document.getElementById("categoryText").textContent = cat.name;
        document
          .getElementById("categoryText")
          .classList.remove("text-gray-500");
        document.getElementById("selectedCategory").value = cat.tid;
        document.getElementById("categoryDropdown").classList.add("hidden");
      });

      list.appendChild(btn);
    });
  }

  loadCategories();

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
}
