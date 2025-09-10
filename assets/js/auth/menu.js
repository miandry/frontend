function initMenu() {
  document.body.style.overflow = "auto";
  const menuButton = document.querySelector(".ri-menu-line").parentElement;
  const sideMenu = document.getElementById("sideMenu");
  const menuOverlay = document.getElementById("menuOverlay");
  const closeButton = document.getElementById("closeMenu");
  const logoutButton = document.getElementById("logoutButton");
  
  if (!sessionStorage.getItem("user")) {
    logoutButton.classList.add('hidden')
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
    const confirmDialog = document.createElement("div");
    confirmDialog.className =
      "fixed inset-0 z-50 flex items-center justify-center";
    confirmDialog.innerHTML = `
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
          <div class="relative bg-white rounded-xl p-6 w-80 space-y-4">
            <h3 class="text-lg font-medium text-gray-900">Confirm Logout</h3>
            <p class="text-gray-600">Are you sure you want to logout?</p>
            <div class="flex space-x-3">
            <button class="flex-1 px-4 py-2 bg-gray-100 text-gray-700 rounded-lg font-medium" id="cancelLogout">Cancel</button>
            <button class="flex-1 px-4 py-2 bg-red-600 text-white rounded-lg font-medium" id="confirmLogout">Logout</button>
          </div>
        </div>
        `;
    document.body.appendChild(confirmDialog);
    document.getElementById("cancelLogout").addEventListener("click", () => {
      document.body.removeChild(confirmDialog);
    });
    document.getElementById("confirmLogout").addEventListener("click", () => {
      document.body.removeChild(confirmDialog);
      sessionStorage.removeItem("user");
      window.app.isLoggedIn = false;
      window.app.page = "sign-in";
    });
    confirmDialog.querySelector(".bg-black").addEventListener("click", () => {
      document.body.removeChild(confirmDialog);
    });
  }
  menuButton.addEventListener("click", openMenu);
  closeButton.addEventListener("click", closeMenu);
  menuOverlay.addEventListener("click", closeMenu);
  logoutButton.addEventListener("click", handleLogout);
}
