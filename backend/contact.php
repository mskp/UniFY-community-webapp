<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once 'includes/connection.php';

    $id = $_SESSION['id'];
    $subject = mysqli_real_escape_string($connection, trim($_POST['subject']));
    $message = mysqli_real_escape_string($connection, trim($_POST['message']));

    if ($subject and $message) {
        $query = "INSERT INTO contact(id, subject, message) 
        VALUES('$id', '$subject', '$message')";
        mysqli_query($connection, $query);
        exit(header('location: contact'));
    }
}