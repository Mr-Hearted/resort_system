<?php
// Start the session
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: login.php");
    exit;
}
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "login_system");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve hotels data
$query = "SELECT * FROM hotels";
$result = mysqli_query($conn, $query);

	// Include add_hotel.php file
	require_once "../php/add_hotel.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Resort</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<h2 class="text-center">Add Resort Information</h2>
					</div>
					<div class="card-body">
						<form action="../php/add_hotel.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="hotel_name">Resort Name:</label>
								<input type="text" name="hotel_name" id="hotel_name" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="hotel_address">Resort Address:</label>
								<input type="text" name="hotel_address" id="hotel_address" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="hotel_room">Resort Room:</label>
								<input type="text" name="hotel_room" id="hotel_room" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="hotel_phone">Resort Contact:</label>
								<input type="text" name="hotel_phone" id="hotel_phone" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="hotel_price">Resort Price:</label>
								<input type="text" name="hotel_price" id="hotel_price" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="hotel_rating">Resort Rating:</label>
								<input type="number" name="hotel_rating" id="hotel_rating" class="form-control" min="1" max="5" required>
							</div>
							<div class="form-group">
								<label for="room_type">Room Type:</label>
								<select name="room_type" id="room_type">
  									<option value="Standard Room">Standard Room</option>
  									<option value="Deluxe Room">Deluxe Room</option>
  									<option value="Family Size Room">Family Size Room</option>
									  <option value="None">None</option>
								</select>
							</div>
							<div class="form-group">
								<label for="cottage_type">Cottage Type:</label>
								<select name="cottage_type" id="cottage_type">
  									<option value="Standard Cottage">Standard Cottage</option>
  									<option value="Deluxe Cottage">Deluxe Cottage</option>
  									<option value="None">None</option>
								</select>
							</div>
							<div class="form-group">
								<label for="hotel_description">Resort Description:</label>
								<textarea name="hotel_description" id="hotel_description" class="form-control" rows="5" required></textarea>
							</div>
							<div class="form-group">
								<label for="hotel_image">Resort/Rooms/Cottage Image:</label>
								<div class="custom-file">
									<input type="file" name="hotel_image" id="hotel_image" class="custom-file-input" required>
									<label class="custom-file-label" for="hotel_image">Choose file</label>
								</div>
							</div>
							<div class="form-group mt-4">
								<button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-2"></i>Create</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/app.js"></script>
	<!-- Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>