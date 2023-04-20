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
    <title>Homepage</title>
    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body class="home-body">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Resort Reserveration System</a>
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
					<a class="nav-link" href="#">
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
		<div class="col-md-8">
		<form class="form-inline">
			<div class="form-group mr-2">
			<div class="input-group">
				<div class="input-group-prepend">
				<div class="input-group-text"><i class="fas fa-search"></i></div>
				</div>
				<input type="text" class="form-control" placeholder="Search">
			</div>
			</div>
			<div class="form-group mr-2">
			<div class="dropdown">
				<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownRooms" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-bed"></i> Rooms
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownRooms">
				<!-- Room options here -->
					<a class="dropdown-item" href="#">Single Room</a>
					<a class="dropdown-item" href="#">Double Room</a>
					<a class="dropdown-item" href="#">Family Size Room</a>
				</div>
			</div>
			</div>
			<div class="form-group mr-2">
			<div class="dropdown">
				<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownRooms" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-home mr-2"></i> Cottage
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownRooms">
				<!-- Cottage options here -->
					<a class="dropdown-item" href="#">Small</a>
					<a class="dropdown-item" href="#">Medium</a>
					<a class="dropdown-item" href="#">Large</a>
				</div>
			</div>
			</div>
			<div class="form-group mr-2">
			<div class="dropdown">
				<button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownPrice" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-dollar-sign"></i> Price
				</button>
				<div class="dropdown-menu" aria-labelledby="dropdownPrice">
				<!-- Price options here -->
					<a class="dropdown-item" href="#">100-500</a>
					<a class="dropdown-item" href="#">500-1000</a>
					<a class="dropdown-item" href="#">1000-1500</a>
					<a class="dropdown-item" href="#">1500-2000</a>
				</div>
			</div>
			</div>
			<button type="submit" class="btn btn-primary">Search</button>
		</form>
		</div>
	</div>
	<div class="row">
		<div class="row mt-4">
				<div class="col-md-4 mb-4">
					<div class="card shadow">
					<img src="../img/fabio-fistarol-qai_Clhyq0s-unsplash.jpg" class="card-img-top" alt="Resort 1">
					<div class="card-body">
						<h5 class="card-title">Resort 1</h5>
						<p class="card-text">Rating: 4.5 stars</p>
						<p class="card-text">Location: Forest</p>
						<p class="card-text">Rooms available: 10/15</p>
						<p class="card-text">Cottages available: 5/5</p>
						<p class="card-text">Price: ₱500/night</p>
						<a href="#" class="btn btn-primary">Make a reservation</a>
					</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
					<img src="../img/roberto-nickson-MA82mPIZeGI-unsplash.jpg" class="card-img-top" alt="Resort 2">
					<div class="card-body">
						<h5 class="card-title">Resort 2</h5>
						<p class="card-text">Rating: 4.2 stars</p>
						<p class="card-text">Location: Mountain view</p>
						<p class="card-text">Rooms available: 8/10</p>
						<p class="card-text">Cottages available: 3/5</p>
						<p class="card-text">Price: ₱1000/night</p>
						<a href="#" class="btn btn-primary">Make a reservation</a>
					</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
					<img src="../img/sasha-kaunas-TAgGZWz6Qg8-unsplash.jpg" class="card-img-top" alt="Resort 3">
					<div class="card-body">
						<h5 class="card-title">Resort 3</h5>
						<p class="card-text">Rating: 4.8 stars</p>
						<p class="card-text">Location: Beachfront</p>
						<p class="card-text">Rooms available: 12/15</p>
						<p class="card-text">Cottages available: 2/5</p>
						<p class="card-text">Price: ₱1500/night</p>
						<a href="#" class="btn btn-primary">Make a reservation</a>
					</div>
					</div>
				</div>
		<!-- Repeat above image card divs to add more images -->
				<div class="col-md-4">
					<div class="card">
					<img src="../img/fabio-fistarol-qai_Clhyq0s-unsplash.jpg" class="card-img-top" alt="Resort 1">
					<div class="card-body">
						<h5 class="card-title">Resort 1</h5>
						<p class="card-text">Rating: 4.5 stars</p>
						<p class="card-text">Location: Forest</p>
						<p class="card-text">Rooms available: 10/15</p>
						<p class="card-text">Cottages available: 5/5</p>
						<p class="card-text">Price: ₱500/night</p>
						<a href="#" class="btn btn-primary">Make a reservation</a>
					</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
					<img src="../img/roberto-nickson-MA82mPIZeGI-unsplash.jpg" class="card-img-top" alt="Resort 2">
					<div class="card-body">
						<h5 class="card-title">Resort 2</h5>
						<p class="card-text">Rating: 4.2 stars</p>
						<p class="card-text">Location: Mountain view</p>
						<p class="card-text">Rooms available: 8/10</p>
						<p class="card-text">Cottages available: 3/5</p>
						<p class="card-text">Price: ₱1000/night</p>
						<a href="#" class="btn btn-primary">Make a reservation</a>
					</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card">
					<img src="../img/sasha-kaunas-TAgGZWz6Qg8-unsplash.jpg" class="card-img-top" alt="Resort 3">
					<div class="card-body">
						<h5 class="card-title">Resort 3</h5>
						<p class="card-text">Rating: 4.8 stars</p>
						<p class="card-text">Location: Beachfront</p>
						<p class="card-text">Rooms available: 12/15</p>
						<p class="card-text">Cottages available: 2/5</p>
						<p class="card-text">Price: ₱1500/night</p>
						<a href="#" class="btn btn-primary">Make a reservation</a>
					</div>
					</div>
				</div>
	</div>
	</div>

	<!-- Display hotels data -->
<div class="row">
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <div class="col-md-4 mb-4">
      <div class="card shadow">
        <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['name']; ?></h5>
          <p class="card-text">Rating: <?php echo $row['rating']; ?> stars</p>
          <p class="card-text">Location: <?php echo $row['address']; ?></p>
          <p class="card-text">Rooms available: <?php echo $row['rooms']; ?></p>
		  <p class="card-text">Contact Info: <?php echo $row['phone']; ?></p>
		  <p class="card-text">Description: <?php echo $row['description']; ?></p>
          <p class="card-text">Price: <?php echo $row['price']; ?>/night</p>
          <a href="<?php echo isset($_SESSION['logged_in']) ? 'reservation.php' : 'login.php'; ?>" class="btn btn-primary">Make a reservation</a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>

<?php
// Close connection
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