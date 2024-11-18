<?php 
$server = "localhost";	
$database = "db_themepark";
$user = "root";
$pass = "";

$conn = mysqli_connect($server, $user, $pass, $database);
if(!$conn)
{
	echo "Connection Faild";	
	
	}
?>