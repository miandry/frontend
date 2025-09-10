<!-- auth navigation -->
<?php
$header_title = "Reset password";
include __DIR__ . '/../includes/auth-nav.php'; ?>
<!-- auth navigation -->

<div class="pt-20 px-4">
    <div class="bg-white rounded-xl shadow-sm p-6 pt-0 mt-2">
        <div class="text-center mb-6">
            <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="ri-lock-password-line text-primary text-2xl"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-900 mb-2">Forgot Your Password?</h2>
            <p class="text-gray-600 text-sm">Enter your registered email address and we'll send you a link to reset
                your password.</p>
        </div>

        <form id="resetForm" class="space-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                <div class="relative">
                    <input type="email" id="emailInput"
                        class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                        placeholder="Enter your registered email" required>
                    <div
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center">
                        <i class="ri-mail-line text-gray-400 text-lg"></i>
                    </div>
                </div>
                <div id="emailError" class="hidden mt-2 text-red-600 text-sm flex items-center">
                    <i class="ri-error-warning-line mr-1"></i>
                    <span>Please enter a valid email address</span>
                </div>
            </div>

            <button type="submit" id="submitButton"
                class="w-full bg-primary text-white py-3 rounded-lg font-medium !rounded-button cursor-pointer hover:bg-indigo-600 transition-colors flex items-center justify-center">
                <span id="buttonText">Send Reset Link</span>
                <div id="loadingSpinner"
                    class="hidden ml-2 w-4 h-4 border-2 border-white border-t-transparent rounded-full animate-spin">
                </div>
            </button>

            <div id="successMessage"
                class="hidden bg-green-50 border border-green-200 rounded-lg p-4 flex items-center">
                <div class="w-5 h-5 flex items-center justify-center mr-3">
                    <i class="ri-check-line text-green-600"></i>
                </div>
                <div>
                    <p class="text-green-800 font-medium text-sm">Reset link sent successfully!</p>
                    <p class="text-green-700 text-xs mt-1">Check your email inbox and follow the instructions to
                        reset your password.</p>
                </div>
            </div>

            <div class="text-center">
                <span class="text-gray-600 text-sm">Remember your password? </span>
                <a href="javascript:void(0)" @click="page='sign-in'" class="text-primary font-medium text-sm cursor-pointer">Back to Sign In</a>
            </div>
        </form>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-6 mt-4">
        <h3 class="text-lg font-medium text-gray-900 mb-3">Need Help?</h3>
        <div class="space-y-3">
            <div class="flex items-start">
                <div class="w-5 h-5 flex items-center justify-center mr-3 mt-0.5">
                    <i class="ri-question-line text-primary text-sm"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-700 font-medium">Can't find the email?</p>
                    <p class="text-xs text-gray-600 mt-1">Check your spam or junk folder. The email might take a few
                        minutes to arrive.</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-5 h-5 flex items-center justify-center mr-3 mt-0.5">
                    <i class="ri-mail-check-line text-primary text-sm"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-700 font-medium">Wrong email address?</p>
                    <p class="text-xs text-gray-600 mt-1">Make sure you're using the email address associated with
                        your account.</p>
                </div>
            </div>
            <div class="flex items-start">
                <div class="w-5 h-5 flex items-center justify-center mr-3 mt-0.5">
                    <i class="ri-customer-service-line text-primary text-sm"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-700 font-medium">Still having trouble?</p>
                    <p class="text-xs text-gray-600 mt-1">Contact our support team for additional assistance.</p>
                </div>
            </div>
        </div>
    </div>
</div>