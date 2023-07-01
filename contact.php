<?php 
session_start();

if (!isset($_SESSION['id'])) exit(header('location: login'));

require_once "backend/contact.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/navbar.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/contact.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/button.css?v=<?= time() ?>">
    <script src="assets/js/navbar.js?v=<?= time() ?>" defer></script>
    <script src="assets/js/contact.js?v=<?= time() ?>" defer></script>
    <link rel="shortcut icon" href="assets/img/logo/favicon.png">
    <title>Contact UniFY</title>
</head>

<body>
    <?php require_once "includes/navbar.php" ?>
    <main>
        <section class="contact">
            <div class="contact-form">
                <form action="" method="post" name="contact-form" onsubmit="return contactFormHandler()">
                    <input type="text" name="" id="" value="<?= $_SESSION['name'] ?>" readonly>
                    <input autocomplete="off" type="text" name="subject" id="subject" placeholder="Subject" maxlength="30">
                    <textarea autocomplete="off" name="message" id="message" cols="30" rows="10" placeholder="Enter your message" maxlength="70"></textarea>
                    <button type="submit" class="btn" id="submit" disabled="disabled">Send</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>