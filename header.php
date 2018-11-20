<?php session_start(); ?>
<header class="header1">
	<!-- Header desktop -->
	<div class="container-menu-header">
		<div class="topbar">
			<div class="topbar-social">
				<a href="#" class="topbar-social-item fa fa-facebook"></a>
				<a href="#" class="topbar-social-item fa fa-instagram"></a>
				<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
				<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
				<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
			</div>

			<span class="topbar-child1">
				Free shipping for standard order over $100
			</span>

			<div class="topbar-child2">
				<span class="topbar-email">
					vvtra@example.com
				</span>

				<div class="topbar-language rs1-select2">
					<select class="selection-1" name="time">
						<option>VND</option>
						<option>EUR</option>
					</select>
				</div>
			</div>
		</div>

		<div class="wrap_header">
			<!-- Logo -->
			<a href="index.php" class="logo">
				<img src="images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Menu -->
			<div class="wrap_menu">
				<nav class="menu">
					<ul class="main_menu">
						<li>
							<a href="index.php">Home</a>
						</li>

						<li>
							<a href="product.php">Shop</a>
						</li>

						<li>
							<a href="cart.php">Features</a>
						</li>

						<li>
							<a href="contact.php">Contact</a>
						</li>
					</ul>
				</nav>
			</div>
			<!-- Header Icon -->
			<div class="header-icons">
				<a href="#" class="header-wrapicon1 dis-block">
					<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>

				<span class="linedivide1"></span>
				<?php 
					include ("connectDB.php");
					session_start();
					if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
						$listid="";
						$i=0;
						foreach ($_SESSION['cart'] as $key => $value) {
							$listid.="'".$key."',";
							$i++;
						}
						$listid = trim($listid,",");
						$sql ="select * from Products as p join Productimage as pi on p.id_product_img=pi.id_product_img where p.id_product in ($listid)";
						$rs = mysqli_query($conn,$sql);
						$tongtien= 0;	
				?>
				<div class="header-wrapicon2">
					<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<div class="item-quality">
						<span class="header-icons-noti"><?php echo $i ?></span>
					</div>
					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem">
							<?php  
								while ($row = mysqli_fetch_array($rs)) {
									$id=$row['id_product'];
									$sl = $_SESSION['cart'][$id];
									$tongtien += $sl*$row['price'];
							?>
								<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="images/<?php echo $row['image'] ?>" alt="IMG" ten="<?php echo $id ?>" class="deletecart">
									</div>

									<div class="header-cart-item-txt">
										<a href="cart.php" class="header-cart-item-name">
											<?php echo $row['name']; ?>
										</a>

										<span class="header-cart-item-info">
											<?php echo $sl; ?> x <?php  echo $row['price']; ?> VND
										</span>
									</div>
								</li>
							<?php } ?>
							<div class="header-cart-total">
								Total: <?php echo $tongtien ?> VND
							</div>
						</ul>
						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									View Cart
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Check Out
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php }else { ?>
					<div class="header-wrapicon2">
						<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">0</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">

								<p>Your cart empty!!!</p>
								<div class="header-cart-total">
									Total: 0 VND
								</div>
							</ul>
							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap_header_mobile">
		<!-- Logo moblie -->
		<a href="index.php" class="logo-mobile">
			<img src="images/icons/logo.png" alt="IMG-LOGO">
		</a>

		<!-- Button show menu -->
		<div class="btn-show-menu">
			<!-- Header Icon mobile -->
			<div class="header-icons-mobile">
				<a href="#" class="header-wrapicon1 dis-block">
					<img src="images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
				</a>

				<span class="linedivide2"></span>

				<div class="header-wrapicon2">
					<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
					<span class="header-icons-noti">0</span>

					<!-- Header cart noti -->
					<div class="header-cart header-dropdown">
						<ul class="header-cart-wrapitem">
							<li class="header-cart-item">
								<div class="header-cart-item-img">
									<img src="images/item-cart-01.jpg" alt="IMG">
								</div>

								<div class="header-cart-item-txt">
									<a href="#" class="header-cart-item-name">
										White Shirt With Pleat Detail Back
									</a>

									<span class="header-cart-item-info">
										1 x $19.00
									</span>
								</div>
							</li>
						</ul>

						<div class="header-cart-total">
							Total: $75.00
						</div>

						<div class="header-cart-buttons">
							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="cart.php" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									View Cart
								</a>
							</div>

							<div class="header-cart-wrapbtn">
								<!-- Button -->
								<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
									Check Out
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</div>

	<!-- Menu Mobile -->
	<div class="wrap-side-menu" >
		<nav class="side-menu">
			<ul class="main-menu">
				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<span class="topbar-child1">
						Free shipping for standard order over $100
					</span>
				</li>

				<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
					<div class="topbar-child2-mobile">
						<span class="topbar-email">
							vvtra@example.com
						</span>

						<div class="topbar-language rs1-select2">
							<select class="selection-1" name="time">
								<option>USD</option>
								<option>EUR</option>
							</select>
						</div>
					</div>
				</li>

				<li class="item-topbar-mobile p-l-10">
					<div class="topbar-social-mobile">
						<a href="#" class="topbar-social-item fa fa-facebook"></a>
						<a href="#" class="topbar-social-item fa fa-instagram"></a>
						<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
						<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
						<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
					</div>
				</li>

				<li class="item-menu-mobile">
					<a href="index.php">Home</a>
				</li>

				<li class="item-menu-mobile">
					<a href="product.php">Shop</a>
				</li>

				<li class="item-menu-mobile">
					<a href="product.php">Sale</a>
				</li>

				<li class="item-menu-mobile">
					<a href="cart.php">Features</a>
				</li>

				<li class="item-menu-mobile">
					<a href="blog.php">Blog</a>
				</li>

				<li class="item-menu-mobile">
					<a href="about.php">About</a>
				</li>

				<li class="item-menu-mobile">
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</nav>
	</div>
</header>