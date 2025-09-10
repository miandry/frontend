function initResetPasswordPage() {
  const form = document.getElementById("resetForm");
  const emailInput = document.getElementById("emailInput");
  const emailError = document.getElementById("emailError");
  const submitButton = document.getElementById("submitButton");
  const buttonText = document.getElementById("buttonText");
  const loadingSpinner = document.getElementById("loadingSpinner");
  const successMessage = document.getElementById("successMessage");

  function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
  }

  function showError(message) {
    emailError.querySelector("span").textContent = message;
    emailError.classList.remove("hidden");
    emailInput.classList.add("border-red-500", "focus:ring-red-500");
  }

  function hideError() {
    emailError.classList.add("hidden");
    emailInput.classList.remove("border-red-500", "focus:ring-red-500");
  }

  function setLoading(loading) {
    if (loading) {
      buttonText.textContent = "Sending...";
      loadingSpinner.classList.remove("hidden");
      submitButton.disabled = true;
      submitButton.classList.add("opacity-75", "cursor-not-allowed");
    } else {
      buttonText.textContent = "Send Reset Link";
      loadingSpinner.classList.add("hidden");
      submitButton.disabled = false;
      submitButton.classList.remove("opacity-75", "cursor-not-allowed");
    }
  }

  function showSuccess() {
    successMessage.classList.remove("hidden");
    form.classList.add("hidden");
  }

  emailInput.addEventListener("input", function () {
    if (emailInput.value.trim()) {
      hideError();
    }
  });

  form.addEventListener("submit", function (e) {
    e.preventDefault();

    const email = emailInput.value.trim();

    if (!email) {
      showError("Please enter your email address");
      return;
    }

    if (!validateEmail(email)) {
      showError("Please enter a valid email address");
      return;
    }

    hideError();
    setLoading(true);

    setTimeout(() => {
      setLoading(false);
      showSuccess();
    }, 2000);
  });
}
