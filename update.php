<?php
$errmsg_arr = array();
$errflag = false;
// configuration
$dbhost 	= "localhost";
$dbname		= "kalyani";
$dbuser		= "root";
$dbpass		= "1234";
$name=$_GET['ch'];
echo $name;
try {
	// database connection
	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
    $stmt = $conn->prepare("update todoactivities set status='finished' where name =:name");
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->execute();
	header('Location:http://ec2-52-34-93-209.us-west-2.compute.amazonaws.com/todo/home.php');

	}
catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }$conn = null;
?>
