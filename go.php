<?php
// Initialize a session.
session_start();
require_once("includes/connect.php");
?>
<?php
if (isset($_POST['submitted'])) { // Check if the form has been submitted.
if (preg_match ('%^[A-Za-z0-9]\S{8,20}$%', stripslashes(trim($_POST['userid'])))) {
$u = escape_data($_POST['userid']);
} else {
$u = FALSE;
echo '<p><font color="red" size="+1">Please enter a valid User ID!</font></p>';
}
// FIX IT Check for a good password
if (preg_match ('%^[A-Za-z0-9]\S{8,20}$%', stripslashes(trim($_POST['pass'])))) {
$p = escape_data($_POST['pass']);
} else {
$p = FALSE;
echo '<p><font color="red" size="+1">Please enter a valid Password!</font></p>';
}

// Query the database.
if ($u && $p) {
$query = "SELECT user_id, first_name, last_name, email, userid, pass FROM users WHERE userid='$u' AND pass=SHA('$p')";
$result = mysql_query ($query) or trigger_error("Either the Userid or Password are incorrect");
if (mysql_affected_rows() == 1) { // A match was made.
$row = mysql_fetch_array ($result, MYSQL_NUM);
mysql_free_result($result);
$_SESSION['first_name'] = $row[1];
$_SESSION['userid'] = $row[4];
// Create Second Token
$tokenId = rand(10000, 9999999);
$query2 = "update users set tokenid = $tokenId where userid = '$_SESSION[userid]'";
$result2 = mysql_query ($query2);
$_SESSION['token_id'] = $tokenId;
session_regenerate_id();
header("Location: http://localhost/login/index.php");
mysql_close(); // Close the database connection.
exit();
}
} else { // No match was made.
echo '<br><br><p><font color="red" size="+1">Either the Userid or Password are incorrect</font></p>';
mysql_close(); // Close the database connection
exit();
}
echo '<br><br><p><font color="red" size="+1">Either the Userid or Password are incorrect</font></p>';
mysql_close(); // Close the database connection
exit();
}
// End of SUBMIT conditional.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Good Login</title>
</head>
<body>
<div id="main">
<?php
echo '<h1>Welcome';
if (isset($_SESSION['first_name'])) {
echo ", {$_SESSION['first_name']}!";
}
echo '</h1>';
// Display links based upon the login status
if (isset($_SESSION['userid']) AND (substr($_SERVER['PHP_SELF'], -10) != 'logout.php')) {
echo '<a href="logout.php">Logout</a><br />
<a href="change_password.php">Change Password</a><br />';
} else { //  Not logged in.
echo '	<a href="register.php">Register</a><br />
<a href="goodlogin.php">Login to your account</a><br />
<a href="forgot_password.php">Forgot Password</a><br />';
}
?>
<h1>Login</h1>
<p>Your browser must allow cookies in order to log in.</p>
<form action="go.php" method="post">
<fieldset>
<p><b>Userid:</b> <input type="text" name="userid" size="20" maxlength="20" /></p>
<p><b>Password:</b> <input type="password" name="pass" size="20" maxlength="20" /></p>

<div align="center"><input type="submit" name="submit" value="Login" /></div>
<input type="hidden" name="submitted" value="TRUE" />
</fieldset>
</form>
</div>
</body>
</html>