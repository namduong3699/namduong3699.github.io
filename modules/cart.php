<?php 
	//session_start();
	if(isset($_SESSION['cart'])) $cart = $_SESSION['cart'];
?>
<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">
				Your Cart
			</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>
		
		<div class="header-cart-content flex-w js-pscroll">
			<ul class="header-cart-wrapitem w-full">
				<?php
				$totalMoney = 0;
					if(isset($cart))
					foreach ($cart as $key => $value) {
						
					
				?>
				<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img">
						<img src="<?php echo $value['images'] ?>" alt="IMG">
					</div>

					<div class="header-cart-item-txt p-t-8">
						<a href="detail.php?id=<?php echo $value['id'] ?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							<?php echo $value['name'] ?>
						</a>

						<span class="header-cart-item-info">
							<?php 
								echo $value['number'].' x $'.$value['price']; 
								$totalMoney += (int)$value['number']*(int)$value['price'];
							?>
						</span>
					</div>
				</li>
				<?php 
					} else echo "<h3>Giỏ hàng rỗng!</h3>"
				?>
				
			</ul>
			
			<div class="w-full">
				<div class="header-cart-total w-full p-tb-40">
					Total: $<?php echo $totalMoney ?>
				</div>

				<div class="header-cart-buttons flex-w w-full">
					<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						View Cart
					</a>

					<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
						Check Out
					</a>
				</div>
			</div>
		</div>
	</div>
</div>