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
            <div class="input-group">
                <label for="username">Username<span class="required text-red-500 font-mono">*</span></label>
                <input class="username-input" type="text" id="username" name="username"
                    placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="password">Password<span class="required text-red-500 font-mono">*</span></label>
                <div class="password-wrapper relative">
                    <input class="pw-input" type="password" id="password" name="password" placeholder="Enter password"
                        required>
                </div>
            </div>
            <div class="options flex justify-between text-xs mb-4">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
                <a href="#">Forgot your password?</a>
            </div>
            <button
                class="login-btn bg-indigo-500 text-white border-none px-4 py-2 text-base rounded cursor-pointer w-full"
                type="submit">Log In</button>
        </form>
        <p class="register text-sm text-gray-600 mt-4">
            Don’t have an account? <a href="#">Register here</a>
        </p>
    </div>
</body>

</html>
