<?php
include 'adminsession.php';
include 'DBconnection.php';

if(isset($_GET['id'])) {
    $user_id = $_GET['id'];

    $query = "UPDATE users SET is_banned=0 WHERE id='$user_id'";

    if(mysqli_query($con, $query)) {
        header("Location:admindashboard.php?success=unbanned");
        die();
    } else {
        header("Location:404.php");
        die();
    }
}

mysqli_close($con);
?>