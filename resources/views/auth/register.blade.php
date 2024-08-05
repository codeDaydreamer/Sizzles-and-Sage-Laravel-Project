<x-guest-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Oleo+Script+Swash+Caps&display=swap');
        .register-container {
            width: 100%;
            margin: auto;
            padding: 20px;
            backdrop-filter: blur(10px);
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center; /* Center align the content */
        }

        .register-form {
            text-align: left; /* Reset text alignment for form elements */
            color: #fff;
        }

        .header {
            margin-bottom: 20px;
        }

        .logo {
            display: block;
            margin: 0 auto; /* Center the logo horizontally */
            width: auto;
            height: 100px;
            margin-bottom: 3px;
        }

        .welcome-text {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: whitesmoke;
            font-family: 'Oleo Script Swash Caps', cursive;
            font-weight: 100;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            background-color: #444;
            color: #fff;
            border: 1px solid #666;
            border-radius: 4px;
        }

        .primary-button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 4px;
        }

        .primary-button:hover {
            background-color: #45a049;
        }

        .primary-button:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.2);
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-600 {
            color: #ccc;
        }

        .hover:text-gray-900:hover {
            color: #fff;
        }
    </style>

    <div class="header">
        <img src="{{ asset('images/sizzles.png') }}" alt="Sizzles and Sage Logo" class="logo">
        <h2 class="welcome-text">Karibu Sizzles and Sage !!</h2>
    </div>

    <div class="register-container">

        <form method="POST" action="{{ route('register') }}" class="register-form">
            @csrf

            <!-- Name -->
            <div class="form-group">
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone Number -->
            <div class="form-group">
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input id="phone" class="form-control" type="text" name="phone" :value="old('phone')" required />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="form-group">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="form-group mt-4">
                <a href="{{ route('login') }}" class="text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="ms-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>

        </form>
    </div>
</x-guest-layout>
