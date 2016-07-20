<?php
	class TodoActivities1 extends RecursiveIteratorIterator { 
		function __construct($it) { 
			parent::__construct($it, self::LEAVES_ONLY); 
		}

		function current() {
			return "<h4><input type=\"checkbox\" name=\"ch\"  value=\"". parent::current()."\" onClick=\"this.form.submit()\">&nbsp&nbsp&nbsp".parent::current()."</h4>";
		}
		

	} 

	try {
		function selecting() {
				include 'dbconfig.php';					
				$stmt = $conn->prepare("SELECT name FROM todoactivities where status='unfinished'"); 
				$stmt->execute();
				// set the resulting array to associative
				$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
				foreach(new TodoActivities1(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
					echo $v;
		        }
	    }
	}
		catch(PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
		$conn = null;
?>
				
				
         

