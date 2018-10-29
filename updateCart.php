<?php 
	ob_start();
	session_start();
	$cart = $_SESSION['cart'];
	if (!isset($_POST['number'])) echo "index & number not found";
	else {
		echo "string";
		$index = $_POST['index'];
		$number = $_POST['number'];
		if ((int)$number == 0) {
			array_splice($cart, $index);
		}
		else $cart[$index]['number'] = (int)$number;
	}
	$_SESSION['cart'] = $cart;
	if(isset($_SESSION['username'])) {
		$json = json_encode($cart);
		include("connection.php");
		$sqlUpdate = "UPDATE `user` SET cart = '".$json."' WHERE username = '".$_SESSION['username']."'";
		mysqli_query($conn, $sqlUpdate);
	}
	if (isset($_POST['totalMoney'])) $_SESSION['totalMoney'] = $_POST['totalMoney'];
	else $_SESSION['totalMoney'] = $_SESSION['username'];
	


	//header("location: shoping-cart.php");
?>