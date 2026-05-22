<?php include 'admindashboardbackend.php'; ?>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<!-- navbar -->
<div class="navbar">
  <table width="100%">
    <tr>
      <td style="color:white"><b>ForumHub</b></td>
      <td align="right" style="color:white">
        Welcome, <b><?php echo $_SESSION['username']; ?></b> &nbsp;|&nbsp;
		<a href="feed.php">Home</a> &nbsp;|&nbsp;
        <a href="profile.php">Profile</a> &nbsp;|&nbsp;
        <a href="logout.php">Logout</a>
      </td>
    </tr>
  </table>
</div>

<!-- Stat boxes -->
<br>
<table align="center" width="80%">
	<tr>
		<td style="width:30px"></td>
		<td>
		<div class="boxS">
			<table align="center">
				<tr><th>TOTAL REGISTERED USERS</th></tr>
				<tr><td style="font-weight:bold; color:#4a90e2; height:40px;" align="center"><p id="userCount"><?php echo $userCount; ?></p></td></tr>
			</table>
		</div>
		</td>
		<td style="width:30px"></td>

		<td>
		<div class="boxS">
			<table align="center">
				<tr><td style="font-weight:bold">ACTIVE THREADS</td></tr>
				<tr><td style="font-weight:bold; color:#4a90e2; height:40px;" align="center"><p id="threadCount"><?php echo $threadCount; ?></p></td></tr>
			</table>
		</div>
		</td>
		<td style="width:30px"></td>

		<td>
		<div class="boxS">
			<table align="center">
				<tr><td style="font-weight:bold">REPORTED ITEMS</td></tr>
				<tr><td style="font-weight:bold; color:#4a90e2; height:40px;" align="center"><p id="reportCount"><?php echo $reportCount; ?></p></td></tr>
			</table>
		</div>
		</td>
		<td style="width:30px"></td>
	</tr>
</table>

<!-- Moderation Queue -->
<div class="boxL">
	<table width="100%">
		<tr>
			<td style="font-size:18px; font-weight:bold;">Moderation Queue (Reported Threads)</td>
		</tr>
		<tr>
		<td>
		<table class="adminDash-table">
			<tr>
				<th>Thread Title</th>
				<th>Author</th>
				<th>Report Reason</th>
				<th>Action</th>
			</tr>
			<?php while($report = mysqli_fetch_assoc($reportsQuery)) { ?>
			<tr>
				<td><?php echo $report['title']; ?></td>
				<td><?php echo $report['username']; ?></td>
				<td><?php echo $report['reason']; ?></td>
				<td>
					<table>
						<tr>
							<td><a href="delete-thread.php?id=<?php echo $report['id']; ?>"><input class="btnbtn" type="button" value="Delete Thread"></a></td>
							<td><a href="ban-user.php?id=<?php echo $report['id']; ?>"><input class="btnbtn" type="button" value="Ban User" style="background-color:orange"></a></td>
						</tr>
					</table>
				</td>
			</tr>
			<?php } ?>
		</table>
		</td>
		</tr>
	</table>
</div>

<!-- User Management -->
<div class="boxL" style="margin: 30px auto;">
<table width="100%">
	<tr>
		<td style="font-size:18px; font-weight:bold;">User Management</td>
		<td align="right"><a href="addadmin.php" class="btn" style="width:auto; padding:5px 12px;">+ Add Admin</a></td>
	</tr>
	<tr>
		<td><input type="text" style="width: 270px;" name="search" placeholder="Search users by Username or Email"></td>
	</tr>

	<!-- Success messages -->
	<?php if(isset($_GET['success'])) { ?>
	<tr>
	<td colspan="2">
		<?php if($_GET['success'] == 'banned') { ?>
			<p class="success">User banned successfully!</p>
		<?php } else if($_GET['success'] == 'unbanned') { ?>
			<p class="success">User unbanned successfully!</p>
		<?php } else if($_GET['success'] == 'deleted') { ?>
			<p class="success">Thread deleted successfully!</p>
		<?php } ?>
	</td>
	</tr>
	<?php } ?>

	<tr>
		<td>
		<table class="adminDash-table">
			<tr>
				<th>Username</th>
				<th>Email</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
			<?php while($user = mysqli_fetch_assoc($usersQuery)) { ?>
			<tr>
				<td><?php echo $user['username']; ?></td>
				<td><?php echo $user['email']; ?></td>
				<td style="font-weight:bold; color:<?php echo $user['is_banned'] ? 'red' : 'green'; ?>">
					<?php echo $user['is_banned'] ? 'Banned' : 'Active'; ?>
				</td>
				<td>
					<?php if($user['is_banned']) { ?>
						<a href="unbanuser.php?id=<?php echo $user['id']; ?>"><input class="btnbtn" type="button" value="Unban" style="background-color:gray"></a>
					<?php } else { ?>
						<a href="banuser.php?id=<?php echo $user['id']; ?>"><input class="btnbtn" type="button" value="Ban" style="background-color:red"></a>
					<?php } ?>
				</td>
			</tr>
			<?php } ?>
		</table>
		</td>
	</tr>
</table>
</div>

</body>
</html>