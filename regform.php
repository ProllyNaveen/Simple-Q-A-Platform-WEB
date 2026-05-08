<?php session_start(); ?>
<html>
<head>
	<title> Register an account </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="box">
<form method="post" action="register.php">
<table align="center">
	<tr>
	<td><h1>Create an Account</h1> </td>
	</tr>
	
	<tr>
	<td><h4>Join our community today</h4></td>
	</tr>

	<tr>
	<td> Firstname </td>
	</tr>
	
	<tr>
	<td><input type="text" name="firstname" placeholder="Enter your first name"> </td>
	</tr>
	
	<tr>
	<td> Lastname </td>
	</tr>
	
	<tr>
	<td><input type="text" name="lastname" placeholder="Enter your last name"> </td>
	</tr>
	
	<tr>
	<td> Username </td>
	</tr>
	
	<tr>
	<td><input type="text" name="username" placeholder="Choose a Username"> </td>
	</tr>
	
	<tr>
	<td> Email </td>
	</tr>
	
	<tr>
	<td><input type="email" name="email" placeholder="Enter your Email"> </td>
	</tr>
	
	<tr>
	<td> Password </td>
	</tr>
	
	<tr>
	<td><input type="password" name="password" placeholder="Create a strong password"> </td>
	</tr>

	<tr>
	<td><input type="password" name="Cpassword" placeholder="Confirm password again"> </td>
	</tr>

	<?php if(isset($_GET['error'])) { ?>
	<tr>
	<td>
		<?php if($_GET['error'] == 'duplicate') { ?>
			<p class="error">Username or email already exists!</p>
		<?php } else { ?>
			<p class="error">Registration failed. Please try again!</p>
		<?php } ?>
	</td>
	</tr>
	<?php } ?>
	
	<tr>
	<td align="center"><input style="width:100%" type="submit" name="register" value="Register now"> </td>
	</tr>

</table>
</form>
</div>
</body>
</html>