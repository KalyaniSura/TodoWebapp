<?php

include 'dbconfig.php';// configuration

try {
	// database connection
    $stmt = $conn->prepare("delete from todoactivities where status='finished';");
	$stmt->execute();
	header('Location: http://ec2-52-34-93-209.us-west-2.compute.amazonaws.com/TodoWebapp/home.php');

	}
catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }$conn = null;
?>
