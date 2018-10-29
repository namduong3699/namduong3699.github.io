<?php  
	ob_start();
	session_start();
	//session_destroy();
	echo "<pre>";
	print_r($_SESSION["cart"]);
	//$cart = $_SESSION["cart"];
	//echo (int)$cart[11]['number'];
	die;
?>

<?php
 //    $cart[] = array(
 //    	'id'=> "1",
	// 	'name'=> "áo dài",
	// 	'images'=> 'images',
	// 	'price'=> '234',
	// 	'size'=>'M',
	// 	'color'=>'red',
	// 	'number'=>'4'
 //    );
 //    $cart[] = array(
 //    	'id'=> "1",
	// 	'name'=> "áo cộc",
	// 	'images'=> 'images',
	// 	'price'=> '234',
	// 	'size'=>'M',
	// 	'color'=>'red',
	// 	'number'=>'4'
 //    );
 //    foreach ($cart as $key => $value) {
	// 	echo $value['name'];
	// } 
?>