<?php
// Fetching user
$id = $_GET['q'];
$fetch_user_query = "SELECT * FROM user WHERE id='$id'";
$fetch_user_query_result = mysqli_query($connection, $fetch_user_query);
$user_data = mysqli_fetch_assoc($fetch_user_query_result);

// Fetching photos
$id = $user_data['id'];
$query_to_fetch_photos = "SELECT photo FROM posts WHERE id=$id";
$result_from_query_to_fetch_photos = mysqli_query($connection, $query_to_fetch_photos);