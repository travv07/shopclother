<!DOCTYPE html>
<html lang="en">
<head>
	<title>Product</title>
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
	<link rel="stylesheet" type="text/css" href="vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'header.php'  ?>

	<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/bia5.jpg);">
		<h2 class="l-text2 t-center">
			Women - Men
		</h2>
		<p class="m-text13 t-center">
			New Fashion Women & Men  Collection 2018
		</p>
	</section>


	<!-- Content page -->
	<section class="bgwhite p-t-55 p-b-65">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
					<div class="leftbar p-r-20 p-r-0-sm">
						<!--  -->
						<h4 class="m-text14 p-b-7">
							Categories
						</h4>

						<ul class="p-b-54">
							<li class="p-t-4">All</li>
							<li class="p-t-4 category" ten="women">Women</li>
							<li class="p-t-4 category" ten="men">Men</li>
						</ul>

						<!--  -->
						<h4 class="m-text14 p-b-32">
							Filters
						</h4>

						<div class="filter-price p-t-22 p-b-50 bo3">
							<div class="m-text15 p-b-17">
								Price
							</div>

							<div class="wra-filter-bar">
								<div id="filter-bar"></div>
							</div>

							<div class="flex-sb-m flex-w p-t-16">
								<div class="w-size11">
									<!-- Button -->
									<button class="flex-c-m size4 bg7 bo-rad-15 hov1 s-text14 trans-0-4 filter">
										Filter
									</button>
								</div>

								<div class="s-text3 p-t-10 p-b-10">
									Range: $<span id="value-lower" class="pricemin">610</span> - $<span id="value-upper" class="pricemax">980</span>
								</div>
							</div>
						</div>

						<div class="search-product pos-relative bo4 of-hidden">
							<input class="s-text7 size6 p-l-23 p-r-50 valuesearch" type="text" name="search-product" placeholder="Search Products...">

							<button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
								<i class="fs-12 fa fa-search" id="search" aria-hidden="true"></i>
							</button>
						</div>
					</div>
				</div>

				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
					<!--  -->
					<div class="flex-sb-m flex-w p-b-35">
						<div class="flex-w">
							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
								<select class="selection-2" name="sorting" id="sort">
									<option value="khong">Default Sorting</option>
									<option value="thap">Price: low to high</option>
									<option value="cao">Price: high to low</option>
								</select>
							</div>
						</div>

						<span class="s-text8 p-t-5 p-b-5">
							Showing 1–6 of all results
						</span>
					</div>
					<!-- Product -->
					<div class="row showproduct">
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
											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4 addcart" ten="<?php echo $row['id_product'] ?>">
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
					</div>
					<!-- Pagination -->
					<div class="pagination flex-m flex-w p-t-26">
							<?php $current_page= $_GET['page'];
							for ($i=1;$i<=$total_page;$i++){  ?>
							<li class="item-pagination flex-c-m trans-0-4 active-pagination" ten="<?php echo $i ?>"><?php echo $i ?></li>
							<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
	<?php include 'footer.php'  ?>



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
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});

		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect2')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.addcart').each(function(){
			var ten = $(this).attr('ten');	
			$(this).on('click', function(){
				window.location.href="product-detail.php?id="+ten;
			});
		});
		$(document).ready(function(){
			$('.category').click(function(event){
				var category = $(this).attr('ten');
				$.get("ajaxproduct.php",{category: category},function(data){
					$('.showproduct').html(data);
				});
			})
			$('.filter').click(function(event){
				var pricemin = $('.pricemin').text();
				var pricemax = $('.pricemax').text();
				$.get("ajaxfilter.php",{pricemin: pricemin , pricemax: pricemax},function(data){
					$('.showproduct').html(data);
				})
			})
			var searchAjax = function(event){
				var value = $('.valuesearch').val();
				$.get("ajaxsearch.php",{value: value},function(data){
					$('.showproduct').html(data);
				})
			}
			$('#search').click(searchAjax);

			$('.valuesearch').on('keyup', searchAjax);
			
			$("#sort").change(function(){
				 var price = $('#sort option:selected').val();
				 $.get("ajaxsort.php",{price: price},function(data){
				 	$('.showproduct').html(data);
				 })
			});
			$(".active-pagination").click(function(event){
				var page = $(this).attr('ten');
				$.get("pagination.php",{page: page},function(data){
					$('.showproduct').html(data);
				})
			});
		});
	</script>

<!--===============================================================================================-->
	<script type="text/javascript" src="vendor/noui/nouislider.min.js"></script>
	<script type="text/javascript">
		/*[ No ui ]
	    ===========================================================*/
	    var filterBar = document.getElementById('filter-bar');

	    noUiSlider.create(filterBar, {
	        start: [ 50, 200 ],
	        connect: true,
	        range: {
	            'min': 50,
	            'max': 200
	        }
	    });

	    var skipValues = [
	    document.getElementById('value-lower'),
	    document.getElementById('value-upper')
	    ];

	    filterBar.noUiSlider.on('update', function( values, handle ) {
	        skipValues[handle].innerHTML = Math.round(values[handle]) ;
	    });
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
