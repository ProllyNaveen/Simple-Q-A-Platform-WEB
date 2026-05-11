<?php
include 'session.php';
include 'DBconnection.php';

if(isset($_POST['create'])) {
    $title = $_POST['title'];
    $body = $_POST['question'];
    $user_id = $_SESSION['id'];
    $image = "";

    // Handle image upload
    if(!empty($_FILES['image']['name'])) {
        $filename = $_FILES['image']['name'];
        $filetmp = $_FILES['image']['tmp_name'];
        $filetype = $_FILES['image']['type'];

        $allowed = array('image/jpeg', 'image/png', 'image/jpg', 'image/gif');

        if(!in_array($filetype, $allowed)) {
            header("Location:createpost.php?error=filetype");
            die();
        }

        $newfilename = $_SESSION['username'] . $_SESSION['id'] . "_" . $filename;

        if(move_uploaded_file($filetmp, "uploads/" . $newfilename)) {
            $image = $newfilename;
        } else {
            header("Location:createpost.php?error=upload");
            die();
        }
    }

    $query = "INSERT INTO threads (user_id, title, body, image) 
              VALUES ('$user_id', '$title', '$body', '$image')";

    if(mysqli_query($con, $query)) {
        header("Location:feed.php");
        die();
    } else {
        header("Location:404.php");
        die();
    }
}

mysqli_close($con);
?>