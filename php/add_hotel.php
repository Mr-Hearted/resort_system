<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "login_system");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Process form data when submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form input values
  $hotel_name = $_POST["hotel_name"];
  $hotel_address = $_POST["hotel_address"];
  $hotel_phone = $_POST["hotel_phone"];
  $hotel_price = $_POST["hotel_price"];
  $hotel_rating = $_POST["hotel_rating"];
  $hotel_description = $_POST["hotel_description"];
  $hotel_image = $_POST["hotel_image"];

  // Prepare an SQL statement to insert the data into the "hotels" table
  $sql = "INSERT INTO hotels (name, address, phone, price, rating, description, image) VALUES (?, ?, ?, ?, ?, ?, ?)";

  // Prepare a statement
  $stmt = mysqli_prepare($conn, $sql);

  // Bind the parameters to the statement
  mysqli_stmt_bind_param($stmt, "sssssss", $hotel_name, $hotel_address, $hotel_phone, $hotel_price, $hotel_rating, $hotel_description, $hotel_image);

  // Execute the statement
  if (mysqli_stmt_execute($stmt)) {
    echo "Hotel added successfully!";
  } else {
    echo "Error: " . mysqli_error($conn);
  }

  // Close the statement
  mysqli_stmt_close($stmt);

  // Close the database connection
  mysqli_close($conn);
}
?>
