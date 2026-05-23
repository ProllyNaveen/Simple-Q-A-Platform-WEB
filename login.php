<?php
session_start();
include 'DBconnection.php';

if(isset($_POST['login'])) {
    $emailUsername = $_POST['emailUsername'];
    $password = $_POST['password'];
    $isAdmin = isset($_POST['admincheck']);

    if($isAdmin) {
        $query = "SELECT * FROM users WHERE (username='$emailUsername' OR email='$emailUsername') AND role='admin'";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);
            if(password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location:admindashboard.php");
                die();
            } else {
                header("Location:index.php?error=1");
                die();
            }
        } else {
            header("Location:index.php?error=1");
            die();
        }

    } else {
        $query = "SELECT * FROM users WHERE (username='$emailUsername' OR email='$emailUsername')";
        $result = mysqli_query($con, $query);

        if(mysqli_num_rows($result) == 1) {
            $user = mysqli_fetch_assoc($result);

           
            if($user['role'] == 'admin') {
                header("Location:index.php?error=isadmin");
                die();
            }

            
            if($user['is_banned'] == 1) {
                header("Location:index.php?error=banned");
                die();
            }

            if(password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];
                header("Location:feed.php");
                die();
            } else {
                header("Location:index.php?error=1");
                die();
            }
        } else {
            header("Location:index.php?error=1");
            die();
        }
    }
}

mysqli_close($con);
?>