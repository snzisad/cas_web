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


	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!--//fonts-->	
	<!-- js -->
	
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->

	<!-- js -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
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
			
			$(document).on("change", "#category_selection", function (e) {
				$id = $('#category_selection').val();
    			$(".sub_category_item").empty();

				$.ajax({
					url: "api/getcategory.php",
					type: 'GET',
					async: false,
					data: {
						"parent": $id
					},
					success: function(data){
						$subcatagories = JSON.parse(data)[0].data;

						if($subcatagories.length>0){
							$option='<option value="" selected disabled>Please Select Sub Catagory</option>';
							for($i=0;$i<$subcatagories.length;$i++){
								$option+='<option value="'+$subcatagories[$i].id+'">'+$subcatagories[$i].category_name+'</option>';
							}
							$("#sub_category_item").append($option);
							console.log($("#sub_category_item").html());
						}
						else{
							$option='<option value="" selected disabled>No Sub Catagory</option>';
							$("#sub_category_item").append($option);
						}
					},
					error: function(data){
						console.log("Error: "+data);
					}
				});

				// console.log("ID: "+$id);
			}).trigger("change");
		});
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
			<div>
				<p style="color: #01A185; text-align: center; margin-top: 10px; font-size: 37px; font-weight: bold;">
					<?php
					    if(isset($_POST['scity'])){
					        $cID = $_POST['scity'];
					        
					  		$selectCityQuery = "
					                          SELECT * FROM city WHERE id = '$cID'
					                        ";

					        // dump($selectCityQuery);
					    	$data = fetchDataWithID($selectCityQuery);  
					    	
					    	if($data){
    					    	$city_name = $data['city_name'];
    					    	
    						    echo (isset($city_name))?$city_name:'';
					    	    
					    	}
					    }
					    else if(isset($_GET['div']))
					        echo $_GET['div'];
				// 		echo (isset($_GET['div']))?$_GET['div']:'';
					
						else if (isset($_GET['ctid'])) {
							$cID = $_GET['ctid'];
	    					
					  		$selectCityQuery = "
					                          SELECT * FROM city WHERE id = '$cID'
					                        ";

					        // dump($selectCityQuery);
					    	$data = fetchDataWithID($selectCityQuery);   
					    	$city_name = $data['city_name'];
					    	
						    echo (isset($city_name))?$city_name:'';
						}
						
					?>	
				</p>
			</div>
			<div class="select-box">
				<form action="" method="post">
					
