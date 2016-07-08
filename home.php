<!DOCTYPE html>
<html>
	<head>
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
		  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		  <style>
		      #place {
             position: absolute;
             top: 80px;
             left: 380px;
			 height: 500px;
             width: 600px;
			 background: #F8F8FF;
			 
			 }
			 ::-webkit-input-placeholder {
				color: 	#696969;
			 }
			 :-ms-input-placeholder {  
			   color: 	#696969;  
			 }

			#id1{ 
			  padding: 5px;
			  background: #F8F8FF;
			  display: inline-block;
			  font-size: 30px;
			  font-family: arial;
			  color :	#696969;
			}

			form input {
			  border: none;
			  background: transparent;
			  outline: none;
			}

			form button {
			  background: transparent;
			  border: 0;
			  color: 	#696969;
			}
		  </style>
                  <script>

                  </script>
	</head>
	<body style="background-color:#1E90FF;">
	    <div class="container">
		   <div >
		     <center><h1><font color="white">Todo</font></h1></center>
		    </div>
                  
		    <div class="jumbotron" id="place">				<div >
					<form  method="post" action="todo.php" enctype="multipart/form-data" id="id1">
						 <input type="text" name="activityname" placeholder="Create Some Tasks ... " >
						 <button type="submit" name="submit" ><img src="plus.png" style="border-radius:40px;width:40px;" alt="adding"></button><br/><br/>
					</form>
				</div>

				  <button type="button" class="btn btn-primary">all tasks :&nbsp&nbsp 
					<?php
					
					class TableRows2 extends RecursiveIteratorIterator { 
						function __construct($it) { 
							parent::__construct($it, self::LEAVES_ONLY); 
						}

						function current() {
							return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
						}
					}
					  //configuration
					$dbhost 	= "localhost";
					$dbname		= "kalyani";
					$dbuser		= "root";
					$dbpass		= "1234";
					
					try {
						// database connection
						$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt = $conn->prepare("SELECT COUNT(*) FROM todoactivities;");
						$stmt->execute();
						 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
						 foreach(new TableRows2(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
							 echo $v;
						 }
						 
						}
					catch(PDOException $e)
						{
							echo "Connection failed: " . $e->getMessage();
						}$conn = null;
					?>
				</button>&nbsp&nbsp
				
				 <button type="button" class="btn btn-danger"> incomplete :&nbsp&nbsp
				
					<?php
					class TableRows1 extends RecursiveIteratorIterator { 
						function __construct($it) { 
							parent::__construct($it, self::LEAVES_ONLY); 
						}

						function current() {
							return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
						}
					} 

					$dbhost 	= "localhost";
					$dbname		= "kalyani";
					$dbuser		= "root";
					$dbpass		= "1234";
					try {
						
						$result=0;
						// database connection
						$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt = $conn->prepare("SELECT count(*) FROM todoactivities where status = 'unfinished' ");
						$stmt->execute();
						$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
						foreach(new TableRows1(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
						   echo $v;
						}
		
						}
					catch(PDOException $e)    {
										
						echo "Connection failed: " . $e->getMessage();
					}
					$conn = null;
				?>
				
				</button>&nbsp&nbsp
				
				<button type="button" class="btn btn-success"> complete :&nbsp&nbsp
					 <?php
						class TableRows3 extends RecursiveIteratorIterator { 
						function __construct($it) { 
							parent::__construct($it, self::LEAVES_ONLY); 
						}

						function current() {
							return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
						}
					} 

					$dbhost 	= "localhost";
					$dbname		= "kalyani";
					$dbuser		= "root";
					$dbpass		= "1234";
					try {
						// database connection
						$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$stmt = $conn->prepare("SELECT COUNT(*) FROM todoactivities where status ='finished';");
						$stmt->execute();
						 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
						 foreach(new TableRows3(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
						   echo $v;
						  }
						}
					catch(PDOException $e)
						{
							echo "Connection failed: " . $e->getMessage();
						}$conn = null;
					?>
				</button>
				
				<br/><br/>
				<!-- displaying activities  -->
				 <script>
					 function redirect(url)
					 {
						window.location.href = url;
					 }
				</script>
				<?php
				    echo "<form  action=\"update.php\" method=\"get\">";
					class TableRows extends RecursiveIteratorIterator { 
						function __construct($it) { 
							parent::__construct($it, self::LEAVES_ONLY); 
						}

						function current() {
							return "<h4><input type=\"checkbox\" name=\"ch\"  value=\"". parent::current()."\" onClick=\"this.form.submit()\">&nbsp&nbsp&nbsp&nbsp".parent::current()."</h4>";
						}

					} 

					$dbhost 	= "localhost";
					$dbname		= "kalyani";
					$dbuser		= "root";
					$dbpass		= "1234";
					try {
						$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);					
						$stmt = $conn->prepare("SELECT name FROM todoactivities where status='unfinished'"); 
						$stmt->execute();

						// set the resulting array to associative
						$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
						foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
							echo $v;
						}
						
					}
					catch(PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
					$conn = null;
					echo "</form>";
				?>
				<?php
				
					class TableRows4 extends RecursiveIteratorIterator { 
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

					$dbhost 	= "localhost";
					$dbname		= "kalyani";
					$dbuser		= "root";
					$dbpass		= "1234";
					try {
						$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);					
						$stmt = $conn->prepare("SELECT name FROM todoactivities where status='finished' "); 
						$stmt->execute();

						// set the resulting array to associative
						$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
						foreach(new TableRows4(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
					
							echo $v;	
						}
					}
					catch(PDOException $e) {
						echo "Error: " . $e->getMessage();
					}
					$conn = null;
					echo "</table>";
				?>
				<br/>
				<a href="clear.php"><h3 id="id1">Clear Completed Tasks</h3></a>
            </div>
		</div>
       
	</body>
</html>

