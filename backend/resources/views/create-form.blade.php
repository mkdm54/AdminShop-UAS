<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/form.css'])
    <title>Register Page</title>
</head>

<body class="bg-indigo-500 flex justify-center items-center h-screen m-0">
    <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
        {{-- <div class="logo">
            <img src="logo.png" alt="Logo">
        </div> --}}
        <h1 class="uppercase font-bold">register</h1>
        <form id="form-input" method="POST" action="{{ route('register.submit') }}">
            @csrf
            <x-input-component id="username-input" name="username" label="Username" type="text" placeholder="Enter your username"></x-input-component>
            <x-input-component id="password-input" name="password" label="Password" type="password" placeholder="Enter your password"></x-input-component>
            <x-button type="submit">Register</x-button>
        </form>
    </div>
</body>

</html>
