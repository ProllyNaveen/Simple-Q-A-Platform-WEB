<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Report Thread</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<script src="validatereport.js"></script>
</head>
<body>

<!-- Navbar -->
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

<div class="box">
<form method="post" name="reportForm" action="reportbackend.php" onsubmit="return validateReport();">
    <input type="hidden" name="thread_id" value="<?php echo $_GET['id']; ?>">
    <table align="center">
        <tr>
            <td><h2>Report Thread</h2></td>
        </tr>
        <tr>
            <td><h4>Please provide a reason for reporting this thread</h4></td>
        </tr>
        <tr>
            <td>Reason</td>
        </tr>
        <tr>
            <td><textarea name="reason" rows="5" placeholder="Enter your reason here..."></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="report" value="Submit Report"></td>
        </tr>
			<?php if(isset($_GET['success'])) { ?>
			<p class="success">Thread reported successfully!</p>
			<?php } ?>
			<?php if(isset($_GET['error']) && $_GET['error'] == 'alreadyreported') { ?>
			<p class="error">You already reported this thread!</p>
			<?php } ?>
    </table>
</form>
</div>

</body>
</html>