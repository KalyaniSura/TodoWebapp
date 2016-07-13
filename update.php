<?php
$errmsg_arr = array();
$errflag = false;
// configuration
include 'dbconfig.php';
$name=$_GET['ch'];
echo $name;
try {
	// database connection
    $stmt = $conn->prepare("update todoactivities set status='finished' where name =:name");
	$stmt->bindParam(':name', $name, PDO::PARAM_STR);
	$stmt->execute();
	header('Location: http://localhost/TODO/home.php');

	}
catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }$conn = null;
?>