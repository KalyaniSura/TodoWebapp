<html>
<body>
<?php
$errmsg_arr = array();
$errflag = false;
// configuration
include 'dbconfig.php';
$activityname = $_POST['activityname'];

try {
if (empty($activityname)) {
  header('Location: http://localhost/TODO/home.php');
} else {
  
	// database connection
	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	
    $stmt = $conn->prepare("INSERT INTO  todoactivities (name) VALUES (:name)");
	$stmt->bindParam(':name', $activityname, PDO::PARAM_STR);
  	
	$stmt->execute();
	header('Location: http://localhost/TODO/home.php');
}
	}
catch(PDOException $e)
    {
		echo "Connection failed: " . $e->getMessage();
    }$conn = null;
?>
</body>
</html>