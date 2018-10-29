<?php  
ob_start();
include("function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>My Account</title>
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
	?>

	

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" style="margin-top: 100px">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart" id="cart">
							<?php
							if (!isset($_SESSION['username'])) {
								echo "<div style='text-align:center'><h1>Bạn chưa đăng nhập</h1></div>";
							} else {
								$username = $_SESSION['username'];
								?>
								<div style='text-align:center; margin: 50px auto; border: none'><h1>Thông tin tài khoản</h1></div>
								<?php $account = getInfoRow('user', '*', "username = '".$username."'") ?>
								<table class="table-shopping-cart">
									<tr class="table_head">
										<!-- <th class="column-5">Chỉnh sửa tài khoản</th> -->

									</tr>

									<tr class="table_row"> <!-- username -->
										<td class="column-1">
											Tên tài khoản: &nbsp;	
											<?php echo $account['username'] ?>
										</td>
										<td class="column-1">
											Họ và tên: &nbsp;
											<?php echo $account['fullname'] ?>
										</td>
									</tr>
									<tr class="table_row"> <!-- username -->
										<td class="column-1">
											Số điện thoại: &nbsp;
											<?php echo $account['phone'] ?>
										</td>
										<td class="column-1">
											Email: &nbsp;	
											<?php echo $account['email'] ?>
										</td>
									</tr>
									<tr class="table_row"> <!-- username -->
										<td class="column-1">
											Địa chỉ: &nbsp;
											<?php echo $account['address'] ?>
										</td>
										<td class="column-1">
											Ngày sinh: &nbsp;	
											<?php echo $account['birthday'] ?>
										</td>
									</tr>

								
							</table>
						<?php } ?>
					</div>

						<!-- <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
							<div class="flex-w flex-m m-r-20 m-tb-5">
								<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

								<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
									Apply coupon
								</div>
							</div>

							<div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10 js-update-cart">
								Update Cart
							</div>
						</div> -->
					</div>
				</div>

				
			</div>
		</div>
	</form>

	<?php 
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