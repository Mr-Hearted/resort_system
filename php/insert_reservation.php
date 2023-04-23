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

$check_in_date = mysqli_real_escape_string($conn, $_POST['checkInDate']);
$check_out_date = mysqli_real_escape_string($conn, $_POST['checkOutDate']);
$guests = mysqli_real_escape_string($conn, $_POST['guests']);
$room_type = mysqli_real_escape_string($conn, $_POST['room_type']);
$cottage_type = mysqli_real_escape_string($conn, $_POST['cottage_type']);
$hotel_id = mysqli_real_escape_string($conn, $_POST['hotel_id']);

$query = "INSERT INTO reservations (check_in_date, check_out_date, guests, room_type, cottage_type, hotel_id) VALUES ('$check_in_date', '$check_out_date', '$guests', '$room_type', '$cottage_type', '$hotel_id')";

if (mysqli_query($conn, $query)) {
    $message = "Reservation created successfully!";
} else {
    $message = "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Reservation Confirmation</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
		crossorigin="anonymous">
</head>
<body>
	<div class="container mt-5">
		<div class="row">
			<div class="col-md-6 offset-md-3 text-center">
				<h1><?php echo $message; ?></h1>
				<a href="../views/homepage.php" class="btn btn-primary mt-3">Back to Home Page</a>
			</div>
		</div>
	</div>

	<!-- Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi4jlru"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>
</html>







