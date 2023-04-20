<!DOCTYPE html>
<html>
<head>
	<title>Resort Reserver</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">Resort Reserver</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="views/login.php">Login</a>
				</li>
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
						<i class="fas fa-heart"></i> Favorites
					</a>
				</li>
			</ul>
		</div>
	</nav>

	<section class="search-section mt-5">
	<div class="container">
			<div class="row">
		<div class="col-md-12">
			<form>
			<div class="form-row align-items-center">
				<div class="col-md-3 d-inline">
				<label class="sr-only" for="inlineFormInputGroup">Search</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					<div class="input-group-text"><i class="fa fa-search"></i></div>
					</div>
					<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Search">
				</div>
				</div>
				<div class="col-md-2 d-inline">
				<label class="sr-only" for="inlineFormInputGroup">Check In</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					<div class="input-group-text"><i class="fa fa-calendar-check-o"></i></div>
					</div>
					<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Check In">
				</div>
				</div>
				<div class="col-md-2 d-inline">
				<label class="sr-only" for="inlineFormInputGroup">Check Out</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					<div class="input-group-text"><i class="fa fa-calendar-check-o"></i></div>
					</div>
					<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Check Out">
				</div>
				</div>
				<div class="col-md-2 d-inline">
				<label class="sr-only" for="inlineFormInputGroup">Number of Rooms</label>
				<div class="input-group mb-2">
					<div class="input-group-prepend">
					<div class="input-group-text"><i class="fa fa-bed"></i></div>
					</div>
					<input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Number of Rooms">
				</div>
				</div>
				
				<div class="col-md-3 d-inline-block">
				<button type="submit" class="btn btn-primary mb-2">Search</button>
				</div>
			</div>
			</form>
		</div>
		</div>

		<div class="row justify-content-center mt-5">
		<div class="col-md-8 col-lg-6">
			<div class="card">
			<div class="card-body">
				<div class="form-group">
				<label for="price-meter">Price Range:</label>
				<br>
				<input type="range" class="custom-range" min="0" max="100" step="1" id="price-meter">
				</div>
				<div class="form-group">
				<label for="rating-dropdown">Rating:</label>
				<select class="form-control" id="rating-dropdown">
					<option>All Ratings</option>
					<option>1 Star</option>
					<option>2 Stars</option>
					<option>3 Stars</option>
					<option>4 Stars</option>
					<option>5 Stars</option>
				</select>
				</div>
				<div class="form-group">
				<label for="location-dropdown">Location:</label>
				<select class="form-control" id="location-dropdown">
					<option>All Locations</option>
					<option>City A</option>
					<option>City B</option>
					<option>City C</option>
				</select>
				</div>
				<div class="form-group">
				<label for="more-dropdown">More:</label>
				<select class="form-control" id="more-dropdown">
					<option>All</option>
					<option>Swimming Pool</option>
					<option>Free Wi-Fi</option>
					<option>Pet-friendly</option>
				</select>
				</div>
			
			
			</div>
			</div>
		</div>
		</div>

		<div class="container mt-4">
		<div class="row">
			<div class="col-md-3 mb-3">
			<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Sort By
				</button>
				<div class="dropdown-menu" aria-labelledby="sortDropdownMenuButton">
				<a class="dropdown-item" href="#">Price: Low to High</a>
				<a class="dropdown-item" href="#">Price: High to Low</a>
				<a class="dropdown-item" href="#">Rating: Low to High</a>
				<a class="dropdown-item" href="#">Rating: High to Low</a>
				</div>
			</div>
			</div>
			
			<div class="col-md-9">
			<div class="row">
				<div class="col-md-4 mb-4">
				<div class="card">
					<img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
					<div class="card-body">
					<h5 class="card-title">Resort Name</h5>
					<p class="card-text">Rating: 4.5</p>
					<p class="card-text">Rooms Available: 10</p>
					<p class="card-text">Rooms Occupied: 5</p>
					<p class="card-text">Price: $50/night</p>
					<a href="#" class="btn btn-primary"><i class="fa fa-heart"></i> Add to Favorites</a>
					</div>
				</div>
				</div>
				<div class="col-md-4 mb-4">
				<div class="card">
					<img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
					<div class="card-body">
					<h5 class="card-title">Resort Name</h5>
					<p class="card-text">Rating: 4.5</p>
					<p class="card-text">Rooms Available: 10</p>
					<p class="card-text">Rooms Occupied: 5</p>
					<p class="card-text">Price: $50/night</p>
					<a href="#" class="btn btn-primary"><i class="fa fa-heart"></i> Add to Favorites</a>
					</div>
				</div>
				</div>
				<div class="col-md-4 mb-4">
				<div class="card">
					<img src="https://via.placeholder.com/300x200" class="card-img-top" alt="...">
					<div class="card-body">
					<h5 class="card-title">Resort Name</h5>
					<p class="card-text">Rating: 4.5</p>
					<p class="card-text">Rooms Available: 10</p>
					<p class="card-text">Rooms Occupied: 5</p>
					<p class="card-text">Price: $50/night</p>
					<a href="#" class="btn btn-primary"><i class="fa fa-heart"></i> Add to Favorites</a>
					</div>
				</div>
				</div>
			</div>
			</div>
		</div>
		</div>
	</div>
	</section>

	
	
	<footer class="bg-light py-4">
  		<div class="container">
    		<div class="row">
      			<div class="col-md-6">
        			<p>&copy; 2023 Resort Reserver. All rights reserved.</p>
      			</div>
      			<div class="col-md-6 text-md-right">
        		<ul class="list-inline">
          			<li class="list-inline-item"><a href="#">Privacy Policy</a></li>
          			<li class="list-inline-item"><a href="#">Terms of Use</a></li>
          			<li class="list-inline-item"><a href="#">Contact Us</a></li>
        		</ul>
      			</div>
    		</div>
  		</div>
	</footer>

	<!-- Bootstrap JS and jQuery -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
