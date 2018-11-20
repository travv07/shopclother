<?php 
	include ("connectDB.php");
	session_start();
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if(isset($_SESSION['cart'][$id])){
			$sl  = $_SESSION['cart'][$id];
			$_SESSION['cart'][$id] =$sl +1;
		}else{
			$_SESSION['cart'][$id]=1;
		}
		// unset($_SESSION['cart']);
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
	<img src="images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
	<div class="item-quality">
		<span class="header-icons-noti"><?php echo $i ?></span>
	</div>
	<!-- Header cart noti -->
	<div class="header-cart header-dropdown">
		<ul class="header-cart-wrapitem show-header-dropdown">
			<?php  
				while ($row = mysqli_fetch_array($rs)) {
					$id=$row['id_product'];
					$sl = $_SESSION['cart'][$id];
					$tongtien += $sl* $row['price'];
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
<?php } ?>							
							