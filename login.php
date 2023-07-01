<?php
session_start();

if (isset($_SESSION['id'])) exit(header('location: /unify/'));

require_once "backend/login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login-signup.css?v=<?= time() ?>">
    <script type="module" src="assets/js/login.js?v=<?= time() ?>" defer></script>
    <script type="module" src="assets/js/module.js?v=<?= time() ?>" defer></script>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png">
    <title>Login - UniFY</title>
</head>

<body>
    <main>
        <section class="center">
            
            <form action="" method="post" name="unify-form" id="unify-form" onsubmit="return validateLogin()">
                <h3 class="logo">
                    <span class="crimson">UniFY</span>
                </h3>
                <div class="input">
                    <input type="text" name="email" id="email" required>
                    <span id="email-span"></span>
                    <label for="email" id="label-email">Email</label>
                </div>

                <div class="input">
                    <input autocomplete="off" type="password" name="password" id="password" maxlength="20" required>
                    <span id="password-span"></span>
                    <label for="password" id="label-password">Password</label>
                </div>

                <input class="submit-btn" disabled="disabled" type="submit" value="Log in" id="submit" onsubmit="validateLogin()">

                <div class="switch-link">
                    Don't have an account? <a href="signup">Sign up</a>
                </div>
            </form>
        </section>
    </main>
</body>

</html>