<?php
include 'session.php';
include 'DBconnection.php';

if(isset($_POST['changepassword'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Get current password from database
    $query = "SELECT password FROM users WHERE id='".$_SESSION['id']."'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    // Check if current password is correct
    if(!password_verify($current_password, $user['password'])) {
        header("Location:profile.php?error=wrongpassword");
        die();
    }

    // Check if new passwords match
    if($new_password != $confirm_password) {
        header("Location:profile.php?error=passwordmatch");
        die();
    }

    // Hash new password and update
    $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
    $updateQuery = "UPDATE users SET password='$hashedPassword' WHERE id='".$_SESSION['id']."'";

    if(mysqli_query($con, $updateQuery)) {
        header("Location:profile.php?success=3");
        die();
    } else {
        header("Location:404.php");
        die();
    }
}

mysqli_close($con);
?>