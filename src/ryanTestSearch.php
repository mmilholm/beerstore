
<?php

require_once 'dbConnection.php';



		$search = $_POST['type'];
		global $conn;
		$query = "SELECT * FROM tblProducts WHERE cat_id = '$search'";
		$statement = $conn->prepare($query);
		$statement->execute();
		$results = array();
		$results = $statement->fetchAll();
		$statement->closeCursor();

		echo json_encode($results);


?>
