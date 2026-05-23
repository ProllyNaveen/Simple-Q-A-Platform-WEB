<?php
include 'session.php';
include 'DBconnection.php';

if(isset($_FILES['profile_pic'])) {
    $file = $_FILES['profile_pic'];
    $filename = $file['name'];
    $filetmp = $file['tmp_name'];
    $filesize = $file['size'];
    $filetype = $file['type'];

    
    $allowed = array('image/jpeg', 'image/png', 'image/jpg', 'image/gif');
    
    if(!in_array($filetype, $allowed)) {
        header("Location:profile.php?error=filetype");
        die();
    }

   

    
    $newfilename = $_SESSION['username'] . $_SESSION['id'] . "_" . $filename;

    
    if(move_uploaded_file($filetmp, "uploads/" . $newfilename)) {
        
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