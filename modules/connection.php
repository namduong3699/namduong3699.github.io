<?php  
	$server="localhost";
	$user = "root";
	$pass="";
	$database="test";
	$conn = @mysqli_connect($server,$user,$pass,$database) or die("Khong ket noi dc");
	mysqli_set_charset($conn,"utf8");
?>