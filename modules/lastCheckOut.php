<?php 
	session_start();
	$bool = $_GET['checkOut'];
	if ($_POST['checkOut'] == "true") {
		$temp = mysqli_fetch_assoc(mysqli_query("SELECT `id` FROM `user` WHERE username = '".$_SESSION['username']."'"));
		$user_id = $temp['id'];
		echo $user_id;
		// $value = ""
		$sqlInsert = "INSERT INTO order (user_id, total, fullName, address, mobile, email) VALUES () ";
	}
?>