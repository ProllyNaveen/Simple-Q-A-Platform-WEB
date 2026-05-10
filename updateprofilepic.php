<?php
include 'session.php';
include 'DBconnection.php';

if(isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    // Check if file is an image
    $allowed = array('image/jpeg', 'image/png', 'image/jpg', 'image/gif');
    
    if(!in_array($filetype, $allowed)) {
        header("Location:profile.php?error=filetype");
        die();
    }

    // Check file size max 2MB
    if($filesize > 2000000) {
        header("Location:profile.php?error=filesize");
        die();
    }

    // Create unique filename
    $newfilename = $_SESSION['username'] . $_SESSION['id'] . "_" . $filename;

    // Upload file to uploads folder
    if(move_uploaded_file($filetmp, "uploads/" . $newfilename)) {
        // Update database
        $query = "UPDATE users SET profile_pic='$newfilename' WHERE id='".$_SESSION['id']."'";
        mysqli_query($con, $query);
        header("Location:profile.php?success=1");
        die();
    } else {
        header("Location:profile.php?error=upload");
        die();
    }
}

mysqli_close($con);
?>