<?php
session_start();
$_SESSION = array();
session_destroy();
setcookie(session_name(), '', time()-3600, '/');
?>
<html>
<head>
    <title>Logged Out</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta http-equiv="refresh" content="3;url=index.php">
</head>
<body>
<div class="box">
    <table align="center">
        <tr>
            <td align="center"><h2>You have been logged out!</h2></td>
        </tr>
        <tr>
            <td align="center"><p>Redirecting to login page in 3 seconds...</p></td>
        </tr>
        <tr>
            <td align="center"><a href="index.php">Click here if not redirected</a></td>
        </tr>
    </table>
</div>
</body>
</html>