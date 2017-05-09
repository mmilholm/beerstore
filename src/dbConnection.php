

<?php

$username = "root";
$password = "";
$host = "localhost";
$dbname = "BeerStoreDB";

$dsn = "mysql:host=localhost;dbname=$dbname";

try {
	$conn = new PDO ($dsn, $username, $password);
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	echo "<p> An error occured while try to connect to the database: $error_message </p>";
	exit();
}

//$conn = null;




















?>

