<?php
	include 'core/dbe.inc.php';
	include 'core/core.inc.php';
	session_start(); 
    // checkManager(); 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Classsified Auction System</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/font-awesome.min.css" />

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!--//fonts-->	
	<!-- js -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<!-- js -->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-select.js"></script>
	<script>
		$(document).ready(function () {
			var mySelect = $('#first-disabled2');

			$('#special').on('click', function () {
				mySelect.find('option:selected').prop('disabled', true);
				mySelect.selectpicker('refresh');
			});

			$('#special2').on('click', function () {
				mySelect.find('option:disabled').prop('disabled', false);
				mySelect.selectpicker('refresh');
			});

			$('#basic2').selectpicker({
				liveSearch: true,
				maxOptions: 1
			});
		});
	</script>
	<script type="text/javascript" src="js/jquery.leanModal.min.js"></script>
	<link href="css/jquery.uls.css" rel="stylesheet"/>
	<link href="css/jquery.uls.grid.css" rel="stylesheet"/>
	<link href="css/jquery.uls.lcd.css" rel="stylesheet"/>
	<!-- Source -->
	<script src="js/jquery.uls.data.js"></script>
	<script src="js/jquery.uls.data.utils.js"></script>
	<script src="js/jquery.uls.lcd.js"></script>
	<script src="js/jquery.uls.languagefilter.js"></script>
	<script src="js/jquery.uls.regionfilter.js"></script>
	<script src="js/jquery.uls.core.js"></script>
	<script>
		$( document ).ready( function() {
			$( '.uls-trigger' ).uls( {
				onSelect : function( language ) {
					var languageName = $.uls.data.getAutonym( language );
					$( '.uls-trigger' ).text( languageName );
				},
				quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
			} );
		} );
	</script>

	<link href="css/custom-style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- <script src="dist/js/home.js"></script> -->
