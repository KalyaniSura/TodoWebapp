<?php



// configuration

$dbhost 	= "localhost";

$dbname		= "kalyani";

$dbuser		= "root";

$dbpass		= "1234";

try {

	// database connection

	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	

    $stmt = $conn->prepare("delete from todoactivities where status='finished';");

	$stmt->execute();

	header('Location:http://ec2-52-34-93-209.us-west-2.compute.amazonaws.com/todo/home.php');



	}

catch(PDOException $e)

    {

		echo "Connection failed: " . $e->getMessage();

    }$conn = null;

?>
