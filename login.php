<?php
session_start();
include 'DBconnection.php';

if(isset($_POST['login'])) {
    $emailUsername = $_POST['emailUsername'];
    $password = $_POST['password'];
    $isAdmin = isset($_POST['admincheck']);

    if($isAdmin) {
        $query = "SELECT * FROM users WHERE (username='$emailUsername' OR email='$emailUsername') AND role='admin'";
    } else {
        $query = "SELECT * FROM users WHERE (username='$emailUsername' OR email='$emailUsername') AND role='user' AND is_banned=0";
    }

    $result = mysqli_query($con, $query);

    if(mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);

        if(password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            if($isAdmin) {
                header("Location:feed.php");
            } else {
                header("Location:feed.php");
            }
            die();
        } else {
            header("Location:login.php?error=1");
            die();
        }
    } else {
        header("Location:login.php?error=1");
        die();
    }
}
mysqli_close($con);
?>