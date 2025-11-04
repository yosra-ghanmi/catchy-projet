<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-primary-50 to-primary-100 relative overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 bg-gradient-to-br from-primary-100 to-primary-200 opacity-75"></div>
        <div class="absolute top-10 left-10 w-20 h-20 bg-primary-300 rounded-full opacity-20 animate-bounce"></div>
        <div class="absolute bottom-10 right-10 w-32 h-32 bg-primary-400 rounded-full opacity-15 animate-pulse"></div>
        <div class="absolute top-1/2 left-1/4 w-16 h-16 bg-primary-500 rounded-full opacity-25 animate-ping"></div>

        <div class="relative z-10 max-w-md w-full bg-white rounded-2xl shadow-2xl p-8 transform transition-all duration-500 hover:scale-105 backdrop-blur-sm">
            <div class="mb-6 text-center">
                <div class="mb-4">
                    <svg class="w-12 h-12 mx-auto text-primary-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <h2 class="text-4xl font-extrabold text-primary-600 mb-2">Welcome Back!</h2>
                <p class="text-gray-600 text-lg">Sign in to discover Tunisia's best places</p>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div class="relative">
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                    <div class="relative">
                        <x-text-input id="email" class="block mt-1 w-full pl-12 pr-4 py-3 border-2 border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-lg transition-all duration-300 focus:shadow-xl focus:scale-105" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-primary-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-primary-500 font-medium" />
                </div>

                <!-- Password -->
                <div class="relative">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                    <div class="relative">
                        <x-text-input id="password" class="block mt-1 w-full pl-12 pr-4 py-3 border-2 border-gray-300 focus:border-primary-500 focus:ring-primary-500 rounded-xl shadow-lg transition-all duration-300 focus:shadow-xl focus:scale-105" type="password" name="password" required autocomplete="current-password" />
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2 text-primary-400">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-primary-500 font-medium" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="flex items-center cursor-pointer">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-primary-600 shadow-sm focus:ring-primary-500 transition-all duration-200" name="remember">
                        <span class="ml-2 text-sm text-gray-600 font-medium">{{ __('Remember me') }}</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-primary-600 hover:text-primary-800 font-semibold transition-colors duration-200 underline" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>

                <div class="pt-4">
                    <x-primary-button class="w-full bg-gradient-to-r from-primary-500 to-primary-600 hover:from-primary-600 hover:to-primary-700 text-white font-bold py-3 px-6 rounded-xl shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>
            </form>

            <!-- Additional creative element -->
            <div class="mt-6 text-center">
                <p class="text-gray-500 text-sm">Don't have an account?
                    <a href="{{ route('register') }}" class="text-primary-600 hover:text-primary-800 font-semibold transition-colors duration-200">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</x-guest-layout>
