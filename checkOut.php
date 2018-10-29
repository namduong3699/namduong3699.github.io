<?php  
ob_start();
	//session_start();
	// echo "<pre>";
	// print_r($_SESSION["cart"]);
	// die;
include("function.php");
	//echo $_SESSION['totalMoney'];
	//die;
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Shoping Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>
<body class="animsition">
	<?php 
	include("modules/header.php");
	include("modules/cart.php");
	$username = $_SESSION['username'];
	$account = getInfoRow('user', '*', "username = '".$username."'");
	?>

	<!-- breadcrumb -->
	<div class="container" style="margin-top: 100px;">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>


	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">

						<div class="wrap-table-shopping-cart" id="cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th style="font-size: 24px; text-align: center;">Giao hàng</th>
								</tr>
								
								<tr class="table_row" >
									<td class="column-3">
										<div  style="width: 80%; margin: 30px auto 0">
											<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
												<select class="js-select2" name="time">
													<option>Chọn thành phố</option>
													<option>Hà Nội</option>
													<option>TP. Hồ Chí Minh</option>
												</select>
												<div class="dropDownSelect2"></div>
											</div>
											<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
												<select class="js-select2" name="time">
													<option>Chọn quận/huyện</option>
													<option>Hà Nội</option>
													<option>TP. Hồ Chí Minh</option>
												</select>
												<div class="dropDownSelect2"></div>
											</div>

											<div class="bor8 bg0 m-b-22">
												<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Địa chỉ chi tiết">
											</div>
										</div>
										
									</td>
									

									
								</table>
							</div>

							<div class="wrap-table-shopping-cart" id="cart">
								<table class="table-shopping-cart">
									<tr class="table_head">
										<th class="column-1">Product</th>
										<th class="column-2">Images</th>
										<th class="column-3">Size</th>
										<th class="column-3">Color</th>
										<th class="column-3">Price</th>
										<th class="column-4">Quantity</th>
										<th class="column-5">Total</th>
									</tr>
									<?php 
									if (isset($_SESSION["cart"])) {
										foreach ($_SESSION["cart"] as $key => $item) {
											?>
											<tr class="table_row">
												<td class="column-1"><?php echo $item['name']?>
												<input type="hidden" name="id-<?php echo $key?>" id="id-<?php echo $key?>" value="id-<?php echo $key.'-'.$item['id'].'-'.$item['size'].'-'.$item['color'] ?>">
											</td>
											<td class="column-2">
												<div class="how-itemcart1">
													<img src="<?php echo $item['images'] ?>" alt="IMG">
												</div>
											</td>
											<td class="column-3">
												<?php 
												$size = $item['size'];
												$row = getById('size', 'name', "id = '".$size."'");
												echo $row[0];
												?>		
											</td>
											<td class="column-3">
												<?php 
												$color = $item['color'];
												$row = getById('color', 'name', "id = '".$color."'");
												echo $row[0];
												?>

											</td>
											<td class="column-3">$ <?php echo $item['price']; $totalMoney += (int)$item['price']*(int)$item['number'] ?></td>
											<td class="column-4">
												<div class="wrap-num-product flex-w m-l-auto">



													<div style="display: block; height: 46px;width: 35%; margin: 0 auto; text-align: center; line-height: 46px; border: 2px solid #eeeeee;">
														<?php echo $item['number'] ?>
													</div>



												</div>
											</td>
											<td class="column-5">$ <?php echo $item['price']*$item['number'] ?></td>
										</tr>
									<?php }} ?>


								</table>
							</div>

							<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
								<div class="flex-w flex-m m-r-20 m-tb-5">
									<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
									
									<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
										Apply coupon
									</div>
								</div>

								<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 js-update-cart">
									Update Cart
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50" >
						<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" >
							<h4 class="mtext-109 cl2 p-b-30">
								Cart Totals
							</h4>

							<div class="flex-w flex-t bor12 p-b-13">
								<div class="size-208">
									<span class="stext-110 cl2">
										Number of product:
									</span>
								</div>

								<div class="size-209">
									<span class="mtext-110 cl2 subTotal">
										<?php 	
										$count = (int)0;
										if (isset($_SESSION['cart'])) {
											foreach($_SESSION['cart'] as $key => $item) {
												$count += (int)$item['number'];
											}
										}
										echo $count;
										?>
									</span>
								</div>
							</div>

							<div class="flex-w flex-t bor12 p-t-15 p-b-30" >
								<div class="size-208 w-full-ssm" style="margin-bottom: 15px;">
									<span class="stext-110 cl2">
										Username:
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<p class="stext-111 cl6 p-t-2">
										<?php echo $account['username'] ?>
									</p>
								</div>

								<div class="size-208 w-full-ssm"  style="margin-bottom: 15px;">
									<span class="stext-110 cl2">
										Email:
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<p class="stext-111 cl6 p-t-2">
										<?php echo $account['email'] ?>
									</p>
								</div>

								<div class="size-208 w-full-ssm"  style="margin-bottom: 15px;">
									<span class="stext-110 cl2">
										Fullname:
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<p class="stext-111 cl6 p-t-2">
										<?php echo $account['fullname'] ?>
									</p>
								</div>

								<div class="size-208 w-full-ssm" style="margin-bottom: 15px;">
									<span class="stext-110 cl2">
										Phone:
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<p class="stext-111 cl6 p-t-2">
										<?php echo $account['phone'] ?>
									</p>
								</div>

								<div class="size-208 w-full-ssm"  style="margin-bottom: 15px;">
									<span class="stext-110 cl2">
										Address:
									</span>
								</div>

								<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
									<p class="stext-111 cl6 p-t-2">
										<?php echo $account['address'] ?>
									</p>
								</div>
							</div>


							<div class="flex-w flex-t p-t-27 p-b-33">
								<div class="size-208">
									<span class="mtext-101 cl2">
										Total:
									</span>
								</div>

								<div class="size-209 p-t-1 ">
									<span class="mtext-110 cl2 totalMoney">
										<?php echo '$'.(int)$totalMoney/2; ?>
									</span>
								</div>
							</div>

							<a href="lastCheckOut.php?checkOut=true" style="color: white" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer checkOut">	
								Proceed to Checkout	
							</a>
						</div>
					</div>
				</div>
			</div>
		</form>
		
		<?php 
		$_SESSION['totalMoney'] = $totalMoney;
		include("modules/footer.php");
		include("modules/backToTop.php");
		?>
		





		<!--===============================================================================================-->	
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<script>
			$(".js-select2").each(function(){
				$(this).select2({
					minimumResultsForSearch: 20,
					dropdownParent: $(this).next('.dropDownSelect2')
				});
			})
		</script>
		<!--===============================================================================================-->
		<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script>
			$('.js-pscroll').each(function(){
				$(this).css('position','relative');
				$(this).css('overflow','hidden');
				var ps = new PerfectScrollbar(this, {
					wheelSpeed: 1,
					scrollingThreshold: 1000,
					wheelPropagation: false,
				});

				$(window).on('resize', function(){
					ps.update();
				})
			});
		// $('.js-product-down').each(function(){
		// 	$(this).on('click', function(){
		// 		id = this.id;
		// 		id = id.slice(13);
		// 		//alert(id);
		// 		propertites = $('#'+'id-'+id).val();
		// 		quantity = $('#num-'+id).val();
		// 		quantity--;

		// 	});


		// });


		$('.js-update-cart').each(function(){
			$(this).on('click', function(){
				updateCart();
			});
		});

		function updateCart() {
			var length = <?php echo sizeof($_SESSION['cart']) ?>;
			var i = 1;
			for (i = 1; i <= length; i++) {
				var id = i - 1;
				var quantity = $('#num-'+id).val();
				//$.post('updateCart.php', {'index':id, 'number':quantity}, function(data, textStatus, xhr){});
				$.post('updateCart.php', {'index':id,'number': quantity}, function(data, textStatus, xhr){
					$( "#cart" ).load("shoping-cart.php #cart" );
					$( ".totalMoney" ).load("shoping-cart.php .totalMoney" );
					$( ".subTotal" ).load("shoping-cart.php .subTotal" );
				});
				//alert(id + '-' + quantity);
				//location.reload();
			}
		}
		function upCart(id){
			num = parseInt($('#num-'+id).val())+1;
			$.post('updateCart.php', {'index':id,'number':num}, function(data, textStatus, xhr) {
				$( "#cart" ).load("shoping-cart.php #cart" );
				$( ".totalMoney" ).load("shoping-cart.php .totalMoney" );
				$( ".subTotal" ).load("shoping-cart.php .subTotal" );
			});
		}
		function downCart(id){
			num = parseInt($('#num-'+id).val())-1;
			$.post('updateCart.php', {'index':id,'number':num}, function(data, textStatus, xhr) {
				$( "#cart" ).load("shoping-cart.php #cart" );
				$( ".totalMoney" ).load("shoping-cart.php .totalMoney" );
				$( ".subTotal" ).load("shoping-cart.php .subTotal" );
			});
		}
		// function updateCartFunction(index, quantity) {

		// }
		
		// function addcart(){
			

			
		// 	id = $("#id").val();
		// 	size = $("#size").val();
		// 	color = $("#color").val();
		// 	number = $("#num-product").val();
		// 	$.post('addcart.php', {'id':id,'size': size,'color':color,'number':number}, function(data, textStatus, xhr) {
		// 	});
		// }
	</script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>