<?php
session_start();
if(!isset($_SESSION['id'])) {
    header("Location:index.php");
    die();
}
if($_SESSION['role'] != 'admin') {
    header("Location:feed.php");
    die();
}
?>