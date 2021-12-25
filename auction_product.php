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
	<link rel="stylesheet" type="text/css" href="css/jquery-ui1.css">

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
	<script src="js/jquery.countdown.min.js"></script>
	

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
	<script src="js/tabs.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function () {    
			var elem=$('#container ul');      
			$('#viewcontrols a').on('click',function(e) {
				if ($(this).hasClass('gridview')) {
					elem.fadeOut(1000, function () {
						$('#container ul').removeClass('list').addClass('grid');
						$('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
						$('#viewcontrols .gridview').addClass('active');
						$('#viewcontrols .listview').removeClass('active');
						elem.fadeIn(1000);
					});						
				}
				else if($(this).hasClass('listview')) {
					elem.fadeOut(1000, function () {
						$('#container ul').removeClass('grid').addClass('list');
						$('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
						$('#viewcontrols .gridview').removeClass('active');
						$('#viewcontrols .listview').addClass('active');
						elem.fadeIn(1000);
					});									
				}
			});

			function getSubCategory(val) {
				$.ajax({
					type: "POST",
					url: "get_sub_category.php",
					data:'category='+val,
					success: function(data){
						$("#sub_category_item").html(data);
					}
				});
			}
		});

		function getSubCategory(val) {
			$.ajax({
				type: "POST",
				url: "get_sub_category.php",
				data:'category='+val,
				success: function(data){
					$("#sub_category_item").html(data);
				}
			});
		}
	</script>
