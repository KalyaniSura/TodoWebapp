
<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "kalyani";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
    $dsql="delete from todoactivities where status='finished';";
	$rslt=mysqli_query($conn,$dsql);
	
	
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
	echo" <script>
		function redirect(url)
			 {
				window.location.href = url;
			}
		</script>
		<form  action=\"update.php\" method=\"get\">";
	$sql = "SELECT name FROM todoactivities where status='unfinished' ";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<h2><input type=\"checkbox\" name=\"ch\"  value=\"".$row["name"] ."\" onClick=\"this.form.submit()\">&nbsp&nbsp&nbsp".$row["name"]."</h2>";
		}
	} 
	//echo "this is working";
	echo "</form>";
	$conn->close();
?>


