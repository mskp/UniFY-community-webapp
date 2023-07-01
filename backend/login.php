<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require 'includes/connection.php';

    // Receiving inputs from form
    ['email' => $email, 'password' => $password] = $_POST;

    // Checking if the account exists or not
    $query_to_fetch_user = "SELECT * FROM user WHERE email='$email'";
    $sql_result = mysqli_query($connection, $query_to_fetch_user);
    $user = mysqli_fetch_assoc($sql_result);

    if (
        mysqli_num_rows($sql_result) and
        password_verify($password, $user['password'])
    ) {
        session_start();

        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['profile_photo'] = $user['profile_photo'];
        $_SESSION['is_verified'] = $user['is_verified'];

        exit(header('location: /unify/'));
    }
    exit(header('location: login'));
}
