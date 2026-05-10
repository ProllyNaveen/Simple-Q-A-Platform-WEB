<?php include 'profilebackend.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
  <table width="100%">
    <tr>
      <td style="color:white"><b>ForumHub</b></td>
      <td align="right" style="color:white">
        Welcome, <b><?php echo $_SESSION['username']; ?></b> &nbsp;|&nbsp;
        <a href="feed.php">Home</a> &nbsp;|&nbsp;
        <a href="logout.php">Logout</a>
      </td>
    </tr>
  </table>
</div>

<!-- Profile Content -->
<div class="main-table">
<table width="100%">

    <!-- Profile Picture and Info -->
    <tr>
        <td width="150" align="center" valign="top">
            <img src="uploads/<?php echo $user['profile_pic']; ?>" width="120" height="120" style="border-radius:50%; border:2px solid #ccc;">
            <br><br>
            <form method="post" action="updateprofilepic.php" enctype="multipart/form-data">
                <input type="file" name="profile_pic" style="font-size:11px;">
                <input type="submit" value="Upload" style="width:100%; margin-top:5px;">
            </form>
        </td>
        <td valign="top" style="padding-left:20px;">
            <h2><?php echo $user['firstname'] . " " . $user['lastname']; ?></h2>
            <p><b>Username:</b> <?php echo $user['username']; ?></p>
            <p><b>Email:</b> <?php echo $user['email']; ?></p>
            <p><b>Joined:</b> <?php echo $user['created_at']; ?></p>
            <p><b>Threads Posted:</b> <?php echo $threadCount; ?></p>
        </td>
    </tr>

    <!-- Profile pic messages -->
    <tr>
        <td colspan="2">
            <?php if(isset($_GET['success']) && $_GET['success'] == '1') { ?>
                <p class="success">Profile picture updated successfully!</p>
            <?php } ?>
            <?php if(isset($_GET['error'])) { ?>
                <?php if($_GET['error'] == 'filetype') { ?>
                    <p class="error">Only JPG, PNG and GIF images are allowed!</p>
                <?php } else if($_GET['error'] == 'filesize') { ?>
                    <p class="error">File size must be less than 2MB!</p>
                <?php } else if($_GET['error'] == 'upload') { ?>
                    <p class="error">Upload failed. Please try again!</p>
                <?php } ?>
            <?php } ?>
        </td>
    </tr>

    <tr><td colspan="2"><hr></td></tr>

    <!-- Edit Profile Form -->
    <tr>
        <td colspan="2"><h3>Edit Profile</h3></td>
    </tr>

    <!-- Edit profile messages -->
    <tr>
        <td colspan="2">
            <?php if(isset($_GET['success']) && $_GET['success'] == '2') { ?>
                <p class="success">Profile updated successfully!</p>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'duplicate') { ?>
                <p class="error">Username or email already exists!</p>
            <?php } ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">
        <form method="post" action="updateprofile.php">
        <table width="100%">
            <tr>
                <td>First Name</td>
            </tr>
            <tr>
                <td><input type="text" name="firstname" value="<?php echo $user['firstname']; ?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
            </tr>
            <tr>
                <td><input type="text" name="lastname" value="<?php echo $user['lastname']; ?>"></td>
            </tr>
            <tr>
                <td>Username</td>
            </tr>
            <tr>
                <td><input type="text" name="username" value="<?php echo $user['username']; ?>"></td>
            </tr>
            <tr>
                <td>Email</td>
            </tr>
            <tr>
                <td><input type="email" name="email" value="<?php echo $user['email']; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update Profile"></td>
            </tr>
        </table>
        </form>
        </td>
    </tr>

    <tr><td colspan="2"><hr></td></tr>

    <!-- Change Password -->
    <tr>
        <td colspan="2"><h3>Change Password</h3></td>
    </tr>

    <!-- Change password messages -->
    <tr>
        <td colspan="2">
            <?php if(isset($_GET['success']) && $_GET['success'] == '3') { ?>
                <p class="success">Password changed successfully!</p>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'wrongpassword') { ?>
                <p class="error">Current password is incorrect!</p>
            <?php } ?>
            <?php if(isset($_GET['error']) && $_GET['error'] == 'passwordmatch') { ?>
                <p class="error">New passwords do not match!</p>
            <?php } ?>
        </td>
    </tr>

    <tr>
        <td colspan="2">
        <form method="post" action="updatepassword.php">
        <table width="100%">
            <tr>
                <td>Current Password</td>
            </tr>
            <tr>
                <td><input type="password" name="current_password" placeholder="Enter current password"></td>
            </tr>
            <tr>
                <td>New Password</td>
            </tr>
            <tr>
                <td><input type="password" name="new_password" placeholder="Enter new password"></td>
            </tr>
            <tr>
                <td>Confirm New Password</td>
            </tr>
            <tr>
                <td><input type="password" name="confirm_password" placeholder="Confirm new password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="changepassword" value="Change Password"></td>
            </tr>
        </table>
        </form>
        </td>
    </tr>

</table>
</div>

</body>
</html>