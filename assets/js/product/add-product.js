function initAddPage() {
  document.body.style.overflow = "auto";
  // image upload handler
  const imageInput = document.getElementById("productImage");
  const imagePreview = document.getElementById("imagePreview");
  imageInput.addEventListener("change", function (e) {
    const file = e.target.files[0];
    if (file) {
      const reader = new FileReader();
      reader.onload = function (e) {
        imagePreview.innerHTML = `
                            <img src="${e.target.result}" alt="Aperçu du produit" class="w-full h-full object-cover rounded-lg">
                            <div class="absolute inset-0 bg-black bg-opacity-40 rounded-lg flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                            <div class="text-white text-center">
                            <i class="ri-camera-line text-2xl mb-2"></i>
                            <p class="text-sm">Changer l'image</p>
                            </div>
                            </div>
                            `;
        imagePreview.classList.remove("image-upload-area");
      };
      reader.readAsDataURL(file);
    }
  });

  // dropdown handlers
  const categoryButton = document.getElementById("categoryButton");
  const categoryDropdown = document.getElementById("categoryDropdown");
  const categoryText = document.getElementById("categoryText");
  const selectedCategory = document.getElementById("selectedCategory");
  const categoryOptions = document.querySelectorAll(".category-option");

  function toggleDropdown(dropdown, button) {
    const isHidden = dropdown.classList.contains("hidden");
    document.querySelectorAll(".dropdown-menu").forEach((menu) => {
      if (menu !== dropdown) {
        menu.classList.add("hidden");
      }
    });
    if (isHidden) {
      dropdown.classList.remove("hidden");
      button.querySelector("i").classList.add("rotate-180");
    } else {
      dropdown.classList.add("hidden");
      button.querySelector("i").classList.remove("rotate-180");
    }
  }
  categoryButton.addEventListener("click", function (e) {
    e.preventDefault();
    toggleDropdown(categoryDropdown, categoryButton);
  });
  categoryOptions.forEach((option) => {
    option.addEventListener("click", function () {
      const value = this.dataset.value;
      const text = this.textContent;
      categoryText.textContent = text;
      categoryText.classList.remove("text-gray-500");
      categoryText.classList.add("text-gray-900");
      selectedCategory.value = value;
      categoryDropdown.classList.add("hidden");
      categoryButton.querySelector("i").classList.remove("rotate-180");
    });
  });
  document.addEventListener("click", function (e) {
    if (
      !categoryButton.contains(e.target) &&
      !categoryDropdown.contains(e.target)
    ) {
      categoryDropdown.classList.add("hidden");
      categoryButton.querySelector("i").classList.remove("rotate-180");
    }
  });
  // form validation
  const form = document.getElementById("productForm");
  const saveButton = document.getElementById("saveButton");
  const cancelButton = document.getElementById("cancelButton");
  form.addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(form);
    const productName = formData.get("productName");
    const category = formData.get("category");
    const unitPrice = formData.get("unitPrice");
    if (!productName || !category || !unitPrice) {
      showNotification(
        "Veuillez remplir tous les champs obligatoires.",
        "error"
      );
      return;
    }
    saveButton.innerHTML = `
                    <div class="flex items-center justify-center space-x-2">
                    <div class="w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin"></div>
                    <span>Enregistrement...</span>
                    </div>
`;
    saveButton.disabled = true;
    setTimeout(() => {
      showNotification("Produit ajouté avec succès !", "success");
      setTimeout(() => {
        window.location.href =
          "https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2";
      }, 1500);
    }, 2000);
  });
  cancelButton.addEventListener("click", function () {
    if (
      confirm(
        "Êtes-vous sûr de vouloir annuler ? Toutes les données saisies seront perdues."
      )
    ) {
      window.location.href =
        "https://readdy.ai/home/3a05c30a-4ff6-4426-9fe9-ac94a7137195/e6217220-4989-4827-941b-616335a127a2";
    }
  });
  scanButton.addEventListener("click", function () {
    showNotification("Fonction de scan en cours de développement.", "info");
  });

  function showNotification(message, type) {
    const notification = document.createElement("div");
    const bgColor =
      type === "success"
        ? "bg-secondary"
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
  // input formatting
  const unitPriceInput = document.getElementById("unitPrice");
  unitPriceInput.addEventListener("input", function (e) {
    let value = e.target.value.replace(/[^\d]/g, "");
    if (value) {
      value = parseInt(value).toLocaleString("fr-FR");
    }
  });
  unitPriceInput.addEventListener("blur", function (e) {
    let value = e.target.value.replace(/[^\d]/g, "");
    if (value) {
      e.target.value = parseInt(value);
    }
  });
}
