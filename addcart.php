<?php
	ob_start();
	session_start();  
	include("function.php");
	if(isset($_POST["id"]) && isset($_POST["size"])&& isset($_POST["color"])&& isset($_POST["number"])){
		$id = $_POST["id"];
		$size = $_POST["size"];
		$color = $_POST["color"];
		$number = $_POST["number"];
		$data = getById('product','*','id = '.$id);
		echo "string";
		if(!isset($_SESSION["cart"])){
			$cart[] = array(
				'id'	=> $id,
				'name'	=> $data[1],
				'images'=> $data[2],
				'price'	=> $data[4],
				'size'	=> $size,
				'color'	=> $color,
				'number'=> $number,
			);
		}else{
			$cart = $_SESSION["cart"];
			$add = false;
			foreach ($cart as $key => $value) {
				if ($value['id'] == $id && $value['color'] == $color && $value['size'] == $size) {
					$value['number'] = (int)$value['number'] + (int)$number;
					$add = true;
				} 
			}
			if (!$add) {
			$cart[] = array(
				'id'	=> $id,
				'name'	=> $data[1],
				'images'=> $data[2],
				'price'	=> $data[4],
				'size'	=> $size,
				'color'	=> $color,
				'number'=> $number,
			);
		}
			



			// if(array_key_exists($id , $cart)){
			// 	$temp = (int)$cart[$id]["number"];
			// 	$cart[$id] = array(
			// 		'name'=>$data[1],
			// 		'images'=>$data[2],
			// 		'price'=>$data[4],
			// 		'size'=>$_POST["size"],
			// 		'color'=>$_POST["color"],
			// 		// 'number'=>(int)$cart[$id]["number"]-2,
			// 		'number'=>(int)$cart[$id]["number"] + (int)$_POST["number"],
			// 	);
			// 	if ((int)$cart[$id]['number'] == 0) {$cart.delete($id); echo "string";}
			// }else{
			// 	$cart[$id ] = array(
			// 		'name'=>$data[1],
			// 		'images'=>$data[2],
			// 		'price'=>$data[4],
			// 		'size'=>$_POST["size"],
			// 		'color'=>$_POST["color"],
			// 		'number'=>$_POST["number"],
			// 	);
			// }
		}
		$_SESSION["cart"] = $cart;
	}
?>