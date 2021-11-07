<?php

$conn = "";

try {
	$servername = "localhost";
	$dbname = "imagegallery";
	$username = "root";
	$password = "";

	$conn = new PDO(
		"mysql:host=$servername; dbname=imagegallery",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

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


?>
