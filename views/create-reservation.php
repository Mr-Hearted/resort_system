<?php
// Start the session
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Reservation</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Create Reservation - Resort</h2>

        <form>
            <div class="form-group">
                <label for="checkInDate">Check-in date:</label>
                <input type="date" class="form-control" id="checkInDate" name="checkInDate" required>
            </div>

            <div class="form-group">
                <label for="checkOutDate">Check-out date:</label>
                <input type="date" class="form-control" id="checkOutDate" name="checkOutDate" required>
            </div>

            <div class="form-group">
                <label for="guests">Number of guests:</label>
                <input type="number" class="form-control" id="guests" name="guests" min="1" required>
            </div>

            <div class="form-group">
                <label for="roomType">Room type:</label>
                <select class="form-control" id="roomType" name="roomType" required>
                    <option value="">Select room type</option>
                    <option value="standard">Standard Room</option>
                    <option value="deluxe">Deluxe Room</option>
                    <option value="suite">None</option>
                </select>
            </div>

            <div class="form-group">
                <label for="roomType">Cottage type:</label>
                <select class="form-control" id="roomType" name="roomType" required>
                    <option value="">Select room type</option>
                    <option value="standard">Standard Cottage</option>
                    <option value="deluxe">Deluxe Cottage</option>
                    <option value="suite">None</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary"><i class="fas fa-calendar-plus"></i> Create Reservation</button>
        </form>
    </div>
    <script src="js/app.js"></script>
	<!-- Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>