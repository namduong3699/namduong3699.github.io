<?php 
session_start();
include("connection.php");
include("function.php");
$bool = $_GET['checkOut'];
if ($bool == "true") {
	$cart = $_SESSION['cart'];
	echo "<pre>";
	print_r($_SESSION["cart"]);
	$html = "<body>
		<style>
	table {
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}

	td, th {
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #dddddd;
	}
</style>
	<table>
	<th>STT</th>
	<th>Tổng giá</th>
	<th>Ngày mua</th>
	<th>Họ và tên</th>
	<th>Địa chỉ</th>
	<th>Số ĐT</th>
	<th>Email</th>
	<th>Tên SP</th>
	<th>Màu sắc</th>
	<th>Số lượng</th>
	<th>Kích cỡ</th>";
	(int)$STT = 0;
	foreach ($cart as $key => $value) {
		(int)$STT++;
		$totalMoney = (int)$value['number'] * (int)$value['price'];
		$temp = mysqli_query($conn, "SELECT `id` FROM `user` WHERE username = '".$_SESSION['username']."'");
		$temp = mysqli_fetch_assoc($temp);
		$user_id = $temp['id'];
		$time = date("Y-m-d H:i:s");
		$account = getInfoRow('user', '*', "username = '".$_SESSION['username']."'");
		$valueSql = "'".$user_id."','".$totalMoney."','".$time."','".$account['fullname']."','".$account['address']."','".$account['phone']."','".$account['email']."','".$value['name']."','".$value['color']."','".$value['number']."','".$value['size']."'";
		$sqlInsert = "INSERT INTO `order` (user_id, total, dateCreate, fullName, address, mobile, email, nameProduct, color, `number`, size) VALUES (".$valueSql."); ";
		echo $sqlInsert;
		mysqli_query($conn, $sqlInsert);
		$html .= "<tr> ";
		$html .= "<td>".$STT."</td>";
		$html .= "<td>".$totalMoney."</td>";
		$html .= "<td>".$time."</td>";
		$html .= "<td>".$account['fullname']."</td>";
		$html .= "<td>".$account['address']."</td>";
		$html .= "<td>".$account['phone']."</td>";
		$html .= "<td>".$account['email']."</td>";
		$html .= "<td>".(string)$value['name']."</td>";
		$html .= "<td>".(string)$value['color']."</td>";
		$html .= "<td>".(string)$value['number']."</td>";
		$html .= "<td>".(string)$value['size']."</td>";
		$html .= "</tr>";
		
	}
	$totalMoney = (int)$_SESSION['totalMoney']/2;
	$html .= "</table><h2>Tổng tiền: ".(string)$totalMoney."</h2></body>";
	echo $html;
	include("modules/sendMail.php");
	sendMail('Order', $html, 'HoaiNam', 'namduong3699@gmail.com',$diachicc='');
	






	// $temp = mysqli_query($conn, "SELECT `id` FROM `user` WHERE username = '".$_SESSION['username']."'");
	// $temp = mysqli_fetch_assoc($temp);
	// $user_id = $temp['id'];
	// $totalMoney = (int)$_SESSION['totalMoney']/2;
	// $time = date("Y-m-d H:i:s");
	// echo $time;
	// $account = getInfoRow('user', '*', "username = '".$_SESSION['username']."'");
	// $value = "'".$user_id."','".$totalMoney."','".$time."','".$account['fullname']."','".$account['address']."','".$account['phone']."','".$account['email']."','".$account['AAAAAA']."','".$account['AAAAAA']."','".$account['AAAAAA']."','".$account['AAAAAA']."'";
	// $sqlInsert = "INSERT INTO `order` (user_id, total, dateCreate, fullName, address, mobile, email, nameProduct, color, `number`, size) VALUES (".$value."); ";
	// echo $sqlInsert;
	// mysqli_query($conn, $sqlInsert);
	header("location: checkOut.php");
}
?>