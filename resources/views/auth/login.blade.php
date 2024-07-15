<x-guest-layout>

    <!-- Header with Logo -->
    <div class="header">
        <img src="{{ asset('images/favicon.png') }}" alt="Sizzles and Sage Logo" class="logo">
        <h2 class="welcome-text">Welcome back to Sizzles and Sage</h2>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="text-gray-300" />
            <x-text-input id="email" class="block mt-1 w-full dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600 dark:focus:ring-goldenrod focus:ring-goldenrod dark:focus:ring-goldenrod dark:focus:ring-offset-gray-800" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" class="text-gray-300" />
            <x-text-input id="password" class="block mt-1 w-full dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 border-gray-300 dark:border-gray-600 dark:focus:ring-goldenrod focus:ring-goldenrod dark:focus:ring-goldenrod dark:focus:ring-offset-gray-800" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center text-gray-300">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-600 text-goldenrod dark:text-goldenrod shadow-sm focus:ring-goldenrod dark:focus:ring-goldenrod dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm dark:text-gray-300">{{ __('Remember me') }}</span>
            </label>
        </div>

        <!-- Forgot Password Link -->
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-300 dark:text-gray-300 hover:text-gray-400 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-goldenrod dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <!-- Login Button -->
            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
    body {
        background-color: #1a202c; /* Dark background color */
        color: #e2e8f0; /* Light text color */
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .logo {
        max-width: 200px;
        height: auto;
        display: block;
        margin: 0 auto; /* Center the logo horizontally */
    }

    .welcome-text {
        font-size: 1.5rem;
        margin-top: 10px;
        color: #cbd5e0; /* Adjust welcome text color */
        font-family: 'Oleo Script Swash Caps', cursive;
        font-weight: 100;
    }

    .login-form {
        max-width: 400px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #2d3748; /* Darker border color */
        border-radius: 8px;
        background-color: #2d3748; /* Darker background color */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Example box shadow */
    }
</style>
