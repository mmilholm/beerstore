

<?php

$username = "root";
$password = "root";
$host = "localhost";
$dbname = "ics199demodb";

$dsn = "mysql:host=localhost;dbname=$dbname";

try {
	$conn = new PDO ($dsn, $username, $password);
	$query = 'SELECT * from tblProduct';
	$statement = $conn->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll();
	$statement->closeCursor();
	foreach ($results as $name) {
		echo $name['prod_name'] . " cost about " . $name[prod_price] . '<br>';
	}
	
	
		
	
	
	
} catch (PDOException $e) {
	$error_message = $e->getMessage();
	echo "<p> An error occured while try to connect to the database: $error_message </p>";
	exit();
}

$conn = null;




















?>

