<?php
include 'connect.php';
// The output message
$msg = '';
// Check if user has uploaded new image
if (isset($_FILES['image'], $_POST['title'], $_POST['description'])) {
	// The folder where the images will be stored
	$target_dir = 'images/';
	// The path of the new uploaded image
	$image_path = $target_dir . basename($_FILES['image']['name']);
	// Check to make sure the image is valid
	if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
		if (file_exists($image_path)) {
			$msg = 'Image already exists, please choose another or rename that image.';
		} else if ($_FILES['image']['size'] > 5000000) {
			$msg = 'Image file size too large, please choose an image less than 5MB.';
		} else {
			// Everything checks out now we can move the uploaded image
			move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
			// Connect to MySQL
			$pdo = pdo_connect_mysql();
			// Insert image info into the database (title, description, image path, and date added)
			$stmt = $pdo->prepare('INSERT INTO images (title, description, filepath, uploaded_date) VALUES (?, ?, ?, CURRENT_TIMESTAMP)');
	        $stmt->execute([ $_POST['title'], $_POST['description'], $image_path ]);
			$msg = 'Image uploaded successfully!';
		}
	} else {
		$msg = 'Please upload an image!';
	}
}
?>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
        integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <!-- owl carousel css-->
    <link rel="stylesheet" href="owl-carousel/assets/owl.carousel.min.css" type="text/css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/gallerystyle.css">
    <div class="container">
    <title>PIXO - A website for explore your</title>
</head>
<body>
    <div class="container">
    <nav class="navbar fixed-top navbar-expand-xl" style="background:#90ee90;">
        <div class="container">
            <a class="navbar-brand mobile-logo" href="#"><img src="images/pixo.png" alt="PIXO" /></a>
            <button class="navbar-toggler" data-target="#my-nav" onclick="myFunction(this)" data-toggle="collapse">
                <span class="bar1"></span> <span class="bar2"></span> <span class="bar3"></span> </button>

            <div id="my-nav" class="collapse navbar-collapse">

                <div>
                    <p class="text-left follow">Follow Us:</p>
                    <ul class="navbar-nav float-left social-links">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-pinterest-p"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#"><i class="fab fa-google-plus-g"></i></a>
                        </li>

                    </ul>
                </div>

                <ul class="navbar-nav mx-auto logo-desktop">
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><img src="images/pixo.png" alt="PIXO" /></a>
                    </li>
                </ul>
                <ul class="navbar-nav float-right menu-links">
                    <li class="nav-item">
                        <a class="nav-link" href="/pixo/index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/pixo/gallery.php">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">HALL OF FAME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pixo/login.php">SIGN UP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="content upload">
	<h2>Upload Image</h2>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<label for="image">Choose Image</label>
		<input type="file" name="image" accept="image/*" id="image">
		<label for="title">Title</label>
		<input type="text" name="title" id="title">
		<label for="description">Description</label>
		<textarea name="description" id="description"></textarea>
	    <input type="submit" value="Upload Image" name="submit">
	</form>
	<p><?=$msg?></p>
</div>
</body>
</html>
