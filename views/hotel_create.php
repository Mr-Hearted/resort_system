<?php
	// Include add_hotel.php file
	require_once "../php/add_hotel.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Hotel</title>
</head>
<body>

	<h2>Add Hotel Information</h2>

	<form action="../php/add_hotel.php" method="post" enctype="multipart/form-data">
		<label>Hotel Name:</label>
		<input type="text" name="hotel_name" required><br><br>

		<label>Hotel Address:</label>
		<input type="text" name="hotel_address" required><br><br>

        <label>Hotel Room:</label>
		<input type="text" name="hotel_room" required><br><br>

		<label>Hotel Phone:</label>
		<input type="text" name="hotel_phone" required><br><br>

		<label>Hotel Price:</label>
		<input type="text" name="hotel_price" required><br><br>

		<label>Hotel Rating:</label>
		<input type="number" name="hotel_rating" min="1" max="5" required><br><br>

		<label>Hotel Description:</label>
		<textarea name="hotel_description" required></textarea><br><br>

		<label>Hotel Image:</label>
		<input type="file" name="hotel_image" required><br><br>

		<input type="submit" name="submit" value="Add Hotel">
	</form>

</body>
</html>
