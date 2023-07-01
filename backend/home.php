<?php

// Creating post
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $post = mysqli_real_escape_string($connection, trim($_POST['post']));
    $photo_filename_info = photo_renamer($_FILES['photo'], "PHOTO_UPLOAD");

    if ($post or $photo_filename_info[0]) {
        move_uploaded_file($photo_filename_info[1], "assets/img/uploads/$photo_filename_info[0]");
        $query_to_create_post = "INSERT INTO posts(id, post, photo) 
        VALUES($id, '$post', '$photo_filename_info[0]')";
        mysqli_query($connection, $query_to_create_post);

        exit(header('location: /unify/'));
    }
}

// Deleting post
if (isset($_POST['delete-btn'])) {
    $time = $_POST['delete-btn'];
    $query_to_fetch_photo = "SELECT photo FROM posts WHERE created_at='$time'";
    $result = mysqli_query($connection, $query_to_fetch_photo);

    if ($result) {
        $photo_name = mysqli_fetch_assoc($result)['photo'];
        unlink("assets/img/uploads/$photo_name");
    }

    $query_to_delete_post = "DELETE FROM posts WHERE created_at='$time'";
    mysqli_query($connection, $query_to_delete_post);

    exit(header('location: /unify/'));
}

// Fetching members
$query_to_fetch_users = "SELECT * FROM user ORDER BY date DESC";
$result_from_query_to_fetch_users = mysqli_query($connection, $query_to_fetch_users);
$users_count = mysqli_num_rows($result_from_query_to_fetch_users);

// Fetching posts
$query_to_fetch_posts = "SELECT user.id, name, email, 
profile_photo, post, photo, is_verified, created_at
FROM user INNER JOIN posts ON user.id = posts.id ORDER BY created_at DESC";
$result_from_query_to_fetch_posts = mysqli_query($connection, $query_to_fetch_posts);