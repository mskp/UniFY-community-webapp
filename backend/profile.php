<?php

$id = $_SESSION['id'];

// Updating profile photo
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $profile_photo_filename = trim($_FILES['profile-photo']['name']) ?
        "profile-photo_" . time() . "." . pathinfo($_FILES['profile-photo']['name'], PATHINFO_EXTENSION)  : 'user.jpg';

    $old_profile_photo = $_SESSION['profile_photo'];

    // Saving the profile-photo in the server
    move_uploaded_file($_FILES['profile-photo']['tmp_name'], "assets/img/profile-photo/$profile_photo_filename");

    // Deleting the old profile-photo if profile-photo is not the default one
    if ($old_profile_photo !== 'user.jpg')
        unlink("assets/img/profile-photo/$old_profile_photo");

    $update_profile_photo_query = "UPDATE user SET profile_photo='$profile_photo_filename' WHERE id=$id";
    mysqli_query($connection, $update_profile_photo_query);
    exit(header('location: profile'));
}

// Fetching profile photo
$query_to_fetch_profile_photo = "SELECT profile_photo FROM user WHERE id=$id";
$result_from_query_to_fetch_profile_photo = mysqli_query($connection, $query_to_fetch_profile_photo);
$_SESSION['profile_photo'] = mysqli_fetch_assoc($result_from_query_to_fetch_profile_photo)['profile_photo'];

// Fetching posted photos
$query_to_fetch_photos = "SELECT photo FROM posts where id=$id";
$result_from_query_to_fetch_photos = mysqli_query($connection, $query_to_fetch_photos);
?>