<!-- auth navigation -->
<?php
$header_title = "Sign up";
include __DIR__ . '/../includes/auth-nav.php'; ?>
<!-- auth navigation -->

<div class="pt-20 px-4">
    <div class="bg-white rounded-xl shadow-sm p-6 pt-0 mt-2">
        <h2 class="text-lg font-medium text-gray-900 mb-6">Create Account</h2>
        <form class="space-y-4" id="signupForm">
            <div class="mb-2 hidden" id="signUpErrorMsg">
                <div class="bg-red-100 border border-red-400 text-red-700 px-3 py-2 rounded relative text-sm" role="alert">
                    <span class="block sm:inline">The username is already taken.</span>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Username <span
                        class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="text" id="username"
                        class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                        placeholder="Choose a username" required>
                    <div
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center">
                        <i class="ri-at-line text-gray-400 text-lg"></i>
                    </div>
                </div>
                <div class="text-red-500 text-xs mt-1 hidden" id="usernameError">Username must be at least 3
                    characters long</div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Address <span
                        class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="email" id="email"
                        class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                        placeholder="Enter your email address" required>
                    <div
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center">
                        <i class="ri-mail-line text-gray-400 text-lg"></i>
                    </div>
                </div>
                <div class="text-red-500 text-xs mt-1 hidden" id="emailError">Please enter a valid email address
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password <span
                        class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="password" id="password"
                        class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                        placeholder="Create a password" required>
                    <button type="button" id="togglePassword"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center cursor-pointer">
                        <i class="ri-eye-off-line text-gray-400 text-lg"></i>
                    </button>
                </div>
                <div class="text-red-500 text-xs mt-1 hidden" id="passwordError">Password must be at least 8
                    characters long</div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Confirm Password <span
                        class="text-red-500">*</span></label>
                <div class="relative">
                    <input type="password" id="confirmPassword"
                        class="w-full px-4 py-3 pr-12 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent text-sm"
                        placeholder="Confirm your password" required>
                    <button type="button" id="toggleConfirmPassword"
                        class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 flex items-center justify-center cursor-pointer">
                        <i class="ri-eye-off-line text-gray-400 text-lg"></i>
                    </button>
                </div>
                <div class="text-red-500 text-xs mt-1 hidden" id="confirmPasswordError">Passwords do not match</div>
            </div>

            <div class="flex items-start space-x-3 pt-2">
                <input type="checkbox" id="terms" class="mt-1 opacity-0 absolute">
                <div class="relative">
                    <div class="w-5 h-5 border-2 border-gray-300 rounded cursor-pointer flex items-center justify-center"
                        id="termsCheckbox">
                        <i class="ri-check-line text-white text-sm hidden" id="termsCheck"></i>
                    </div>
                </div>
                <label for="terms" class="text-sm text-gray-600 cursor-pointer">
                    I agree to the <a href="#" class="text-primary font-medium">Terms of Service</a> and <a href="#"
                        class="text-primary font-medium">Privacy Policy</a>
                </label>
            </div>
            <div class="text-red-500 text-xs mt-1 hidden" id="termsError">Please accept the terms and conditions
            </div>

            <!-- <a href="javascript:void(0)"> -->
                <button type="submit"
                    class="w-full bg-primary text-white py-3 rounded-lg font-medium !rounded-button cursor-pointer hover:bg-indigo-600 transition-colors mt-6">
                    Create Account
                </button>
            <!-- </a> -->

            <div class="text-center">
                <span class="text-gray-600 text-sm">Already have an account? </span>
                <a href="javascript:void(0)" @click="page='sign-in'" class="text-primary font-medium text-sm cursor-pointer">Sign in</a>
            </div>
        </form>
    </div>
</div>
