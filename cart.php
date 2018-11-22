<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'header.php' ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(images/bia5.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>
		<?php 
			include ("connectDB.php");
			session_start();
			if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
				$listid="";
				foreach ($_SESSION['cart'] as $key => $value) {
					$listid.="'".$key."',";
				}
				$listid = trim($listid,",");
				$sql ="select * from Products as p join Productimage as pi on p.id_product_img=pi.id_product_img where p.id_product in ($listid)";
				$rs = mysqli_query($conn,$sql);
				$tongtien= 0;
		 ?>
	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-60">Quantity</th>
							<th class="column-5">Total</th>
							<th class="column"></th>
							<th class="column"></th>
						</tr>
						<?php 
							while ($row = mysqli_fetch_array($rs)) {
							$i++;
							$id=$row['id_product'];
							$sl = $_SESSION['cart'][$id];
							if($sl>=$row['quality']){
								$sl = $row['quality'];
							}
							$tongtien += $sl* $row['price'];
							$total = $sl* $row['price'];
							$_SESSION['tongtien'] = $tongtien;
						 ?>		
						<form action="editcart.php" method="get">
							<input type="hidden" name="id" value="<?php echo $id; ?>">
							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="images/<?php echo $row['image'] ?>" ten= "<?php echo $id ?>" alt="IMG-PRODUCT" class="deletecart">
									</div>
								</td>
								<td class="column-2"><?php echo $row['name'] ?></td>
								<td class="column-3"><?php echo $row['price'] ?> đ</td>
								<td class="column-4">
									<div class="flex-w bo5 of-hidden w-size17">
										<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2 updatequatity" ten ="+" x="<?php echo $row['quality'] ?>" y="<?php echo $row['id_product'] ?>">
											-
										</button>
										<input class="size8 m-text18 t-center num-product quality-<?php echo $row['id_product'] ?>"  type="number" name="soluong" value="<?php echo $sl ?>" max="<?php echo $row['quality'] ?>" min="1">

										<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2 updatequatity" ten = "-" x="<?php echo $row['quality'] ?>" y="<?php echo $row['id_product'] ?>">
											+
										</button>
									</div>
								</td>
								<td class="column-5"><?php echo $total ?> đ</td>
								<td class="column"><button type="submit" name="submit" value="submit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></td>
								<td class="column"><a href="rmcart.php?ten=<?php echo $id ?>"><i style="color: red;height: 24.4px;" class="fa fa-times" aria-hidden="true"></i></a></td>	
							</tr>
						</form>				

						<?php } ?>
					
					</table>
				</div>
			</div>

			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						Free ships
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total: 
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo $tongtien ?> đ
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					<button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
						Proceed to Checkout
					</button>
				</div>
			</div>
		</div>
	</section>
		<?php } else  { ?>
				<div style="height: 200px; text-align: center; " >
					<h2 style="margin-top:100px ">Your cart empty !!!</h2>
				</div>
		<?php  } ?>
			

	<!-- Footer -->
	<?php include 'footer.php' ?>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection -->
	<div id="dropDownSelect1"></div>
	<div id="dropDownSelect2"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
		$(".updatequatity").click(function(){
			var ten = $(this).attr('ten');	
			var slmax= $(this).attr('x');
			var id = $(this).attr('y');
			var sl = $('.quality-'+id).val();
			if (sl>=slmax) {
				sl=slmax;
			}
			$('.quality-'+id).val(sl);
		});
	</script>
</body>
</html>
