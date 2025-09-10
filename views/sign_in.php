<!-- auth navigation -->
<?php
$header_title = "Sign in";
include __DIR__ . '/../includes/auth-nav.php'; ?>
<!-- end auth navigation -->

<div class="pt-20 pb-24 px-4">
    <div class="bg-white rounded-xl shadow-sm p-6 mt-4">
        <h2 class="text-lg font-medium text-gray-900 mb-6">Sign In</h2>
        <div class="space-y-4">
            <div class="mb-2 hidden" id="loginErrorMsg">
                <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative text-sm" role="alert">
                    <span class="block sm:inline">These credentials do not match.</span>
                </div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                <div class="relative">
                    <input type="text" id="username"
                        class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                        placeholder="Enter your username">
                    <div
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center">
                        <i class="ri-user-line text-gray-400 text-lg"></i>
                    </div>
                </div>
                <div class="text-red-500 text-xs mt-1 ms-4 hidden" id="usernameError">Please fill out this field</div>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <div class="relative">
                    <input type="password" id="passwordInput"
                        class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                        placeholder="Enter your password">
                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center cursor-pointer">
                        <i class="ri-eye-off-line text-gray-400 text-lg"></i>
                    </button>
                </div>
                <div class="text-red-500 text-xs mt-1 ms-4 hidden" id="passwordError">Please fill out this field</div>
            </div>
            <div class="text-right">
                <a href="javascript:void(0)" @click="page='password-reset'" class="text-primary text-sm font-medium cursor-pointer">Forgot password?</a>
            </div>
            <!-- <a href="/stock-management"> -->
            <button id="signIn"
                class="w-full bg-primary text-white py-3 rounded-lg font-medium !rounded-button cursor-pointer hover:bg-indigo-600 transition-colors">
                Sign In
            </button>
            <!-- </a> -->
            <div class="text-center">
                <span class="text-gray-600 text-sm">Don't have an account? </span>
                <a href="javascript:void(0)" @click="page='sign-up'" class="text-primary font-medium text-sm cursor-pointer">Sign up now!</a>
            </div>
        </div>
    </div>
</div>