<?php
function pdo_connect_mysql() {
    // The below variables should reflect your MySQL credentials
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'imagegallery';
    try {
        // Connect to MySQL using the PDO extension
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and output the error.
    	exit('Failed to connect to database!');
    }
}
// Template header; feel free to customize it, but do not indent the PHP code or it will throw an error
function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="css/style.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
                        <a class="nav-link active" href="">GALLERY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">HALL OF FAME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">CONTACT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">SIGN UP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </div>
    EOT;
    }
    // Template footer
function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }
    ?>


