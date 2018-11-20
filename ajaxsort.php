<?php 
	include('connectDB.php');
	if(isset($_GET['price'])){
		$value = $_GET['price'];
		if($value=='cao'){
			$sql = "SELECT * from Products as p join Productimage as pi on p.id_product_img=pi.id_product_img JOIN Categorys as c on c.id_category=p.id_category ORDER BY p.price DESC";
		}else if($value='thap'){
			$sql = "SELECT * from Products as p join Productimage as pi on p.id_product_img=pi.id_product_img JOIN Categorys as c on c.id_category=p.id_category ORDER BY p.price ASC";
		}
		else 
			$sql = "SELECT * from Products as p join Productimage as pi on p.id_product_img=pi.id_product_img JOIN Categorys as c on c.id_category=p.id_category";

		$rs = mysqli_query($conn,$sql);
		while ($row = mysqli_fetch_array($rs)) {
 ?>
	<div class="col-sm-12 col-md-6 col-lg-4 p-b-50 ">
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
<?php 	
	}
} ?>
<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
		$('.addcart').click(function(event){
			var id = $(this).attr('ten');
			$.get("ajaxaddcart.php",{id: id} ,function(data){
				$('.header-cart-wrapitem').html(data);
			})
		})
</script>