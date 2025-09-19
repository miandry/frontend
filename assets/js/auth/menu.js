function initMenu() {
  document.body.style.overflow = "auto";
  const menuButton = document.querySelector(".ri-menu-line")?.parentElement;
  const sideMenu = document.getElementById("sideMenu");
  const menuOverlay = document.getElementById("menuOverlay");
  const closeButton = document.getElementById("closeMenu");
  const logoutButton = document.getElementById("logoutButton");
  const menuBurger = document.getElementById("menuBurger");

  if (!sessionStorage.getItem("user")) {
    logoutButton.classList.add("hidden");
    menuBurger.classList.add("hidden");
  } else {
    logoutButton.classList.remove("hidden");
    menuBurger.classList.remove("hidden");
  }

  function openMenu() {
    sideMenu.classList.remove("-translate-x-full");
    document.body.style.overflow = "hidden";
  }

  function closeMenu() {
    sideMenu.classList.add("-translate-x-full");
    document.body.style.overflow = "auto";
  }

  function handleLogout() {
    // empêcher plusieurs popups
    if (document.getElementById("logoutConfirmDialog")) return;

    const confirmDialog = document.createElement("div");
    confirmDialog.id = "logoutConfirmDialog";
    confirmDialog.className =
      "fixed inset-0 z-50 flex items-center justify-center";
    confirmDialog.innerHTML = `
      <div class="absolute inset-0 bg-black bg-opacity-50"></div>
      <div class="relative bg-white rounded-xl p-6 w-80 space-y-4">
        <h3 class="text-lg font-medium text-gray-900">Confirm Logout</h3>
        <p class="text-gray-600">Are you sure you want to logout?</p>
        <div class="flex space-x-3">
          <button id="cancelLogout" class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium">Cancel</button>
          <button id="confirmLogout" class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-medium">Logout</button>
        </div>
      </div>
    `;
    document.body.appendChild(confirmDialog);

    document.getElementById("cancelLogout").addEventListener("click", () => {
      confirmDialog.remove();
    });
    document.getElementById("confirmLogout").addEventListener("click", () => {
      confirmDialog.remove();
      sessionStorage.removeItem("user");
      window.app.isLoggedIn = false;
      window.app.page = "sign-in";
    });
    confirmDialog.querySelector(".bg-black").addEventListener("click", () => {
      confirmDialog.remove();
    });
  }

  // attacher les events UNE SEULE FOIS
  if (menuButton && !menuButton.dataset.bound) {
    menuButton.addEventListener("click", openMenu);
    menuButton.dataset.bound = "true";
  }
  if (closeButton && !closeButton.dataset.bound) {
    closeButton.addEventListener("click", closeMenu);
    closeButton.dataset.bound = "true";
  }
  if (menuOverlay && !menuOverlay.dataset.bound) {
    menuOverlay.addEventListener("click", closeMenu);
    menuOverlay.dataset.bound = "true";
  }
  if (logoutButton && !logoutButton.dataset.bound) {
    logoutButton.addEventListener("click", handleLogout);
    logoutButton.dataset.bound = "true";
  }

  // Accordion Menu
  const menuSections = document.querySelectorAll(".menu-section");
  menuSections.forEach((section) => {
    const button = section.querySelector("button");
    const submenu = section.querySelector(".submenu");
    const arrow = button.querySelector(".ri-arrow-down-s-line");

    // vérifier si déjà attaché
    if (button.dataset.accordionBound) return;

    button.addEventListener("click", () => {
      const isActive = button.classList.contains("active");

      menuSections.forEach((otherSection) => {
        if (otherSection !== section) {
          otherSection.querySelector("button").classList.remove("active");
          otherSection.querySelector(".submenu").classList.remove("active");
          otherSection.querySelector(".ri-arrow-down-s-line").style.transform =
            "rotate(0deg)";
        }
      });

      button.classList.toggle("active");
      submenu.classList.toggle("active");
      arrow.style.transform = button.classList.contains("active")
        ? "rotate(180deg)"
        : "rotate(0deg)";
    });

    button.dataset.accordionBound = "true";
  });
}
