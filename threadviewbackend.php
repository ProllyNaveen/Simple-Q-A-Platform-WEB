<?php
include 'session.php';
include 'DBconnection.php';


$thread_id = $_GET['id'];


$threadQuery = "SELECT threads.*, users.username, users.profile_pic 
                FROM threads 
                JOIN users ON threads.user_id = users.id 
                WHERE threads.id='$thread_id'";
$threadResult = mysqli_query($con, $threadQuery);
$thread = mysqli_fetch_assoc($threadResult);


$repliesQuery = "SELECT replies.*, users.username, users.profile_pic 
                 FROM replies 
                 JOIN users ON replies.user_id = users.id 
                 WHERE replies.thread_id='$thread_id' 
                 ORDER BY replies.created_at ASC";
$replies = mysqli_query($con, $repliesQuery);


if(isset($_POST['reply'])) {
    $replyBody = $_POST['replybody'];
    $user_id = $_SESSION['id'];

    $replyQuery = "INSERT INTO replies (thread_id, user_id, body) 
                   VALUES ('$thread_id', '$user_id', '$replyBody')";

    if(mysqli_query($con, $replyQuery)) {
        header("Location:threadview.php?id=$thread_id");
        die();
    } else {
        header("Location:404.php");
        die();
    }
}

mysqli_close($con);
?>