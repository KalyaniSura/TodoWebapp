<?php

include 'dbconfig.php';// configuration

try {
	// database connection
    $stmt = $conn->prepare("delete from todoactivities where status='finished';");
	$stmt->execute();
	header('Location: http://localhost/TODO/home.php');

	}
catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }$conn = null;
?>