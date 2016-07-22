<?Php
    class TodoActivities extends RecursiveIteratorIterator { 
		function __construct($it) { 
			parent::__construct($it, self::LEAVES_ONLY); 
		}

		function current() {
			return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
		}
    } 
	try {
 function Counting()
		  {
		    include 'dbconfig.php';
			$stmt = $conn->prepare("SELECT count(*) FROM todoactivities ");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			foreach(new TodoActivities(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 

			}
			return $v;
		  }
	     
	      
		  function SelectedCounting($status1)
		  {
		     
		    include 'dbconfig.php';
		   
			$stmt = $conn->prepare("SELECT count(*) FROM todoactivities where status = :status1  ");
			$stmt->bindParam(':status1', $status1, PDO::PARAM_STR);
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
			foreach(new TodoActivities(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 

			}
			return $v;
		  }
		}
	catch(PDOException $e)    {
						
		echo "Connection failed: " . $e->getMessage();
	}
	$conn = null;
?>