
<?php	

require_once 'dbConnection.php';



	
	function getProdName () {
		//$search = '%';
		global $conn;
		$query = "SELECT prod_name from tblProducts where prod_name LIKE '$search'";
		$statement = $conn->prepare($query);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
	
		return $results;
	
	}

	function searchLimit ($limit) {
		$limit;
	}
	


	
	
	
		
?>