</head>
<body>
	<!--header section start-->		
	<?php include 'header.php'; ?>
	<?php include 'banner.php'; ?>
    <!--header section end-->
	<!-- Products -->
	<div class="total-ads main-grid-border">
		<div class="container">
			<!-- <div class="select-box">
				<div class="select-city-for-local-ads ads-list">
					<label>Select your city to see local ads</label>
					<select>
						<optgroup label="Popular Cities">
							<option selected style="display:none;color:#eee;">Entire Bangladesh</option>
							<?php 
			                      // $selectCategoryQuery = "
			                      //                   SELECT * FROM city ORDER BY city_name ASC
			                      //                  ";
			                      // $record = fetchData($selectCategoryQuery);
			                      // foreach ($record as $data) 
			                      // {
			                    ?>
			                    	<option value="<?php//  echo $data['id']; ?>"><?php // echo $data['city_name']; ?></option>
			           
			                    <?php    
			                     // } 
			                    ?>
						</optgroup>
					</select>
				</div>
				<div class="browse-category ads-list">
					<label>Select your location to see local ads</label>
					<select class="selectpicker show-tick" data-live-search="true">
						
						<?php 
		                  // $selectCategoryQuery = "
		                  //                   SELECT * FROM location
		                  //                  ";
		                  // $record = fetchData($selectCategoryQuery);
		                  // foreach ($record as $data) 
		                  // {
		                ?>
		                	<option value="<?php // echo $data['id']; ?>"><?php // echo $data['location']; ?></option>
		                <?php    
		                  //} 
		                ?>	
					</select>
				</div>
				<div class="browse-category ads-list">
					<label>Browse Categories</label>
					<select class="selectpicker show-tick" data-live-search="true">
						
						<?php 
		                  // $selectCategoryQuery = "
		                  //                   SELECT * FROM category WHERE pid = 0
		                  //                  ";
		                  // $record = fetchData($selectCategoryQuery);
		                  // foreach ($record as $data) 
		                  // {
		                ?>
		                	<option value="<?php  //echo $data['id']; ?>"><?php  //echo $data['category_name']; ?></option>
		                <?php    
		                 // } 
		                ?>	
					</select>
				</div>
				<div class="search-product ads-list">
					<label>Search for a specific product</label>
					<div class="search">
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" class="form-control input-lg" placeholder="Buscar" />
								<span class="input-group-btn">
									<button class="btn btn-info btn-lg" type="button">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div> -->
			
			<div>
				<p style="color: #01A185; text-align: center; margin-top: 10px; font-size: 37px; font-weight: bold;">
					<?php
					    if(isset($_POST['scity'])){
					        $city_id = $_POST['scity'];
					       $selectCategoryQuery = "SELECT * FROM city WHERE id = $city_id";
		                    $record = fetchData($selectCategoryQuery);
		                    foreach($record as $data){
		                        echo $data['city_name'];
		                    }
					    }
					    else 
					        echo "Auctions";
						
					?>	
				</p>
			</div>
			
			<div class="select-box">
				<form action="" method="post">
					

				<div class="browse-category ads-list">
					<label>Select your city to see local aucton</label>
					<select name="scity" class="selectpicker show-tick" data-live-search="true">
							<option value="" selected style="display:none;color:#eee;">Select City</option>

						<?php 
							$selectCategoryQuery = "
													SELECT * FROM city ORDER BY city_name ASC
													";
							$record = fetchData($selectCategoryQuery);
							foreach ($record as $data) {
						?>
		                	<option value="<?php echo $data['id']; ?>"><?php echo $data['city_name']; ?></option>
		                <?php 
																}
																?>	
					</select>
				</div>

				<div class="browse-category ads-list">
					<label>Select your location to see local auction</label>
					<select name="slocation" class="selectpicker show-tick" data-live-search="true">
							<option value="" selected style="display:none;color:#eee;">Select Location</option>

						<?php 
		                  $selectCategoryQuery = "
		                                    SELECT distinct location FROM auction
		                                   ";
		                  $record = fetchData($selectCategoryQuery);
		                  foreach ($record as $data) 
		                  {
		                ?>
		                	<option value="<?php  echo $data['location']; ?>"><?php  echo $data['location']; ?></option>
		                <?php    
		                  } 
		                ?>	
					</select>
				</div>

				<div class="browse-category ads-list">
					<label>Search for a specific auction</label>
					<select name="sauction" class="selectpicker show-tick" data-live-search="true">
						<option value="" selected style="display:none;color:#eee;">Search auction</option>
						<?php 
					$selectCategoryQuery = "
		                                    SELECT * FROM auction
		                                   ";
					$record = fetchData($selectCategoryQuery);
					foreach ($record as $data) {
						?>
		                	<option value="<?php echo $data['id']; ?>"><?php echo $data['auction_title']; ?></option>
		                <?php 
																}
																?>	
					</select>
				</div>

				<div class="browse-category ads-list">
					<label>Browse Categories</label>
					<select name="scategory" class="selectpicker show-tick" data-live-search="true" onChange="getSubCategory(this.value);">
						<option value="" selected style="display:none;color:#eee;">Select Category</option>
						<?php 
		                  $selectCategoryQuery = "
		                                    SELECT * FROM category WHERE pid = 0 
		                                   ";
		                  $record = fetchData($selectCategoryQuery);
		                  foreach ($record as $data) 
		                  {
		                ?>
		                	<option value="<?php  echo $data['id']; ?>"><?php  echo $data['category_name']; ?></option>
		                <?php    
		                  } 
		                ?>	
					</select>
				</div>

				
				<div class="browse-category ads-list">
					<label>Browse Sub Categories</label>
					<select name="subcategory" id="sub_category_item" class="sub_category_item show-tick"  data-live-search="true"  data-live-search-style="startsWith" style="background:#fff;color:#000;">
						<option class="" value="" selected disabled>Select Sub Category</option>
					</select>
				</div>

				<div class="browse-category ads-list">
					<label>Price Range</label>

						<input type="text" name="from_price" placeholder="From" style="padding: 5px; background-color: #fff; width: 80px;"/> -
						<input type="text" name="to_price" placeholder="To" style="padding: 5px; background: #fff; width: 80px;"/>

					<!--<input type="submit" name="search-panel" class="btn btn-md" value="Search">-->
				</div>
				
				<input type="submit" name="search-panel" class="btn btn-md" value="Filter Now" style="width: 100%;margin-top: 10px;">
				
				<!-- <div class="search-product ads-list">
					<label>Search for a specific Post</label>
					<div class="search">
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" class="form-control input-lg" placeholder="Buscar" />
								<span class="input-group-btn">
									<button class="btn btn-info btn-lg" type="button">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</span>
							</div>
						</div>
					</div>
				</div> -->

				<div class="clearfix"></div>

				</form>
			</div>
			
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="index.php">Home</a></li>
				<li><a class="active" href="auction_product.php">All Auctions</a></li>
			</ol>

			<div class="ads-grid">
				<div class="side-bar col-md-3">
					<!-- <div class="search-hotel">
						<h3 class="sear-head">Name contains</h3>
						<form>
							<input type="text" value="Product name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Product name...';}" required="">
							<input type="submit" value=" ">
						</form>
					</div> -->
				
					<div class="featured-ads">
						<h2 class="sear-head fer">Featured Ads</h2>

						<?php 
		                	$selectFeaturePostQuery = "
											SELECT auction.*, category.`category_name` AS category_name, auction_image.image AS image
											FROM auction
											LEFT JOIN category
											ON auction.`category_id` = category.`id`
											LEFT JOIN auction_image
											ON auction_image.auction_id = auction.id
		                                   ";
		                  	$record = fetchData($selectFeaturePostQuery);
		                  	foreach ($record as $data) 
		                  	{

							    $id = $data['id'];

							    $category_id = $data['category_id'];
							    $keyword = $data['keyword'];

							    $auction_desc = $data['auction_desc'];
							    $auction_title = $data['auction_title'];

							    $starting_date = $data['starting_date'];
							    $ending_date = $data['ending_date'];
							    $starting_price = $data['starting_price'];
							    $reserve_price = $data['reserve_price'];

							    $condition = $data['condition'];
							    $product_type = $data['product_type'];

							    $image = $data['image'];
		                ?>

		                	<div class="featured-ad">
								<a href="<?php echo "auc_prod.php?id=$id&cid=$category_id" ?>>">
									<div class="featured-ad-left">
										<img src="<?php echo $image; ?>" title="ad image" alt="" />
									</div>
									<div class="featured-ad-right">
										<h4><?php echo $auction_title; ?></h4>
										<p>Tk. <?php echo $starting_price; ?></p>
									</div>
									<div class="clearfix"></div>
								</a>
							</div>
		                <?php
		                  }
						?>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="ads-display col-md-9">
					<div class="wrapper">					
						<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
							<ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
								<li role="presentation" class="active">
									<a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
										<span class="text">All Auctions</span>
									</a>
								</li>
							</ul>
							<div id="myTabContent" class="tab-content">
								<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
									<div>
										<div id="container">
											<div class="view-controls-list" id="viewcontrols">
												<label>view :</label>
												<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
												<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
											</div>
											
											<div class="clearfix"></div>
											<ul class="list">
												<?php 

													// $com_id = $_GET['comid'];
													$com_id = (isset($_GET['comid'])) ? $_GET['comid'] : '';
													if ($com_id == '') {
														$selectAuctionQuery = "
								                                    SELECT auction.*,city.`city_name` AS city_name, category.`category_name` AS category_name, auction_image.image AS image, users.name as uname
																	FROM auction
																	LEFT JOIN city
																	ON auction.`city_id` = city.`id`
																	LEFT JOIN category
																	ON auction.`category_id` = category.`id`
																	LEFT JOIN auction_image
																	ON auction_image.auction_id = auction.id
																	LEFT JOIN users
																	ON auction.`com_id` = users.id
								                                   ";
													} else {
														$selectAuctionQuery = "
								                                    SELECT auction.*,city.`city_name` AS city_name, category.`category_name` AS category_name, auction_image.image AS image, users.name as uname
																	FROM auction
																	LEFT JOIN city
																	ON auction.`city_id` = city.`id`
																	LEFT JOIN category
																	ON auction.`category_id` = category.`id`
																	LEFT JOIN auction_image
																	ON auction_image.auction_id = auction.id
																	LEFT JOIN users
																	ON auction.`com_id` = users.id
																	WHERE com_id = '$com_id'
								                                   ";
													}
													//SearchPanel
							                  	if (isset($_POST['search-panel'])) {
							                  		$scity = $_POST['scity'];
											   		$slocation = $_POST['slocation'];
											   		$scategory = $_POST['scategory'];
											   		$sauction = $_POST['sauction'];
											   		$subcategory=null;
											   		if(isset($_POST['subcategory'])){
													    $subcategory = $_POST['subcategory'];
											   		}
													$from_price = $_POST['from_price'];
													$to_price = $_POST['to_price'];

											   		$selectAuctionQuery = "
													SELECT auction.*,city.`city_name` AS city_name, category.`category_name` AS category_name, auction_image.image AS image, users.name as uname
																	FROM auction
																	LEFT JOIN city
																	ON auction.`city_id` = city.`id`
																	LEFT JOIN category
																	ON auction.`category_id` = category.`id`
																	LEFT JOIN auction_image
																	ON auction_image.auction_id = auction.id
																	LEFT JOIN users
																	ON auction.`com_id` = users.id WHERE 1
												";

													
													if($scity){
														$selectAuctionQuery .= " AND city.`id` = '$scity'";
													}
													if($slocation){
														$selectAuctionQuery .= " AND auction.`location` = '$slocation'";
													} 
													if ($scategory) {
														if ($subcategory) {
															$scategory = $subcategory;
														}
														$selectAuctionQuery .= " AND auction.`category_id` = '$scategory'";
													}
													if($sauction) {

														$selectAuctionQuery .= " AND auction.`id` = '$sauction'";
													}
													if ($from_price) {

														if ($to_price) {
															$selectAuctionQuery .= " AND auction.`starting_price` BETWEEN '$from_price' AND '$to_price'";
														} else {
															$selectAuctionQuery .= " AND auction.`starting_price` >= '$from_price'";
														}

													} else if ($to_price) {

														$selectAuctionQuery .= " AND auction.`starting_price` <= '$to_price'";
													}
													else {
														$selectAuctionQuery .= "";
													}

							                  		// dump($allPostQuery, TRUE);
							                  	}
							                  	//EndSearchPanel 
								                  	// dump($selectAuctionQuery);
								                  $record = fetchData($selectAuctionQuery);
								                  
								                  if($record != null){
    								                  foreach ($record as $data) 
    								                  {
    
    								                  	$id = $data['id'];
    
    												    $city_id = $data['city_id'];
    												    $city_name = $data['city_name'];
    
    												    $category_id = $data['category_id'];
    												    $category_name = $data['category_name'];
    												    
    												    $keyword = $data['keyword'];
    												    $auction_desc = $data['auction_desc'];
    												    $auction_title = $data['auction_title'];
    
    												    $starting_date = $data['starting_date'];
    												    $ending_date = $data['ending_date'];
    												    $starting_price = $data['starting_price'];
    												    $reserve_price = $data['reserve_price'];
    
    												    $condition = $data['condition'];
    												    $product_type = $data['product_type'];
    
    												    $image = $data['image'];
    												    $com_id = $data['com_id'];
    												    $uname = $data['uname'];
    								                ?>
    													<a href="<?php echo "auc_prod.php?id=$id&cid=$category_id" ?>">
    
    
    													<li>
    														<img src="<?php echo $image; ?>" title="" alt="" />
    														<section class="list-left">
    															<h5 class="title"><?php echo $auction_title; ?></h5>
    															<span class="adprice">Tk.<?php echo $starting_price; ?></span>
    															<p class="catpath"><?php echo $auction_desc; ?></p>
    															<p class="catpath"  style="font-size: 20px; color: rgba(1, 161, 133, 0.57);">End Date: <span class="cnt" id="cnt"><?php $ending_date =date_create($ending_date); echo date_format($ending_date, 'Y/m/d'); ?> </span></p>
    
    															<p id="countdown" class="countdown adprice"></p>

    														</section>
    														<section class="list-right">
    															<span class="date"><?php echo $city_name; ?></span>
    															<span class="cityname"><?php echo $product_type; ?></span>
    														</section>
    														<div class="clearfix"></div>
    													</li> 
    												</a>
    												<?php    
    								                  }
								                  }
								                ?>	
											</ul>

											<script type="text/javascript">
											  // var cnt = '';
												$('.cnt').each(function() {
											    	var cnt = $(this).text();
														// $(this).html(cnt);
														// console.log(cnt);

											    	var countdown = $(this).parent().parent().children('.countdown');
														// console.log(a);

											    	$(this).parent().parent().children('.countdown').countdown(cnt, function(event) {
											    		$(this).html(event.strftime('%w weeks %d days <br /> %H:%M:%S'));
															// $(this).html(cnt);	
											  		});
											    	
											    	// $('.countdown').countdown(cnt, function(event) {
											    	// 	// $(this).html(event.strftime('%w weeks %d days <br /> %H:%M:%S'));
														// 	$(this).html(cnt);
											  		// });
											  		//$('#cnt').append().text(',');
											   	});

											   	// for (var i = 0; i < cnt.length; i++) {
											   	// 	alert(cnt[i]);
											   	// }
											</script>
										</div>
									</div>
								</div>

								<!-- <ul class="pagination pagination-sm">
									<li><a href="#">Prev</a></li>
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">5</a></li>
									<li><a href="#">6</a></li>
									<li><a href="#">7</a></li>
									<li><a href="#">8</a></li>
									<li><a href="#">Next</a></li>
								</ul> -->
							</div>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>
	<!-- // Products -->
	<!--footer section start-->		
	<?php include 'footer.php'; ?>
    <!--footer section end-->
</body>

</html>