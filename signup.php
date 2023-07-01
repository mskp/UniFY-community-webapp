<?php
session_start();

if (isset($_SESSION['id'])) exit(header('location: /unify/')); 

require_once "backend/signup.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/login-signup.css?v=<?= time() ?>" />
    <script type="module" src="assets/js/signup.js?v=<?= time() ?>" defer></script>
    <script type="module" src="assets/js/module.js?v=<?= time() ?>" defer></script>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png" />
    <title>Join UniFY</title>
</head>

<body>

    <main>
        <section class="center">            
            <form action="" method="post" name="unify-form" id="unify-form" enctype="multipart/form-data" onsubmit="return validateSignup()">
                <h3 class="logo">
                    <span class="crimson">UinFY</span>
                </h3>
                <div class="input">
                    <input autocomplete="off" type="text" name="name" id="name" maxlength="25" required />
                    <span id="name-span"></span>
                    <label for="name" id="label-name">Full Name</label>
                </div>

                <div class="input">
                    <input autocomplete="off" type="text" name="email" id="email" required />
                    <span id="email-span"></span>
                    <label for="email" id="label-email">Email</label>
                </div>

                <div class="input">
                    <input autocomplete="off" type="password" name="password" id="password" required />
                    <span id="password-span"></span>
                    <label for="password" id="label-password">Password</label>
                </div>

                <div class="input">
                    <input autocomplete="off" type="password" name="c-password" id="c-password" required />
                    <span id="cpassword-span"></span>
                    <label for="c-password" id="label-cpassword">Confirm Password</label>
                </div>

                <input class="submit-btn" disabled="disabled" type="submit" value="Sign Up" id="submit" onsubmit="validateSignup()" />

                <div class="switch-link">
                    Have an account? <a href="login">Login</a>
                </div>
            </form>
        </section>
    </main>

</body>

</html>