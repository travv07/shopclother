<?php
  	include("connectDB.php");
	$sql = "SELECT count(p.id_product) as total from Products as p join Productimage as pi on p.id_product_img=pi.id_product_img";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$total_records= $row['total'];
	$current_page= $_GET['page'];
	$limit = 6;
	$total_page = ceil($total_records/$limit);
	if($current_page > $total_page){
		$current_page=$total_page;
	}else if($current_page < 1){
		$current_page=1;
	}
	$start = ($current_page-1)*$limit;
	$sql1= "SELECT * from Products as p join Productimage as pi on p.id_product_img=pi.id_product_img LIMIT $start,$limit";
	$result =$result = mysqli_query($conn,$sql1);
?>
	<?php while ($row = mysqli_fetch_array($result)) { ?>
	<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
		<!-- Block2 -->		
		<div class="block2">
			<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
				<img src="images/<?php echo $row['image'] ?>" alt="IMG-PRODUCT">

				<div class="block2-overlay trans-0-4">
					<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
						<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
						<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
					</a>

					<div class="block2-btn-addcart w-size1 trans-0-4">
						<!-- Button -->
						<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
							Add to Cart
						</button>
					</div>
				</div>
			</div>

			<div class="block2-txt p-t-20">
				<a href="product-detail.php?id=<?php echo $row['id_product'] ?>" class="block2-name dis-block s-text3 p-b-5">
					<?php echo $row['name'] ?>
				</a>

				<span class="block2-price m-text6 p-r-5">
					<?php echo $row['price'] ?> 
				</span>
				đ
			</div>
		</div>
	</div>
<?php } ?>
<script type="text/javascript">
			$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
</script>