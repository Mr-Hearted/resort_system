<?php
	// Include config file
	require_once "../php/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<h1>Register</h1>
	<form action="../php/register_process.php" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" required><br><br>
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required><br><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password" required><br><br>
    <label for="user_type">User Type:</label>
    <select name="user_type" id="user_type" required>
        <option value="">-- Select User Type --</option>
        <option value="buyer">Buyer</option>
        <option value="seller">Seller</option>
    </select><br><br>
    <input type="submit" value="Register">
</form>
</body>
</html>
