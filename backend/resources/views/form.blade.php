<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/form.css', 'resources/js/form.js'])
    <title>Login Page</title>
</head>

<body class="bg-orange-600 flex justify-center items-center h-screen m-0">
    <div class="flex flex-col items-center gap-4">
        <x-alert-message></x-alert-message>
        <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
            <form id="form-input">
                @csrf
                <x-input-component id="username-input" name="username" label="Username" type="text" placeholder="Enter your username" ></x-input-component>
                <x-input-component id="password-input" name="password" label="Password" type="password" placeholder="Enter your password" ></x-input-component>
                <div class="options flex justify-between text-xs mb-4">
                    {{-- <label>
                        <input type="checkbox" name="remember">
                        Remember me
                    </label> --}}
                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                </div>
                <x-button type="submit">Log In</x-button>
            </form>
            <p class="register text-sm text-gray-600 mt-4">
                Don’t have an account? <a href="{{ route('register.form') }}">Register here</a>
            </p>
        </div>
    </div>
</body>


</html>
