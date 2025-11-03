<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-500 via-purple-600 to-pink-500 relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-500 via-purple-600 to-pink-500 opacity-75"></div>
        <div class="absolute top-10 left-10 w-20 h-20 bg-white rounded-full opacity-10 animate-bounce"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-white rounded-full opacity-10 animate-pulse"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-white rounded-full opacity-20 animate-ping"></div>

        <div class="relative z-10 max-w-md w-full bg-white dark:bg-gray-800 rounded-2xl shadow-2xl p-8 transform transition-all duration-500 hover:scale-105 backdrop-blur-sm bg-opacity-90">
            <div class="mb-6 text-center">
                <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-600 mb-2 animate-pulse">Welcome Back!</h2>
                <p class="text-gray-600 dark:text-gray-400 text-lg">Sign in to discover and book amazing events</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div class="relative">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 dark:text-gray-300 font-semibold" />
                    <div class="relative">
                        <x-text-input id="email" class="block mt-1 w-full pl-12 pr-4 py-3 border-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-xl shadow-lg transition-all duration-300 focus:shadow-xl focus:scale-105" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 font-medium" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 dark:text-gray-300 font-semibold" />
                    <div class="relative">
                        <x-text-input id="password" class="block mt-1 w-full pl-12 pr-4 py-3 border-2 border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-purple-500 focus:ring-purple-500 rounded-xl shadow-lg transition-all duration-300 focus:shadow-xl focus:scale-105" type="password" name="password" required autocomplete="current-password" />
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500 font-medium" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 dark:border-gray-700 text-purple-600 shadow-sm focus:ring-purple-500 dark:focus:ring-purple-600 dark:focus:ring-offset-gray-800 transition-all duration-200" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-400 font-medium">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-purple-600 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-200 font-semibold transition-colors duration-200 underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="pt-4">
                    <x-primary-button class="w-full bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Additional creative element -->
            <div class="mt-6 text-center">
                <p class="text-gray-500 dark:text-gray-400 text-sm">Don't have an account?
                    <a href="{{ route('register') }}" class="text-purple-600 hover:text-purple-800 dark:text-purple-400 dark:hover:text-purple-200 font-semibold transition-colors duration-200">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
