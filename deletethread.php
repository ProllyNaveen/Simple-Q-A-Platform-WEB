<?php
include 'session.php';
include 'DBconnection.php';

if(isset($_GET['id'])) {
    $thread_id = $_GET['id'];

    //this is how we check if user owns the thread or is admin
    $checkQuery = "SELECT user_id FROM threads WHERE id='$thread_id'";
    $checkResult = mysqli_query($con, $checkQuery);
    $thread = mysqli_fetch_assoc($checkResult);

    if($thread['user_id'] == $_SESSION['id'] || $_SESSION['role'] == 'admin') {
        
        $deleteReplies = "DELETE FROM replies WHERE thread_id='$thread_id'";
        mysqli_query($con, $deleteReplies);

        
        $deleteReports = "DELETE FROM reports WHERE thread_id='$thread_id'";
        mysqli_query($con, $deleteReports);

       
        $deleteThread = "DELETE FROM threads WHERE id='$thread_id'";

        if(mysqli_query($con, $deleteThread)) {
            header("Location:feed.php?success=deleted");
            die();
        } else {
            header("Location:404.php");
            die();
        }
    } else {
        header("Location:feed.php?error=unauthorized");
        die();
    }
}

mysqli_close($con);
?>