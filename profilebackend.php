<?php
include 'session.php';
include 'DBconnection.php';

// Get user data
$query = "SELECT * FROM users WHERE id='".$_SESSION['id']."'";
$result = mysqli_query($con, $query);
$user = mysqli_fetch_assoc($result);

// Get thread count
$threadQuery = "SELECT COUNT(*) as total FROM threads WHERE user_id='".$_SESSION['id']."'";
$threadResult = mysqli_query($con, $threadQuery);
$threadRow = mysqli_fetch_assoc($threadResult);
$threadCount = $threadRow['total'];
?>