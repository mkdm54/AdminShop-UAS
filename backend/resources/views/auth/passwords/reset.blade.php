<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    @vite(['resources/css/reset.css', 'resources/js/reset.js'])
    <title>Reset Password Page</title>
</head>

<body class="bg-orange-600 flex justify-center items-center h-screen m-0">
    <div class="flex flex-col items-center gap-4">
        <x-alert-message></x-alert-message>
        <div class="login-container bg-white p-8 rounded-lg shadow-md text-center w-96">
            <div class="flex flex-col items-center gap-4">
                <x-alert-message></x-alert-message>
                <h1 class="uppercase font-bold">Reset Password</h1>
                <form id="form-reset">
                    <input type="hidden" name="token" value="{{ $token }}">
                    <x-input-component id="email-input" name="email" label="Email" type="email"
                        placeholder="Enter your email" required></x-input-component>
                    <x-input-component id="password-input" name="password" label="New Password" type="password"
                        placeholder="Enter new password" required></x-input-component>
                    <x-input-component id="password-input" name="password_confirmation" label="Confirm Password"
                        type="password" placeholder="Confirm new password" required></x-input-component>
                    <x-button type="submit">Reset Password</x-button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
