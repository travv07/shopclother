<?php 
	include ("connectDB.php");
	session_start();
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if(isset($_SESSION['cart'][$id])){
			$sl  = $_SESSION['cart'][$id];
			$_SESSION['cart'][$id] =$sl + 1;
		}else{
			$_SESSION['cart'][$id]=1;
		}
		$listid="";
		$i=0;
		foreach ($_SESSION['cart'] as $key => $value) {
			$listid.="'".$key."',";
			$i++;
		}
		$listid = trim($listid,",");
		$sql ="select * from Products where id_product in ($listid)";	
		$rs = mysqli_query($conn,$sql);
		$tongtien= 0;
		while ($row = mysqli_fetch_array($rs)) {
					$id=$row['id_product'];
					$sl = $_SESSION['cart'][$id];
					if($sl>=$row['quality']){
						$sl = $row['quality'];
					}
					$tongtien += $sl* $row['price'];
?>
	<li class="header-cart-item">
		<div class="header-cart-item-img">
			<img src="images/<?php echo $row['thumbnail'] ?>" alt="IMG" ten="<?php echo $id ?>" class="deletecart">
		</div>

		<div class="header-cart-item-txt">
			<a href="cart.php" class="header-cart-item-name">
				<?php echo $row['name']; ?>
			</a>

			<span class="header-cart-item-info">
				<?php echo $sl; ?> x <?php  echo $row['price']; ?>  đ
			</span>
			
		</div>
	</li>
<?php } ?>
<div class="header-cart-total">
	Total: <?php echo $tongtien ?>đ
</div>
<?php } ?>							
							