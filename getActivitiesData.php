
<?php

	$servername = "localhost";

	$username = "root";

	$password = "1234";

	$dbname = "kalyani";



	// Create connection

	$conn = new mysqli($servername, $username, $password, $dbname);



	// Check connection

	if ($conn->connect_error) {

		die("Connection failed: " . $conn->connect_error);

	}

	$name = $_GET['activityname'];

	

	// prepare and bind

	$stmt = $conn->prepare("INSERT INTO  todoactivities (name) VALUES (?)");

	$stmt->bind_param("s", $name);

	$stmt->execute();

	

	// counting tasks 

	echo "<button type=\"button\" class=\"btn btn-primary\">all tasks :&nbsp&nbsp" ;

	$sql = ("SELECT * FROM todoactivities");

	$rs = mysqli_query($conn,$sql);

	$result = mysqli_num_rows($rs);

	 echo $result;

	 echo "</button>&nbsp";

	 

	 // counting incompletet taks

	echo "<button type=\"button\" class=\"btn btn-danger\"> incomplete :&nbsp&nbsp";

	$sql = ("SELECT name FROM todoactivities where status='unfinished'");

	$rs = mysqli_query($conn,$sql);

	$result = mysqli_num_rows($rs);

	 echo $result;

	echo "</button>&nbsp";

	

	// counting complete tasks

	echo "<button type=\"button\" class=\"btn btn-success\"> complete :&nbsp&nbsp";

	$sql = ("SELECT name FROM todoactivities where status='finished'");

	$rs = mysqli_query($conn,$sql);

	$result = mysqli_num_rows($rs);

	 echo $result;

	echo "</button>";

	

	 

	 //incomplete tasks

	echo $result[0];

	/*echo" <script>

		function redirect(url)

			 {

				window.location.href = url;

			}

		</script>";*/

		

	echo "<form  action=\"update.php\" method=\"get\">";

	$sql = "SELECT name FROM todoactivities where status='unfinished' ";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		// output data of each row

		while($row = mysqli_fetch_assoc($result)) {

			echo "<h4><input type=\"checkbox\" name=\"ch\"  value=\"".$row["name"] ."\" onClick=\"UpdateData(this.value)\">&nbsp&nbsp&nbsp".$row["name"]."</h4>";

		}

	} 

	//complete tasks

	$sql = "SELECT name FROM todoactivities where status='finished' ";

	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {

		// output data of each row

		while($row = mysqli_fetch_assoc($result)) {

		    echo "<h4> <a href=\"#\"> <span class=\"glyphicon glyphicon-ok\"></span></a>&nbsp&nbsp&nbsp&nbsp".$row["name"]."</h4>";

		

		}

	} 

	

	echo "</form>";

	$stmt->close();

	$conn->close();

?>


