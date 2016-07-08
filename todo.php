<?php
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost 	= "localhost";
$dbname		= "kalyani";
$dbuser		= "root";
$dbpass		= "1234";
$activityname = $_POST['activityname'];
try {
if (empty($activityname)) {

  header('Location:http://ec2-52-34-93-209.us-west-2.compute.amazonaws.com/todo/home.php');

} else {
	// database connection
	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
    $stmt = $conn->prepare("INSERT INTO  todoactivities (name) VALUES (:name)");
	$stmt->bindParam(':name', $activityname, PDO::PARAM_STR);
  	
	$stmt->execute();
	header('Location:http://ec2-52-34-93-209.us-west-2.compute.amazonaws.com/todo/home.php');
}
	}
catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }$conn = null;
?>
