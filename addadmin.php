<?php include 'adminsession.php'; ?>

<html>
<head>
	<title>Add Admin</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="validateadminregistration.js"></script>
</head>
<body>
<!-- navbar -->
<div class="navbar">
  <table width="100%">
    <tr>
      <td style="color:white"><b>ForumHub</b></td>
      <td align="right" style="color:white">
        Welcome, <b><?php echo $_SESSION['username']; ?></b> &nbsp;|&nbsp;
        <a href="profile.php">Profile</a> &nbsp;|&nbsp;
        <a href="logout.php">Logout</a>
      </td>
    </tr>
  </table>
</div>

<form name="addadminForm" method="post" action="addadminbackend.php" onsubmit="return validateForm();">
<div class="box">
	<table align="center">
	<tr>
		<td><h1>Add a new Admin</h1></td>
	</tr>
	<tr>
		<td><h4>Fill below details to add a new Admin</h4></td>
	</tr>
	<tr>
		<td>First Name</td>
	</tr>
	<tr>
		<td><input type="text" name="firstname" placeholder="Enter Admin's First name"></td>
	</tr>
	<tr>
		<td>Last Name</td>
	</tr>
	<tr>
		<td><input type="text" name="lastname" placeholder="Enter Admin's Last name"></td>
	</tr>
	<tr>
		<td>Username</td>
	</tr>
	<tr>
		<td><input type="text" name="username" placeholder="Choose a Username"></td>
	</tr>
	<tr>
		<td>Email</td>
	</tr>
	<tr>
		<td><input type="email" name="email" placeholder="Enter Admin's Email"></td>
	</tr>
	<tr>
		<td>Password</td>
	</tr>
	<tr>
		<td><input type="password" name="password" placeholder="Admin's password"></td>
	</tr>
	<tr>
		<td>Confirm Password</td>
	</tr>
	<tr>
		<td><input type="password" name="Cpassword" placeholder="Confirm password again"></td>
	</tr>
	<tr>
		<td align="center"><input style="width:100%" type="submit" name="addadmin" value="Add a new Admin"></td>
	</tr>
	<?php if(isset($_GET['error'])) { ?>
<tr>
<td>
    <?php if($_GET['error'] == 'duplicate') { ?>
        <p class="error">Username or email already exists!</p>
    <?php } else if($_GET['error'] == 'password') { ?>
        <p class="error">Passwords do not match!</p>
    <?php } ?>
</td>
</tr>
<?php } ?>
	</table>
</div>
</form>

</body>
</html>