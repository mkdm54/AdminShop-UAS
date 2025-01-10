<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/form.css'])
    <title>Reset Password Page</title>
</head>

<body class="bg-indigo-500 flex justify-center items-center h-screen m-0">
    <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
        <h1 class="uppercase font-bold">Reset Password</h1>
        <form id="form-reset" method="POST" action="{{ route('password.update') }}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <x-input-component name="email" label="Email" type="email" placeholder="Enter your email" required></x-input-component>
            <x-input-component name="password" label="New Password" type="password" placeholder="Enter new password" required></x-input-component>
            <x-input-component name="password_confirmation" label="Confirm Password" type="password" placeholder="Confirm new password" required></x-input-component>
            <x-button type="submit">Reset Password</x-button>
        </form>
    </div>
</body>

</html>
