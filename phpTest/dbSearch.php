
<?php	

require_once 'dbConnection.php';



class Search {	
	
	public $search = '%';
	
	
	function getProdName () {
		//$search = '%';
		global $conn;
		$query = "SELECT prod_name from tblProducts where prod_name LIKE '$this->search'";
		$statement = $conn->prepare($query);
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
	
		return $results;
	
	}

	function searchLimit ($limit) {
		$this->search = $limit;
	}
	
}

	
	
	
		
?>