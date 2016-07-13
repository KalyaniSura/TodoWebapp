<?php
$dbhost 	= "localhost";
$dbname		= "kalyani";
$dbuser		= "root";
$dbpass		= "";
$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser,$dbpass);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
?>