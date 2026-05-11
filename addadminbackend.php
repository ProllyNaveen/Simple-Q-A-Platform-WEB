<?php
include 'DBconnection.php';
include 'adminsession.php';

if(isset($_POST['addadmin'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (firstname, lastname, username, email, password, role) 
              VALUES ('$firstname', '$lastname', '$username', '$email', '$hashedPassword', 'admin')";

    try {
        if(mysqli_query($con, $query)) {
            header("Location:admindashboard.php");
            die();
        }
    } catch(mysqli_sql_exception $e) {
        if($e->getCode() == 1062) {
            header("Location:addadmin.php?error=duplicate");
            die();
        } else {
            header("Location:404.php");
            die();
        }
    }
}

mysqli_close($con);
?>