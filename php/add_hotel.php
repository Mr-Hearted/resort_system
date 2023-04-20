<?php
// Connect to the database
$conn = mysqli_connect("localhost", "root", "", "login_system");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
	$hotel_name = $_POST['hotel_name'];
	$hotel_address = $_POST['hotel_address'];
	$hotel_phone = $_POST['hotel_phone'];
	$hotel_price = $_POST['hotel_price'];
	$hotel_rating = $_POST['hotel_rating'];
	$hotel_description = $_POST['hotel_description'];

	// Check if hotel image is uploaded
	if (isset($_FILES['hotel_image']) && $_FILES['hotel_image']['error'] === 0) {
		$file_name = $_FILES['hotel_image']['name'];
		$file_size = $_FILES['hotel_image']['size'];
		$file_tmp = $_FILES['hotel_image']['tmp_name'];
		$file_type = $_FILES['hotel_image']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['hotel_image']['name'])));

		$extensions = array("jpeg", "jpg", "png");

		if (in_array($file_ext, $extensions) === false) {
			$errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
		}

		if ($file_size > 2097152) {
			$errors[] = 'File size must be exactly 2 MB';
		}

		if (empty($errors) == true) {
			move_uploaded_file($file_tmp, "../images/hotels/" . $file_name);
			$image_url = "images/hotels/" . $file_name;
		} else {
			print_r($errors);
		}
	} else {
		$image_url = "images/hotels/default.jpg";
	}

	// Insert hotel information into the database
	$query = "INSERT INTO hotels(name, address, phone, price, rating, description, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("sssssss", $hotel_name, $hotel_address, $hotel_phone, $hotel_price, $hotel_rating, $hotel_description, $image_url);

	if ($stmt->execute()) {
		header("Location: ../index.php");
	} else {
		echo "Error: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

