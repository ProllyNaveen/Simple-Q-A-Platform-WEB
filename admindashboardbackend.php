<?php

include 'DBconnection.php';

// total users count
$userResult = mysqli_query($con, "SELECT COUNT(*) as total FROM users WHERE role='user'");
$userRow = mysqli_fetch_assoc($userResult);
$userCount = $userRow['total'];

// tot threads count
$threadResult = mysqli_query($con, "SELECT COUNT(*) as total FROM threads");
$threadRow = mysqli_fetch_assoc($threadResult);
$threadCount = $threadRow['total'];

//  tot pending reports count
$reportResult = mysqli_query($con, "SELECT COUNT(*) as total FROM reports WHERE status='pending'");
$reportRow = mysqli_fetch_assoc($reportResult);
$reportCount = $reportRow['total'];

//reported threads
$reportsQuery = mysqli_query($con, "SELECT reports.id, threads.title, users.username, reports.reason 
                                    FROM reports 
                                    JOIN threads ON reports.thread_id = threads.id 
                                    JOIN users ON reports.reported_by = users.id
                                    WHERE reports.status='pending'");

// all users
$usersQuery = mysqli_query($con, "SELECT id, username, email, is_banned FROM users WHERE role='user'");
?>