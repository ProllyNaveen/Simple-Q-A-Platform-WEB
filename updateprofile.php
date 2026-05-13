<?php
include 'session.php';
include 'DBconnection.php';

if(isset($_POST['update'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $query = "UPDATE users SET firstname='$firstname', lastname='$lastname', username='$username', email='$email' WHERE id='".$_SESSION['id']."'";

    try {
        if(mysqli_query($con, $query)) {
            // Update session username if changed
            $_SESSION['username'] = $username;
            header("Location:profile.php?success=2");
            die();
        }
    } catch(mysqli_sql_exception $e) {
        if($e->getCode() == 1062) {
            header("Location:profile.php?error=duplicate");
            die();
        } else {
            header("Location:404.php");
            die();
        }
    }
}

mysqli_close($con);
?>