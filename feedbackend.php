<?php
include 'session.php';
include 'DBconnection.php';

// Get all threads
$feedQuery = "SELECT threads.*, users.username, users.profile_pic 
              FROM threads 
              JOIN users ON threads.user_id = users.id 
              ORDER BY threads.created_at DESC";
$threads = mysqli_query($con, $feedQuery);

// Get reply count for each thread
$replyCountQuery = "SELECT thread_id, COUNT(*) as total 
                    FROM replies 
                    GROUP BY thread_id";
$replyResult = mysqli_query($con, $replyCountQuery);
$replyCounts = array();
while($row = mysqli_fetch_assoc($replyResult)) {
    $replyCounts[$row['thread_id']] = $row['total'];
}
?>