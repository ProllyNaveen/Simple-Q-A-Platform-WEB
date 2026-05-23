<?php
include 'session.php';
include 'DBconnection.php';

if(isset($_GET['id'])) {
    $thread_id = $_GET['id'];
    $user_id = $_SESSION['id'];

    //guys this is to check if user already liked this thread
    $checkQuery = "SELECT * FROM likes WHERE thread_id='$thread_id' AND user_id='$user_id'";
    $checkResult = mysqli_query($con, $checkQuery);

    if(mysqli_num_rows($checkResult) > 0) {
        // if already liked
        header("Location:feed.php?error=alreadyliked");
        die();
    } else {
        
        $likeQuery = "INSERT INTO likes (thread_id, user_id) VALUES ('$thread_id', '$user_id')";
        if(mysqli_query($con, $likeQuery)) {
            header("Location:feed.php?success=liked");
            die();
        } else {
            header("Location:404.php");
            die();
        }
    }
}

mysqli_close($con);
?>