<?php
session_start();
include 'DBconnection.php';

if(isset($_POST['register'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (firstname, lastname, username, email, password, role) 
              VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedPassword', 'user')";

    if(mysqli_query($con, $query)) {
        header("success.php");
        die();
    } else {
        header("Location:regform.php?error=2");
        die();
    }
}

mysqli_close($con);
?>