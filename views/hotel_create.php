<?php
	// Include add_hotel.php file
	require_once "../php/add_hotel.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Hotel Information</title>
</head>
<body>
	<h2>Add Hotel Information</h2>
	<form method="post" action="add_hotel.php" enctype="multipart/form-data">
		<label for="hotel_name">Hotel Name:</label>
		<input type="text" name="hotel_name" required><br><br>

		<label for="hotel_address">Hotel Address:</label>
		<input type="text" name="hotel_address" required><br><br>

		<label for="hotel_phone">Hotel Phone:</label>
		<input type="text" name="hotel_phone" required><br><br>

		<label for="hotel_price">Hotel Price:</label>
		<input type="number" name="hotel_price" required><br><br>

		<label for="hotel_description">Hotel Description:</label>
		<textarea name="hotel_description" required></textarea><br><br>

		<label for="hotel_image">Hotel Image:</label>
		<input type="file" name="hotel_image" required><br><br>

		<label for="hotel_rating">Hotel Rating:</label>
		<input type="number" name="hotel_rating" min="1" max="5" required><br><br>

		<input type="submit" value="Add Hotel">
	</form>
</body>
</html>
