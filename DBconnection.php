<?php
$con = mysqli_connect("localhost","root","","qaplatformdb");

if(!$con) {
    header("Location:404.php");
    die();
}
?>