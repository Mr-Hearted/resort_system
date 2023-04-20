<?php
// Start the session
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: views/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login and Registration System</title>
</head>
<body>
	<h1>Login and Registration System</h1>
	<p>Welcome to the login and registration system.</p>
	<ul>
		<li><a href="views/login.php">Login</a></li>
		<li><a href="views/register.php">Register</a></li>
		<a href="php/logout.php">Logout</a>
	</ul>
</body>
</html>
