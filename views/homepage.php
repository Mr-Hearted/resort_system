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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body class="home-body">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="homepage.php">Resort and Management Reservation System</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Menu
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Recent View</a>
						<a class="dropdown-item" href="#">Help and Support</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="favorite.php">
						<i class="far fa-heart"></i> Favorites
					</a>
				</li>
                <li class="nav-item">
					<a class="nav-link text-danger" href="../php/logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</nav>
	
	<div class="container my-4">
    <div class="row mb-4">
        <div class="d-flex align-items-center">
            <form class="form-inline" method="GET" action="">
                <div class="form-group mr-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-search"></i></div>
                        </div>
                        <input type="text" class="form-control" name="query" placeholder="Search">
                    </div>
                </div>
                <div class="form-group mr-2">
                    <select class="form-control" name="room_type">
                        <option value="">Room Type</option>
                        <option value="Standard Room">Standard Room</option>
                        <option value="Deluxe Room">Deluxe Room</option>
                        <option value="Family Size">Family Size</option>
                    </select>
                </div>
                <div class="form-group mr-2">
                    <select class="form-control" name="cottage_type">
                        <option value="">Cottage Type</option>
                        <option value="Standard Cottage">Standard Room</option>
                        <option value="Deluxe Cottage">Deluxe Room</option>
                        <option value="None">None</option>
                    </select>
                </div>
                <div class="form-group mr-2">
                    <select class="form-control" name="price">
                        <option value="">Price</option>
                        <option value="100-500">100-500</option>
                        <option value="500-1000">500-1000</option>
                        <option value="1000-1500">1000-1500</option>
                        <option value="1500-2000">1500-2000</option>
                    </select>
                </div>
				<div class="form-group mr-2">
                	<button type="submit" class="btn btn-primary btn-light">Search</button>
				</div>
            </form>
        </div>
    </div>

	<?php

// Retrieve search parameters from GET request
$query = isset($_GET['query']) ? $_GET['query'] : '';
$room_type = isset($_GET['room_type']) ? $_GET['room_type'] : '';
$cottage_type = isset($_GET['cottage_type']) ? $_GET['cottage_type'] : '';
$price_range = isset($_GET['price']) ? $_GET['price'] : '';

// Build SQL query based on search parameters
$sql = "SELECT * FROM hotels WHERE name LIKE '%$query%' AND room_type LIKE '%$room_type%' AND cottage_type LIKE '%$cottage_type%'";

if (!empty($price_range)) {
	list($min_price, $max_price) = explode('-', $price_range);
	$sql .= " AND price BETWEEN $min_price AND $max_price";
  }
  
// Execute SQL query and retrieve results
$result = mysqli_query($conn, $sql);

// Check if there are any matching results
if (mysqli_num_rows($result) > 0) {
	
if (isset($_POST['search'])) {	
  while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="row">
<div class="col-md-4 mb-4">
  <div class="card shadow">
    <img src="../<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
    <div class="card-body">
      <h5 class="card-title"><?php echo $row['name']; ?></h5>
      <p class="card-text">Rating: <?php echo $row['rating']; ?> stars</p>
      <p class="card-text">Location: <?php echo $row['address']; ?></p>
      <p class="card-text">Rooms available: <?php echo $row['rooms']; ?></p>
      <p class="card-text">Room Type: <?php echo $row['room_type']; ?></p>
      <p class="card-text">Cottage: <?php echo $row['cottage_type']; ?></p>
      <p class="card-text">Price: ₱<?php echo $row['price']; ?>/night</p>
      <a href="<?php echo isset($_SESSION['logged_in']) ? 'create-reservation.php?hotel_id=' . $row['id'] : 'login.php'; ?>" class="btn btn-primary">Make a reservation</a>
    </div>
  </div>
</div>
  </div>
<?php
  }
}
}else{
	echo "<p class='text-white'>No result found.</p>";
}	
?>

  <div class="row">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="col-md-4 mb-4">
      <div class="card shadow">
        <img src="../<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['name']; ?></h5>
          <p class="card-text">Rating: <?php echo $row['rating']; ?> stars</p>
          <p class="card-text">Location: <?php echo $row['address']; ?></p>
          <p class="card-text">Rooms available: <?php echo $row['rooms']; ?></p>
		  <p class="card-text">Room Type: <?php echo $row['room_type']; ?></p>
		  <p class="card-text">Cottage: <?php echo $row['cottage_type']; ?></p>
          <p class="card-text">Price: ₱<?php echo $row['price']; ?>/night</p>
          <a href="<?php echo isset($_SESSION['logged_in']) ? 'create-reservation.php?hotel_id=' . $row['id'] : 'login.php'; ?>" class="btn btn-primary">Make a reservation</a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<?php
mysqli_close($conn);
?>


<footer class="py-4">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p>&copy; 2023 Resort Management. All rights reserved.</p>
      </div>
      <div class="col-md-6 text-md-right">
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
          <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>


	<script src="js/app.js"></script>
	<!-- Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>