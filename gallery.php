<?php
include 'connect.php';
// Connect to MySQL
$pdo = pdo_connect_mysql();
// MySQL query that selects all the images
$stmt = $pdo->query('SELECT * FROM images ORDER BY uploaded_date DESC');
$images = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                        <a class="nav-link active" href="new pixo\gallery.php">GALLERY</a>
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
    <div class="content home" >
        <h2>Gallery</h2>
        <p>Welcome to the gallery page! You can view the list of uploaded images below.</p>
        <a href="upload.php" class="upload-image">Upload Image</a>
        <div class="images">
            <?php foreach ($images as $image): ?>
            <?php if (file_exists($image['filepath'])): ?>
            <a href="#">
                <img src="<?=$image['filepath']?>" alt="<?=$image['description']?>" data-id="<?=$image['id']?>" data-title="<?=$image['title']?>" width="300" height="200">
                <span><?=$image['description']?></span>
            </a>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
    <div class="image-popup"></div>
    <script>
    // Container we'll use to output the image
    let image_popup = document.querySelector('.image-popup');
    // Iterate the images and apply the onclick event to each individual image
    document.querySelectorAll('.images a').forEach(img_link => {
        img_link.onclick = e => {
            e.preventDefault();
            let img_meta = img_link.querySelector('img');
            let img = new Image();
            img.onload = () => {
                // Create the pop out image
                image_popup.innerHTML = `
                    <div class="con">
                        <h3>${img_meta.dataset.title}</h3>
                        <p>${img_meta.alt}</p>
                        <img src="${img.src}" width="${img.width}" height="${img.height}">
                        <a href="delete.php?id=${img_meta.dataset.id}" class="trash" title="Delete Image"><i class="fas fa-trash fa-xs"></i></a>
                    </div>
                `;
                image_popup.style.display = 'flex';
            };
            img.src = img_meta.src;
        };
    });
    // Hide the image popup container, but only if the user clicks outside the image
    image_popup.onclick = e => {
        if (e.target.className == 'image-popup') {
            image_popup.style.display = "none";
        }
    };
    </script>
</body>
</html>