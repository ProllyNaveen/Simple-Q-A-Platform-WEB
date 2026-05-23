<?php include 'feedbackend.php'; ?>
<html>
<head>
  <title>Forum - Home</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<div class="navbar">
  <table width="100%">
    <tr>
      <td><b style="color:white" >QAVerseSL</b></td>
      <td align="right" style="color:white">
        Welcome, <b><?php echo $_SESSION['username']; ?></b> &nbsp;|&nbsp;
		<?php if($_SESSION['role'] == 'admin') { ?>
        <a href="admindashboard.php">Admin Dashboard</a> &nbsp;|&nbsp;
    <?php } ?>
        <a href="profile.php">Profile</a> &nbsp;|&nbsp;
        <a href="logout.php">Logout</a>
    </tr>
  </table>
</div>


<!-- Main Content -->
<div class="main-table">
  <table width="100%">
    <!-- Page heading and create button -->
    <tr>
      <td><h2>All Threads</h2><br>
 <div><?php if(isset($_GET['success']) && $_GET['success'] == 'deleted') { ?>
	<p class="success">Thread deleted successfully!
	<?php } ?>
	<?php if(isset($_GET['error']) && $_GET['error'] == 'unauthorized') { ?>
    <p class="error">You are not authorized to delete this thread!</p>
	<?php } ?>
	<?php if(isset($_GET['success']) && $_GET['success'] == 'liked') { ?>
    <p class="success">Thread liked successfully!</p>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'alreadyliked') { ?>
    <p class="error">You already liked this thread!</p>
<?php } ?>
</div>
	  </td>  
      <td align="right">
        <a href="createpost.php" class="btn">+ New Thread</a>
      </td>
    </tr>
    <!-- Threads list -->
    <tr>
      <td colspan="2">
        <table width="100%" class="admin-table">
          <tr>
            <th>Image</th>
            <th>Title</th>
            <th>Posted By</th>
            <th>Date</th>
            <th>Replies</th>
			<th>Likes</th>
            <th>Action</th>
			
          </tr>
          <?php while($row = mysqli_fetch_assoc($threads)) { ?>
    <tr>
        <td>
            <?php if(!empty($row['image'])) { ?>
                <img src="uploads/<?php echo $row['image']; ?>" width="60" height="50" style="object-fit:cover;">
            <?php } else { ?>
                <img src="uploads/no-image.png" width="60" height="50" style="object-fit:cover;">
            <?php } ?>
        </td>
        <td><a href="threadview.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['created_at']; ?></td>
        <td><?php echo isset($replyCounts[$row['id']]) ? $replyCounts[$row['id']] : 0; ?></td>
        <td>👍 <?php echo isset($likeCounts[$row['id']]) ? $likeCounts[$row['id']] : 0; ?></td>
        <td>
            <a href="threadview.php?id=<?php echo $row['id']; ?>">View</a>
            &nbsp;|&nbsp;
            <a href="like.php?id=<?php echo $row['id']; ?>">👍 Like</a>
            <?php if($_SESSION['id'] == $row['user_id'] || $_SESSION['role'] == 'admin') { ?>
                &nbsp;|&nbsp;
                <a href="deletethread.php?id=<?php echo $row['id']; ?>" style="color:red;">Delete</a>
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