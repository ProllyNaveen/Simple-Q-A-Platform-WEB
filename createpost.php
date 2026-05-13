<?php //include 'session.php'; ?>

<html>
<head>
	<title>Create a new post</title>
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
        <a href="profile.php">Profile</a> &nbsp;|&nbsp;
        <a href="logout.php">Logout</a>
      </td>
    </tr>
  </table>
</div>

<div class="box">
<form method="post" action="createpostbackend.php" enctype="multipart/form-data">
	<table align="center">
		<tr>
			<td align="center" style="font-weight:bold; font-size:30px;">Create a New Thread</td>
		</tr>
		<tr>
			<td align="left" style="height:50px; opacity:0.5;">Ask your question from the community</td>
		</tr>
		<tr>
			<td align="left">Thread Title</td>
		</tr>
		<tr>
			<td><input type="text" name="title" placeholder="Enter thread title"></td>
		</tr>
		<tr>
			<td align="left">Your Question</td>
		</tr>
		<tr>
			<td><textarea name="question" rows="8" placeholder="Describe your problem or question"></textarea></td>
		</tr>
		<tr>
			<td><input type="file" name="image" accept="image/*" class="upload-box"></td>
		</tr>
		<tr>
			<td><img id="preview" width="300" class="preview-img"></td>
		</tr>
		<script>
		const upload = document.querySelector('input[type="file"]');
		const preview = document.getElementById('preview');
		upload.addEventListener('change', function() {
			const file = this.files[0];
			if(file) {
				preview.src = URL.createObjectURL(file);
			}
		});
		</script>
		<tr>
			<td><input class="btn" type="submit" name="create" value="Post Thread"></td>
		</tr>
	</table>
</form>
</div>

</body>
</html>