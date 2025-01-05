<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite(['resources/css/form.css'])
    <title>Forgot Password Page</title>
</head>

<body class="bg-indigo-500 flex justify-center items-center h-screen m-0">
    <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
        {{-- <div class="logo">
            <img src="logo.png" alt="Logo">
        </div> --}}
        <h1 class="uppercase font-bold">Reset Password</h1>
        <form id="form-input" method="POST" action="{{ route('password.email') }}">
            @csrf
            <x-input-component name="email" label="Email" type="email" placeholder="Enter your email"></x-input-component>
            <x-button type="submit">Send Password Reset Link</x-button>
        </form>
    </div>
</body>

</html>
