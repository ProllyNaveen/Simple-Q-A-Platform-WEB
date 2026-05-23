<?php
include 'session.php';
include 'DBconnection.php';

if(isset($_POST['report'])) {
    $thread_id = $_POST['thread_id'];
    $user_id = $_SESSION['id'];
    $reason = $_POST['reason'];

    // Check if user already reported this thread
    $checkQuery = "SELECT * FROM reports WHERE thread_id='$thread_id' AND reported_by='$user_id'";
    $checkResult = mysqli_query($con, $checkQuery);

    if(mysqli_num_rows($checkResult) > 0) {
        header("Location:report.php?id=$thread_id&error=alreadyreported");
        die();
    } else {
        $query = "INSERT INTO reports (thread_id, reported_by, reason, status) 
                  VALUES ('$thread_id', '$user_id', '$reason', 'pending')";

        if(mysqli_query($con, $query)) {
            header("Location:report.php?id=$thread_id&success=1");
            die();
        } else {
            header("Location:404.php");
            die();
        }
    }
}

mysqli_close($con);
?>