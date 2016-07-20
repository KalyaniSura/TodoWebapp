<?php
	

	try {
		function selecting1() {
			
	class TodoActivities3 extends RecursiveIteratorIterator { 
		function __construct($it) { 
			parent::__construct($it, self::LEAVES_ONLY); 
		}

		
		function current() {
			return parent::current();
		}
		function beginChildren() { 
			echo "<h4> <a href=\"#\"> <span class=\"glyphicon glyphicon-ok\"></span></a>&nbsp&nbsp&nbsp&nbsp"; 
		} 

		function endChildren() { 
			echo "</h4>" . "\n";
		} 

	} 
				include 'dbconfig.php';				
				$stmt = $conn->prepare("SELECT name FROM todoactivities where status='finished'"); 
				$stmt->execute();
				// set the resulting array to associative
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
				foreach(new TodoActivities3(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
					echo $v;
		        }
				
	    }
		
	}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$conn = null;
		echo "</form>";
?>
				
				
         

