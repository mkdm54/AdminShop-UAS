<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/css/form.css'])
    <title>Login Page</title>
</head>

<body>
    <div class="login-container">
        {{-- <div class="logo">
            <img src="logo.png" alt="Logo">
        </div> --}}
        <form id="form-input" method="POST">
            @csrf
            <div class="input-group">
                <label for="name">Username<span class="required font-mono">*</span></label>
                <input class="username-input" type="text" id="name" name="name" placeholder="Enter your username" required>
            </div>
            <div class="input-group">
                <label for="email">Email<span class="required font-mono" >*</span></label>
                <input class="email-input" type="email" id="email" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="input-group">
                <label for="password">Password<span class="required font-mono">*</span></label>
                <div class="password-wrapper">
                    <input class="pw-input" type="password" id="password" name="password" placeholder="Enter password" required>
                    <button type="button" class="show-password"></button>
                </div>
            </div>
            <div class="options">
                <label>
                    <input type="checkbox" name="remember">
                    Remember me
                </label>
                <a href="#">Forgot your password?</a>
            </div>
            <button class="login-btn" type="submit">Log In</button>
        </form>
        <p class="register">
            Don’t have an account? <a href="#">Register here</a>
        </p>
    </div>
</body>

</html>