</head>
<body data-market="bikroy" data-env="production" data-os="" data-os-ver="" class="on-home-landing">	
	
	<!--header section start-->		
	<?php include 'header.php'; ?>
	<!--header section end-->

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="home-top">
					<div class="container">
						<div class="row">
							<div class="col-md-6 hidden-xs">
								<h2 class="t-bold">Welcome to Classified Auction System - the largest marketplace in Bangladesh!</h2>
								<p>Buy and sell everything from used cars to mobile phones and computers, or search for property, jobs and more 
									<strong>in Bangladesh - for free</strong>!
								</p>

								<div class="row">
									<div class="col-md-12 top-category">
										<h3>Browse our top categories:</h3>
									</div>


									<?php 
									$selectCategoryQuery = "
									SELECT * FROM category WHERE pid = 0 LIMIT 4
									";
									$record = fetchData($selectCategoryQuery);
									foreach ($record as $data) 
									{
										?>
										<div class="col-md-3 focus-grid">
											<a href="categories.php#parentVerticalTab<?php  echo $data['id']; ?>">
												<div class="focus-border">
													<div class="focus-layout">
														<div class="focus-image"><i class="fa fa-tags"></i></div>
														<h4 class="clrchg"> <?php  echo $data['category_name']; ?></h4>
													</div>
												</div>
											</a>

										</div>
										<?php    
									} 
									?>	
									<br>
									<a href="#categories" style="margin-left: 460px;">All categories >></a>
								</div>
							</div>
							<div class="col-md-2">
								<div class="home-locations">
									<div class="home-group is-city">
										<p class="h3">Cities</p>
										<ul class="locations-1">
											<li><a href="all-classifieds.php?ctid=3" data-id='1211'>Dhaka</a></li>
											<li><a href="all-classifieds.php?ctid=2" data-id='1295'>Chittagong</a></li>
											<li><a href="all-classifieds.php?ctid=8" data-id='1346'>Sylhet</a></li>
											<li><a href="all-classifieds.php?ctid=4" data-id='1179'>Khulna</a></li>
											<li><a href="all-classifieds.php?ctid=1" data-id='2002000'>Barisal</a></li>
											<li><a href="all-classifieds.php?ctid=6" data-id='2001000'>Rajshahi</a></li>
											<li><a href="all-classifieds.php?ctid=7" data-id='2003000'>Rangpur</a></li>
										</ul>
									</div>
									<div class="home-group is-region">
										<p class="h3">Divisions</p>
										<ul class="locations-1">
											<li><a href="all-classifieds.php?div=DHAKA" data-id='1141'>Dhaka Division</a></li>
											<li><a href="all-classifieds.php?div=CHITTAGONG" data-id='1159'>Chittagong Division</a></li>
											<li><a href="all-classifieds.php?div=SYLHET" data-id='1170'>Sylhet Division</a></li>
											<li><a href="all-classifieds.php?div=KHULNA" data-id='1174'>Khulna Division</a></li>
											<li><a href="all-classifieds.php?div=RAJSHAHI" data-id='1185'>Rajshahi Division</a></li>
											<li><a href="all-classifieds.php?div=RANGPUR" data-id='1194'>Rangpur Division</a></li>
											<li><a href="all-classifieds.php?div=BARISHAL" data-id='1204'>Barisal Division</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col-md-4 hidden-xs">
								<div class="home-map">
									<object type="image/svg+xml" data="dist/svg/map/cas-9a2a4e60.min.svg"></object>
									<div class="map-info"></div>
								</div>
								<script src="dist/js/home.js"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- content-starts-here -->
	<div class="content">

		<!-- NEW ADDED -->
		<div class="categories">
			<div class="container">
				<div class="col-md-6 focus-grid">
					<a href="auction_product.php">
						<div class="focus-border">
							<div class="focus-layout">
								<div class="focus-image"><i class="fa fa-gavel" aria-hidden="true"></i></div>
								<h4 class="clrchg">AUCTION SYSTEM</h4>
							</div>
						</div>
					</a>
				</div>

				<div class="col-md-6 focus-grid">
					<a href="company_profile.php">
						<div class="focus-border">
							<div class="focus-layout">
								<div class="focus-image"><i class="fa fa-building" aria-hidden="true"></i></div>
								<h4 class="clrchg">Company Profile</h4>
							</div>
						</div>
					</a>
				</div>		

				<div class="col-md-6 focus-grid">
					<a href="all-classifieds.php?prod_type=Fixed_Price">
						<div class="focus-border">
							<div class="focus-layout">
								<div class="focus-image"><i class="fa fa-rub fp" aria-hidden="true"></i></div>
								<h4 class="clrchg">Fixed Price</h4>
							</div>
						</div>
					</a>
				</div>

				<div class="col-md-6 focus-grid">
					<a href="all-classifieds.php?prod_type=Negotiable">
						<div class="focus-border">
							<div class="focus-layout">
								<div class="focus-image"><i class="fa fa-rub bp" aria-hidden="true"></i></div>
								<h4 class="clrchg">Negotiable</h4>
							</div>
						</div>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- /NEW ADDED -->

		<div class="categories" id="categories">
			<div class="container">
				<div class="col-md-12 categories">
					<h2>Categories</h2>
				</div>


				<?php 
				$selectCategoryQuery = "
				SELECT * FROM category WHERE pid = 0
				";
				$record = fetchData($selectCategoryQuery);
				foreach ($record as $data) 
				{
					?>
					<div class="col-md-2 focus-grid">
						<a href="categories.php#parentVerticalTab<?php  echo $data['id']; ?>">
							<div class="focus-border">
								<div class="focus-layout">
									<div class="focus-image"><i class="fa fa-tags"></i></div>
									<h4 class="clrchg"><?php  echo $data['category_name']; ?></h4>
								</div>
							</div>
						</a>
					</div>


					<?php    
				} 
				?>	
				<div class="clearfix"></div>
			</div>
		</div>

		<div class="trending-ads">
			<div class="container">
				<!-- slider -->
				<div class="trend-ads">
					<h2>Trending Ads</h2>
					<ul id="flexiselDemo3">
						<li>
							<?php 
							$selectFeaturePostQuery = "
							SELECT post.*, city.`city_name` AS city_name, post_image.image as image
							FROM post
							LEFT JOIN city
							ON post.`city_id` = city.`id`
							LEFT join post_image
							on post_image.post_id = post.id
							ORDER by post.id desc
							";
							$record = fetchData($selectFeaturePostQuery);
							foreach ($record as $data) 
							{
								$id = $data['id'];
								$city_id = $data['city_id'];
								$category_id = $data['category_id'];

								$price = $data['price'];
								$product_type = $data['product_type'];
								$condition = $data['condition1'];
								$post_desc = $data['post_desc'];
								$post_title = $data['post_title'];
								$city_name = $data['city_name'];
								$post_time = $data['post_time'];
								$image = $data['image'];

								?>
								<div class="col-md-3 biseller-column">
									<a href="<?php echo "single.php?id=$id&cid=$category_id" ?>">
										<img style="width: 150px; height: 150px;" src="<?php echo $image; ?>"/>
										<span class="price">&#36; <?php echo $price; ?></span>
									</a> 
									<div class="ad-info">
										<h5><?php echo $post_title; ?></h5>
										<span><?php echo $post_desc; ?></span>
									</div>
								</div>
								<?php
							}
							?>

						</li>
					</ul>
					<script type="text/javascript">
						$(window).load(function() {
							$("#flexiselDemo3").flexisel({
								visibleItems:1,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 5000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems:1
									}, 
									landscape: { 
										changePoint:640,
										visibleItems:1
									},
									tablet: { 
										changePoint:768,
										visibleItems:1
									}
								}
							});

						});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>
				</div>   
			</div>
			<!-- //slider -->				
		</div>

		<div class="mobile-app">
			<div class="container">
				<div class="col-md-5 app-left">
					<a href="#"><img style="border-top-left-radius: 47px; border-top-right-radius: 43px;" src="images/app.png" alt=""></a>
				</div>
				<div class="col-md-7 app-right">
					<h3>CAS App is the <span>Easiest</span> way for Selling and buying second-hand goods</h3>
					<p style="font-size: 20px;">Download The CAS App?</p>
					<div class="app-buttons">
						<div class="app-button">
							<a href="#"><img src="images/1.png" alt=""></a>
						</div>
						<div class="app-button">
							<a href="#"><img src="images/2.png" alt=""></a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer section start-->		
	<?php include 'footer.php'; ?>
	<!--footer section end-->
</body>

</html>