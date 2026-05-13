<html>
<head>
<title>Register Here</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="box">
<form method="post" action="login.php">
<table align="center" >
		<tr><td><h1>Welcome Back</h1></td></tr>
		<tr><td><h4>Please login to join the discussion</h4></td></tr>
		<tr><td>Username/Email</td></tr>
		<tr><td><input type="text" name="emailUsername" placeholder="Enter your username"></td></tr>
		<tr><td>Password</td></tr>
		<tr><td><input type="password" name="password" placeholder="Enter your password"></td></tr>
		<tr><td><input type="checkbox" name="admincheck">Login as Administrator</td></tr>
		<tr><td><input type="submit" value="Login" name="login" style="width: 100%;"></td></tr>
		
		<tr><td><p>Don't have an account? <a href="regform.php">Register here</a></p></td></tr>
		<?php if(isset($_GET['error'])) { ?>
    <tr><td>
        <?php if($_GET['error'] == 'banned') { ?>
            <p class="error">Your account has been banned. Please contact admin!</p>
        <?php } else if($_GET['error'] == 'isadmin') { ?>
            <p class="error">You are an admin! Please tick the admin checkbox to login!</p>
        <?php } else { ?>
            <p class="error">Invalid username or password!</p>
        <?php } ?>
    </td></tr>
<?php } ?>
</table>
</form>
</div>
</body>
</html>