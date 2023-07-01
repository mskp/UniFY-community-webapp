<?php
session_start();

if (!isset($_SESSION['id'])) exit(header('location: login'));

require_once 'includes/connection.php';
require_once 'includes/functions.php';
require_once 'backend/home.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UniFY - Home</title>
    <link rel="stylesheet" href="assets/css/home.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/navbar.css?v=<?= time() ?>">
    <link rel="stylesheet" href="assets/css/button.css?v=<?= time() ?>">
    <link rel="shortcut icon" href="assets/img/logo/favicon.png">
    <script src="assets/js/home.js?v=<?= time() ?>" defer></script>
    <script src="https://use.fontawesome.com/d4307a40f6.js"></script>
    <script src="assets/js/navbar.js?v=<?= time() ?>" defer></script>
</head>

<body>

    <?php require_once "includes/navbar.php" ?>

    <main>
        <!-- Center -->
        <article class="center">
            <p class="title">Community members(<?= $users_count - 1 ?>)</p>

            <!-- Members -->
            <section class="members">
                <?php while ($row = mysqli_fetch_assoc($result_from_query_to_fetch_users)) :
                    if ($row['id'] == $_SESSION['id']) continue ?>

                    <!-- Member -->
                    <a href="profile?q=<?= $row['id'] ?>" class="member" style='background: url("assets/img/profile-photo/<?= $row['profile_photo'] . '?v=' . time() ?>") no-repeat center center/cover;'>
                        <p class="name"><?= $row['name'] ?>
                            <?php if ($row['is_verified']) : ?>
                                <img class="check-icon" src="assets/img/logo/verified.png" draggable="false">
                            <?php endif ?>
                        </p>
                    </a>
                    <!-- Member-end -->
                <?php endwhile ?>
            </section>


            <!-- Create Post -->
            <section class="make-post">
                <form class="create-post" method="post" action="" enctype="multipart/form-data" name="post-form" id="post-form">
                    <div class="profile-photo">
                        <a href="profile">
                            <img src="assets/img/profile-photo/<?= $_SESSION['profile_photo'] . "?v=" . time() ?>" draggable="false">
                        </a>
                    </div>
                    <input autocomplete="off" type="text" placeholder="Share something..." id="post" name="post">
                    <label for="photo"><span class="attach fa fa-paperclip"></span></label>
                    <input accept="image/png,image/jpeg,image/gif,image/webp" type="file" name="photo" id="photo">
                    <input type="submit" value="Post" id="post-btn" disabled="disabled">
                </form>
            </section>

            <!-- Feeds -->
            <section class="feeds">
                <?php while ($row = mysqli_fetch_assoc($result_from_query_to_fetch_posts)) : ?>

                    <!-- Feed -->
                    <div class="feed">
                        <div class="head">
                            <div class="user">

                                <div class="profile-photo">
                                    <?php if ($_SESSION['name'] == $row['name']) : ?>
                                        <a href="profile"><img src="assets/img/profile-photo/<?= $row['profile_photo'] . "?v=" . time() ?>" draggable="false"></a>
                                    <?php else : ?>
                                        <a href="profile?q=<?= $row['id'] ?>"><img src="assets/img/profile-photo/<?= $row['profile_photo'] . "?v=" . time() ?>" draggable="false"></a>
                                    <?php endif ?>
                                </div>

                                <div>
                                    <?php if ($_SESSION['name'] == $row['name']) : ?>
                                        <h3><a href="profile"><?= $row['name'] ?></a>
                                            <?php if ($row['is_verified']) : ?>
                                                <img class="check-icon" src="assets/img/logo/verified.png"></p>
                                            <?php endif ?>
                                        </h3>
                                    <?php else : ?>
                                        <h3><a href="profile?q=<?= $row['id'] ?>"><?= $row['name'] ?></a>
                                            <?php if ($row['is_verified']) : ?>
                                                <img class="check-icon" src="assets/img/logo/verified.png"></p>
                                            <?php endif ?>
                                        </h3>
                                    <?php endif ?>
                                    <small>
                                        <?= time_ago($row['created_at']) ?>
                                    </small>
                                </div>

                            </div>
                            <?php if (($row['name'] == $_SESSION['name']) or ($_SESSION['is_verified'])) : ?>
                                <span class="edit">
                                    <button form="post-form" type="submit" name="delete-btn" class="delete-btn fa fa-trash" id="delete-btn" value="<?= $row['created_at'] ?>"></button>
                                </span>
                            <?php endif ?>
                        </div>

                        <?php if ($row['photo']) : ?>
                            <div class="photo">
                                <img src="assets/img/uploads/<?= $row['photo'] . "?v=" . time() ?>" draggable="false">
                            </div>
                        <?php endif ?>

                        <?php if ($row['post']) : ?>
                            <div class="posted">
                                <?= $row['post'] ?>
                            </div>
                        <?php endif ?>

                    </div>
               <?php endwhile ?>
            </section>
        </article>
    </main>
</body>

</html>