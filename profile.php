<?php
session_start();

if (!isset($_SESSION['id'])) exit(header('location: login'));

require_once 'includes/connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/navbar.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/profile.css?v=<?= time() ?>">
    <script src="assets/js/navbar.js?v=<?= time() ?>" defer></script>
    <script src="assets/js/profile.js?v=<?= time() ?>" defer></script>
    <link rel="stylesheet" href="assets/css/button.css?v=<?= time() ?>">
    <link rel="shortcut icon" href="assets/img/logo/favicon.png">
    <title>UniFY - <?= $_SESSION['name'] ?></title>

</head>

<body>

    <?php require_once "includes/navbar.php" ?>

    <main>
        <?php if (isset($_GET['q'])) :
            require_once "backend/other-profile.php";
        ?>
            <section class="profile">
                <div class="user-details">
                    <div class="profile-photo">
                        <img src="assets/img/profile-photo/<?= $user_data['profile_photo'] . '?v=' . time() ?>" alt="user-image" draggable="false">
                    </div>

                    <div class="user-info">
                        <p class="name"><?= $user_data['name'] ?>
                            <?php if ($user_data['is_verified']) : ?>
                                <img class="check-icon" src="assets/img/logo/verified.png" draggable="false">
                            <?php endif ?>
                        </p>
                        <p class="email"><?= $user_data['email'] ?></p>
                    </div>
                </div>

                <div class="photo-grid">
                    <?php while ($row = mysqli_fetch_assoc($result_from_query_to_fetch_photos)) :
                        if ($row['photo']) : ?>
                            <img src="assets/img/uploads/<?= $row['photo'] . '?v=' . time() ?>" draggable="false">
                    <?php endif;
                    endwhile ?>
                </div>
            </section>
        <?php else :
            require_once 'backend/profile.php';

        ?>
            <section class="profile">
                <div class="user-details">
                    <div class="profile-photo">
                        <label for="edit-profile-photo" form="photo-editor" class="edit-profile-photo">
                            <img src="assets/img/profile-photo/<?= $_SESSION['profile_photo'] . '?v=' . time() ?>" draggable="false">
                        </label>
                        <form action="" method="post" enctype="multipart/form-data" id="profile-photo-editor">
                            <input accept="image/png,image/jpeg,image/gif,image/webp" type="file" name="profile-photo" id="edit-profile-photo" oninput="submit()">
                        </form>
                    </div>

                    <div class="user-info">
                        <p class="name"><?= $_SESSION['name'] ?>
                            <?php if ($_SESSION['is_verified']) : ?>
                                <img class="check-icon" src="assets/img/logo/verified.png">
                            <?php endif ?>
                        </p>
                        <p class="email"><?= $_SESSION['email'] ?></p>
                    </div>
                </div>

                <div class="photo-grid">
                    <?php while ($row = mysqli_fetch_assoc($result_from_query_to_fetch_photos)) :
                        if ($row['photo']) : ?>
                            <img src="assets/img/uploads/<?= $row['photo'] . '?v=' . time() ?>" draggable="false">
                    <?php endif;
                    endwhile ?>
                </div>
            </section>
        <?php endif ?>
    </main>
</body>

</html>