<!-- 				
				<div class="select-city-for-local-ads ads-list">
					<label>Select your city to see local ads</label>
					<select name="scity">
						<optgroup label="Popular Cities">
							<option value="" selected style="display:none;color:#eee;">Entire Bangladesh</option>
							<?php 
			                      $selectCategoryQuery = "
			                                        SELECT * FROM city ORDER BY city_name ASC
			                                       ";
			                      $record = fetchData($selectCategoryQuery);
			                      foreach ($record as $data) 
			                      {
			                    ?>
			                    	<option value="<?php  echo $data['id']; ?>"><?php  echo $data['city_name']; ?></option>
			           
			                    <?php    
			                      } 
			                    ?>
							
						</optgroup>
					</select>
				</div> -->
				
				<div class="browse-category ads-list">
					<label>Select your division to see local ads</label>
					<select name="scity" class="selectpicker show-tick" data-live-search="true">
							<option value="" selected style="display:none;color:#eee;">Select Division</option>

						<?php 
		                  $selectCategoryQuery = "
		                                    SELECT * FROM city ORDER BY city_name ASC
		                                   ";
		                  $record = fetchData($selectCategoryQuery);
		                  foreach ($record as $data) 
		                  {
		                ?>
		                	<option value="<?php  echo $data['id']; ?>"><?php  echo $data['city_name']; ?></option>
		                <?php    
		                  } 
		                ?>	
					</select>
				</div>

				<div class="browse-category ads-list">
					<label>Select your location to see local ads</label>
					<select name="slocation" class="selectpicker show-tick" data-live-search="true">
							<option value="" selected style="display:none;color:#eee;">Select Location</option>

						<?php 
		                  $selectCategoryQuery = "
		                                    SELECT distinct location FROM post
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
					<label>Search for a specific Post</label>
					<select name="spost" class="selectpicker show-tick" data-live-search="true">
						<option value="" selected style="display:none;color:#eee;">Search Post</option>
						<?php 
						$selectCategoryQuery = "
												SELECT * FROM post
											";
						$record = fetchData($selectCategoryQuery);
						foreach ($record as $data) {
							?>
								<option value="<?php echo $data['id']; ?>"><?php echo $data['post_title']; ?></option>
							<?php 
						}
						?>	
					</select>

				</div>
				

				<div class="browse-category ads-list">
					<label>Browse Categories</label>
					<select name="scategory" id="category_selection" class="category_selection selectpicker show-tick" data-live-search="true">
						<option value="0" selected style="display:none;color:#eee;">Select Category</option>
						<?php 
		                  $selectCategoryQuery = "
		                                    SELECT * FROM category WHERE pid = 0 
		                                   ";
		                  $record = fetchData($selectCategoryQuery);
		                  foreach ($record as $data) 
		                  {
		                ?>
		                	<option value="<?php echo $data['id']; ?>"><?php  echo $data['category_name']; ?></option>
		                <?php    
		                  } 
		                ?>	
					</select>
				</div>

				<div class="browse-category ads-list">
					<label>Browse Sub Categories</label>
					<select name="subcategory" id="sub_category_item" class="sub_category_item show-tick"  data-live-search="true"  data-live-search-style="startsWith" style="background:#fff;color:#000;">
						<option class="sub_category_item2" value="" selected disabled>Select Sub Category</option>
					</select>
				</div>

				<div class="browse-category ads-list">
					<label>Price Range</label>

						<input type="text" name="from_price" placeholder="From" style="padding: 5px; background-color: #fff; width: 80px;"/> -
						<input type="text" name="to_price" placeholder="To" style="padding: 5px; background: #fff; width: 80px;"/>

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
				<li><a href="all-classifieds.php">All Ads</a></li>
				<!-- <li class="active"><a href="<?php echo "all-classifieds.php?cid=$category_id"; ?>"><?php echo $category_name; ?></a></li> -->
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
		                  					SELECT post.*, city.`city_name` AS city_name, post_image.image as image
																	FROM post
																	LEFT JOIN city
																	ON post.`city_id` = city.`id`
																	LEFT join post_image
																	on post_image.post_id = post.id
																	ORDER by post.id desc limit 4
		                                   ";
		                  $record = fetchData($selectFeaturePostQuery);
		                  // dump($record, true);
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

		                	<div class="featured-ad">
								<a href="<?php echo "single.php?id=$id&cid=$category_id" ?>">
									<div class="featured-ad-left">
										<img src="<?php echo $image; ?>" title="ad image" alt="" />
									</div>
									<div class="featured-ad-right">
										<h4><?php echo $post_title; ?></h4>
										<p>Tk. <?php echo $price; ?></p>
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
										<span class="text">All Ads</span>
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
												$cid = isset($_GET['cid'])?$_GET['cid']:0; 
												$ctid = isset($_GET['ctid'])?$_GET['ctid']:0; 
												$uid = isset($_GET['uid'])?$_GET['uid']:0; 
												$div = isset($_GET['div'])?$_GET['div']:'';
												$prod_type = isset($_GET['prod_type'])?$_GET['prod_type']:'';

												$allPostQuery = "
													SELECT post.*, city.`city_name` AS city_name, post_image.image as image, category.category_name as category_name, users.name as uname
													FROM post
													LEFT JOIN city
													ON post.`city_id` = city.`id`
													LEFT JOIN category
													ON post.`category_id` = category.`id`
													LEFT JOIN users
													ON post.userid = users.id
													LEFT join post_image
													ON post_image.post_id = post.id
												";

												if ($cid) {
													$allPostQuery .= " WHERE post.`category_id` = '$cid'";
												}
												else if ($div) {
													$allPostQuery .= " WHERE city.`division` = '$div'";
												}
												else if($ctid){
													$allPostQuery .= " WHERE city.`id` = '$ctid'";
												} 
												else if($uid){
													$allPostQuery .= " WHERE users.id = '$uid'";
												} 
												else if($prod_type) {

													$allPostQuery .= " WHERE post.`product_type` = '$prod_type'";
												}
												else {
													$allPostQuery .= "";
												}
								                  
							                  	

							                  	//SearchPanel
							                  	if (isset($_POST['search-panel'])) {
							                  		$scity = $_POST['scity'];
											   		$slocation = $_POST['slocation'];
											   		$scategory = $_POST['scategory'];
											   		$spost = $_POST['spost'];
											   		$from_price = $_POST['from_price'];
											   		$to_price = $_POST['to_price'];

											   		$allPostQuery = "
													SELECT post.*, city.`city_name` AS city_name, post_image.image as image, category.category_name as category_name, users.name as uname
													FROM post
													LEFT JOIN city
													ON post.`city_id` = city.`id`
													LEFT JOIN category
													ON post.`category_id` = category.`id`
													LEFT JOIN users
													ON post.userid = users.id
													LEFT join post_image
													ON post_image.post_id = post.id WHERE 1
												";

													
													if($scity){
														$allPostQuery .= " AND city.`id` = '$scity'";
													}
													if($slocation){
														$allPostQuery .= " AND post.`location` = '$slocation'";
													} 
													if ($scategory) {
														if(isset($_POST['subcategory'])){
															$scategory = $_POST['subcategory'];
														}
														$allPostQuery .= " AND post.`category_id` = '$scategory'";
													}
													if($spost) {

														$allPostQuery .= " AND post.`id` = '$spost'";
													}
													
													if($from_price) {
														if ($to_price) {
															$allPostQuery .= " AND post.`price` BETWEEN '$from_price' AND '$to_price'";
														}
														else{
															$allPostQuery .= " AND post.`price` >= '$from_price'";
														}

													}
													
													else if($to_price) {

														$allPostQuery .= " AND post.`price` <= '$to_price'";
													}
													else {
														$allPostQuery .= "";
													}

													// echo $allPostQuery;

							                  		// dump($allPostQuery, TRUE);
							                  	}
							                  	//EndSearchPanel 

							                  	$record = fetchData($allPostQuery);
							                  	foreach ($record as $data) 
							                  	{
								                  	$price = $data['price'];
												    $product_type = $data['product_type'];
												    $condition = $data['condition1'];
												    $post_desc = $data['post_desc'];
												    $post_title = $data['post_title'];


												    $id = $data['id'];
												    $puid = $data['userid'];
												    $uname = $data['uname'];
												    $city_id = $data['city_id'];
												    $category_id = $data['category_id'];
												    $category_name = $data['category_name'];

												    $location = ( isset($data['location']) ) ? $data['location'] : 'Lalkhan bazar' ;


												    $city_name = $data['city_name'];
												    $post_time = $data['post_time'];
												    $image = $data['image'];

												    $name = $data['name'];
												    $email = $data['email'];
												    $mobile = $data['mobile'];
								                ?>
													<a href="<?php echo "single.php?id=$id&cid=$category_id" ?>">
													<li>
														<img src="<?php echo $image; ?>" title="" alt="" />
														<section class="list-left">
															<h5 class="title"><?php echo $post_title; ?></h5>
															<span class="adprice">Tk.<?php echo $price; ?></span>
															<!-- <p class="catpath">Mobile Phones » Brand</p> -->
															<p class="catpath"><?php echo $post_desc; ?></p>
														</section>
														<section class="list-right">
															<span class="date"><?php echo $post_time; ?></span>
															<span class="cityname"><?php echo $city_name; ?></span>
															<span class="cityname"><?php echo $product_type; ?></span>
														</section>
														<div class="clearfix"></div>
													</li> 
												</a>
												<?php    
							                  	} 
								                ?>	
											</ul>
										</div>
									</div>
								</div>
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