<?php //include 'session.php'; ?>
<?php include 'threadviewbackend.php'; ?>
<html>
<head>
  <title>Thread</title>
  <link rel="stylesheet" href="style.css">
  <script type="text/javascript" src="validatethreadview.js"> </script>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
  <table width="100%">
    <tr>
      <td><b>ForumHub</b></td>
      <td align="right">
        Welcome, <b><?php echo $_SESSION['username']; ?></b> &nbsp;|&nbsp;
        <a href="feed.php">Home</a> &nbsp;|&nbsp;
        <a href="profile.php">Profile</a> &nbsp;|&nbsp;
        <a href="logout.php">Logout</a>
      </td>
    </tr>
  </table>
</div>

<!-- Main Content -->
<div class="main-table">
  <table width="100%">

    <!-- Thread title -->
    <tr>
      <td><h2><?php echo $thread['title']; ?></h2></td>
      <td align="right">
        <a href="report.php?id=<?php echo $thread['id']; ?>" class="btn" style="background-color:red; width:auto; padding: 5px 12px;">Report</a>
      </td>
    </tr>

    <!-- Thread image -->
    <?php if(!empty($thread['image'])) { ?>
    <tr>
      <td colspan="2">
        <img src="uploads/<?php echo $thread['image']; ?>" width="300" style="border:1px solid #ccc;">
      </td>
    </tr>
    <?php } ?>

    <!-- Thread body -->
    <tr>
      <td colspan="2">
        <p><?php echo $thread['body']; ?></p>
        <small>Posted by <b><?php echo $thread['username']; ?></b> &nbsp;|&nbsp; <?php echo $thread['created_at']; ?></small>
      </td>
    </tr>

    <!-- Divider -->
    <tr><td colspan="2"><hr></td></tr>

    <!-- Replies heading -->
    <tr>
      <td colspan="2"><h3>Replies</h3></td>
    </tr>

    <!-- Replies list -->
    <?php while($reply = mysqli_fetch_assoc($replies)) { ?>
    <tr>
      <td colspan="2">
        <div class="thread-box">
          <table width="100%">
            <tr>
              <td><p><?php echo $reply['body']; ?></p></td>
            </tr>
            <tr>
              <td><small>By <b><?php echo $reply['username']; ?></b> &nbsp;|&nbsp; <?php echo $reply['created_at']; ?></small></td>
            </tr>
          </table>
        </div>
      </td>
    </tr>
    <?php } ?>

    <!-- Reply form -->
    <tr>
      <td colspan="2">
        <h3>Post a Reply</h3>
        <form method="post" name="postReplyForm" action="threadviewbackend.php?id=<?php echo $thread['id']; ?>" onsubmit="return validate();">
          <table width="100%">
            <tr>
              <td><textarea name="replybody" rows="4" placeholder="Write your answer here..."></textarea></td>
            </tr>
            <tr>
              <td><input type="submit" name="reply" value="Post Reply"></td>
            </tr>
          </table>
        </form>
      </td>
    </tr>

  </table>
</div>

</body>
</html>