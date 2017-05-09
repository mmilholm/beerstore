
<?php	

require_once 'dbtest.php';



class Search {	
	
	public $search = '%';
	
	
	function getProdName () {
		//$search = '%';
		global $conn;
		$query = "SELECT prod_name from tblProduct where prod_name LIKE '$this->search'";
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