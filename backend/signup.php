<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'includes/connection.php';

    // Receiving inputs from form
    [
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "c-password" => $confirm_password
    ] = $_POST;
    $default_profile_photo = 'user.jpeg';

    // Comparing password and confirm password
    if (strcmp(
        trim($password),
        trim($confirm_password)
    ) !== 0) exit(header('location: signup'));

    // Checking whether user already exists
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result)) exit(header('location: signup'));

    // Hashing the password and creating the account
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO user(name, email, password, profile_photo) 
    VALUES('$name', '$email', '$password', '$default_profile_photo')";
    if (mysqli_query($connection, $sql)) exit(header('location: login'));

    // Redirecting to the same page in-case signup fails
    exit(header('location: signup'));
}
