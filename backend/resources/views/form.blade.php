<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/form.css'])
    <title>Login Page</title>
</head>

<body class="bg-indigo-500 flex justify-center items-center h-screen m-0">
    <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
        {{-- <div class="logo">
            <img src="logo.png" alt="Logo">
        </div> --}}
        <form id="form-input" method="POST" action="{{ route('login') }}">
            @csrf
            <x-input-component name="username" label="Username" type="text" placeholder="Enter your username"></x-input-component>
            <x-input-component name="password" label="Password" type="password" placeholder="Enter your password"></x-input-component>
            <div class="options flex justify-between text-xs mb-4">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
                <a href="{{ route('password.request') }}">Forgot your password?</a>
            </div>
            <x-button type="submit">Log In</x-button>
        </form>
        <p class="register text-sm text-gray-600 mt-4">
            Don’t have an account? <a href="{{ route('register.form') }}">Register here</a>
        </p>
    </div>
</body>

</html>
