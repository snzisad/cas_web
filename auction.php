<?php
    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
	include 'core/notification_manager.php';
    require_once('functions.php');
    session_start(); 
	// checkManager(); 
	
?>

<?php

  	// define variables and set to empty values
  	$auction_titleErr = $auction_descErr = $conditionErr = $product_typeErr = $starting_priceErr = $reserve_priceErr = $starting_dateErr = $ending_dateErr = $locationErr =  $keywordErr = "";
	
	$auction_title = $auction_desc = $condition = $product_type = $price = $starting_price = $starting_price = $starting_date = $ending_date = $keyword = "";

    if (isset($_POST['addauction'])) {

    	$updir = 'public/uploads/auction/';
	    $filename = $_FILES['image']['name'];
	    $filesize = $_FILES['image']['size'];
	    $filetmp = $_FILES['image']['tmp_name'];
	    $filetype = $_FILES['image']['type'];
	    $fileext=strtolower(end(explode('.',$_FILES['image']['name'])));
	      
	    $expensions= array("jpeg","jpg","png");
	      
	    if(in_array($fileext,$expensions) === false){
	        $productImageErr="Extension not allowed, Please Choose a JPEG or PNG file.";
	    }
	      
	    if($filesize > 2097152) {
	         $productImageErr='File size must be excately 2 MB';
	    }
	    if(empty($productNameErr)==true) {
          $filepath = $updir.$filename;
         move_uploaded_file($filetmp,$filepath);
	    }else{
	         $filename = escape($filename);
	    }

	    // dump($_FILES, TRUE);

		$city = escape($_POST['city']);
   		$category = escape($_POST['category']);
   		$auction_title = escape($_POST['auction_title']);
   		$auction_desc = escape($_POST['auction_desc']);
   		$condition = escape($_POST['condition']);
   		$product_type = escape($_POST['product_type']);

   		$keyword = $_POST['keyword'];
		$location = $_POST['location'];
   		$starting_date = $_POST['starting_date'];
   		$ending_date = $_POST['ending_date'];
   		$starting_price = $_POST['starting_price'];
		$reserve_price = $_POST['reserve_price'];
		$userid = $_SESSION['uid'];


		if (isset($_POST['sub_category'])) {
			$category = escape($_POST['sub_category']);
		}
			

   		if (empty($_POST["auction_title"])) {
	      $auction_titleErr = "auction Title is required";
	    }
	    if (empty($_POST["auction_desc"])) {
	      $auction_descErr = "auction Description is required";
	    } 
	    if (empty($_POST["condition"])) {
	      $conditionErr = "Item Condition is required";
	    } 
	    if (empty($_POST["location"])) {
			$locationErr = "Location is required";
	    } 
	    if (empty($_POST["price"])) {
	      $priceErr = "Item Price is required";
	    } 
	    if (empty($_POST["product_type"])) {
	      $product_typeErr = "Item Type is required";
	    } 
	    

	    // dump($_POST, TRUE);

	    if( !empty($_POST["auction_title"]) && !empty($_POST["auction_desc"]) && !empty($_POST["condition"]) && !empty($_POST["product_type"]) ) 
	    {


	      	$addauctionQuery = "
	            INSERT INTO `auction`(
	            	`city_id`, 
	            	`category_id`, 
	            	`keyword`, 
	            	`location`, 
	            	`auction_title`,
	            	`auction_desc`,
	            	`starting_date`,
	            	`ending_date`,
	            	`starting_price`,
	            	`reserve_price`,
	            	`condition`, 
	            	`product_type`,
	            	`com_id`
	            	) 
	            VALUES (
	            	'$city',
	            	'$category',
	            	'$keyword',
	            	'$location',
	            	'$auction_title',
	            	'$auction_desc',
	            	'$starting_date',
	            	'$ending_date',
	            	'$starting_price',
	            	'$reserve_price',
	            	'$condition',
	            	'$product_type',
	            	'$userid'
	            	)
	          ";
	        
			// dump($addauctionQuery,TRUE);
			
			echo $addauctionQuery;
			// return;

	      	$execQuery = query($addauctionQuery);
	      	$auction_id = insertID();

	     	if(!empty($auction_id) && $auction_id != 0){
		      	$addauctionImageQuery = "INSERT INTO `auction_image`(
		      							`auction_id`, 
		      							`image`) 
	      							VALUES (
	      								'$auction_id',
	      								'$filepath')";
				  $execImageQuery = query($addauctionImageQuery);
				  
				//send notification to android app
				$body = $starting_price . "Tk - " . $reserve_price . "Tk, " . $location;
				send_admin_notification($auction_title, $body);

				$redirectpPage = 'auc_prod.php?id=' . $auction_id;
				header('Refresh: 1; URL=' . $redirectpPage);

			}
			else{
				echo error();
				return ;
			}
		    
		    // Notification sent
		    if($execImageQuery) {
		      
		      // Fetch Notification data
		     // $message =  $auction_title.'|'. $auction_desc.'|'. $category.'|'. $starting_date.'|'. $ending_date.'|'. $starting_price.'|'. $condition.'|'. $product_type;
		      
		      $message = $auction_title.'|'. $starting_price.'|  |  |  |  |  | For more details check website';
		      
		      
		        $tokenQuery = "
                                SELECT `id`, `name`, `token` FROM `FCM_NOTIFICATION_TOKEN`
		                    ";
                $record = fetchData($tokenQuery);
                
                foreach ($record as $data) 
		        {
		            $token = $data['token'];
		            //  Send Notification
		            $resss= send_push_notification($token, $message);
		        }
		      
		        //  Send Notification
		        $resss= send_push_notification($token, $message);
		    }
		    
		    // end
	    }
    }
?>

<?php
	$selectCategoryQuery = "
	                        SELECT id, category_name FROM category
	                       ";
  	$data_cat = fetchData($selectCategoryQuery);

  	// dump($data_cat);

?>

<!DOCTYPE html>
<html>

<head>
	<title>Classsified Auction System</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<!--fonts-->
	<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<!--//fonts-->	
	<!-- js -->
	<script type="text/javascript" src="js/jquery.min.js"></script>

	<script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>

	<script type="text/javascript">
		// autosearch data fetch
		$(function(){

			// var data_cat = <?php echo json_encode($data_cat); ?>;
			// console.log(data_cat);
			// var currencies = [
			//     { value: 'Electronics', data: 'Electronics' },
			//     { value: 'Property', data: 'Property' },
			//     { value: 'Vehicles', data: 'Vehicles' },
			//     { value: 'Health &amp; Beauty', data: 'Health &amp; Beauty' },
			//     { value: 'Mobiles', data: 'Mobiles' },
			//     { value: 'Computers', data: 'Computers' },
			//     { value: 'TVs', data: 'TVs' },
			//     { value: 'Samsung', data: 'Samsung' },
			//     { value: 'Music Instruments', data: 'Music Instruments' }
			// ];
			
			// console.log(currencies);
			// // setup autocomplete function pulling from currencies[] array
			// $('#autocomplete').autocomplete({
			// 	lookup: currencies
			// });
			
		});

		
	</script>

	<script>
		function getSubCategory(val) {
			$.ajax({
				type: "POST",
				url: "get_sub_category.php",
				data:'category='+val,
				success: function(data){
					$("#sub-category-list").html(data);
				}
			});
		}
	</script>
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
	<link rel="stylesheet" type="text/css" href="css/easy-responsive-tabs.css" />
	<script src="js/easyResponsiveTabs.js"></script>

	<style type="text/css">
	    .autocomplete-suggestions { border: 1px solid #999; background: #fff; cursor: default; overflow: auto; }
	    .autocomplete-suggestion { padding: 10px 5px; font-size: 1.2em; white-space: nowrap; overflow: hidden; }
	    .autocomplete-selected { background: #f0f0f0; }
	    .autocomplete-suggestions strong { font-weight: normal; color: #3399ff; }
	  </style>
</head>
<body>
	
	
	<!--header section start-->		
	<?php include 'header.php'; ?>
	<?php include 'banner.php'; ?>
    <!--header section end-->

	<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Creare an Auction</h2>
			
			<div class="post-ad-form">
				<form method="POST" action="" enctype="multipart/form-data">
					<label>Select City <span>*</span></label>
					<select class="" name="city">
						<option>Select City</option>
						<?php 
		                  $selectCityQuery = "
		                                    SELECT * FROM city 
		                                   ";
		                  $record = fetchData($selectCityQuery);
		                  foreach ($record as $data) 
		                  {
		                ?>
		                	<option value="<?php  echo $data['id']; ?>"><?php  echo $data['city_name']; ?></option>
		                <?php    
		                  } 
		                ?>	
					</select>
					<div class="clearfix"></div>
					<label>Select Category <span>*</span></label>
					<select class="" name="category" onChange="getSubCategory(this.value);">
						<option>Select Category</option>
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
					<div class="clearfix"></div>

					<!-- sub category -->
					<label>Sub Category <span>*</span></label>
					<select class="" name="sub_category" id="sub-category-list">
						<option value="" selected disabled>Select Sub Category</option>	
					</select>
					<div class="clearfix"></div>

					
					<label>Location <span>*</span></label>
					<input type="text" class="phone keyword" placeholder="Enter Location ..." name="location" id="autocomplete">
					<span ><?php echo $locationErr; ?></span>
					<div class="clearfix"></div>

					<label>Keyword <span>*</span></label>
					<input type="text" class="phone keyword" placeholder="Enter keyword ..." name="keyword" id="autocomplete">
					<span ><?php echo $keywordErr;?></span>
					<div class="clearfix"></div>

					<!-- <label>Keyword <span>*</span></label> -->
					<!-- <input type="text" class="phone" placeholder="Enter keyword ..." name="keyword"> -->
					<!-- <span ><?php //echo $keywordErr;?></span> -->

					<!-- <label>Test <span>*</span></label>
					<input type="text" class="phone testc" placeholder="Enter Test ..." name="testn" id="testi">
					<div class="clearfix"></div> -->

					<label>Auction Title <span>*</span></label>
					<input type="text" class="phone" placeholder="Enter Title ..." name="auction_title">
					<span ><?php echo $auction_titleErr;?></span>
					
					<div class="clearfix"></div>
						<label>Auction Description <span>*</span></label>
						<textarea class="mess" placeholder="Write few lines about your product" name="auction_desc"></textarea>
						<span ><?php echo $auction_descErr;?></span>

					<div class="clearfix"></div>

					<label>Start Date <span>*</span></label>
					<input type="date" class="phone" placeholder="Enter Date ..." name="starting_date" style="width: 500px; margin-bottom: 10px;">
					<span ><?php echo $starting_dateErr;?></span>

					<div class="clearfix"></div>

					<label>End Date <span>*</span></label>
					<input type="date" class="phone" placeholder="Enter Date ..." name="ending_date" style="width: 500px; margin-bottom: 10px;">
					<span ><?php echo $ending_dateErr;?></span>
					
					<div class="clearfix"></div>
						<label>Product Condition <span>*</span></label>
						<select name="condition">
							<option value="">Select</option>
							<option value="Good">Good</option>
							<option value="Medium">Medium</option>
							<option value="Bad">Bad</option>
							<option value="Very Bad">Very Bad</option>
						</select>
						<span ><?php echo $conditionErr;?></span>
					
					<div class="clearfix"></div>
						<label>Product Type <span>*</span></label>
						<select name="product_type">
							<option value="">Select</option>
							<option value="New">NEW</option>
							<option value="Used">USED</option>
						</select>
						<span ><?php echo $product_typeErr;?></span>

					<div class="clearfix"></div>
						<label>Starting Price <span>*</span></label>
						<input type="text" class="phone" placeholder="Enter Starting Price ..." name="starting_price">
						<span ><?php echo $starting_priceErr;?></span>

					<div class="clearfix"></div>
						<label>Reserve Price <span>*</span></label>
						<input type="text" class="phone" placeholder="Enter Reserve Price ..." name="reserve_price">
						<span ><?php echo $reserve_priceErr;?></span>

					<div class="clearfix"></div>
					
					
					<div class="upload-ad-photos">
						<label>Photos for your auction :</label>	
						<div class="photos-upload-view">
								<!-- <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" /> -->

								<div>
									<!-- <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" /> -->
									<input type="file" id="fileselect" name="image" />
									<!-- <div id="filedrag">or drop files here</div> -->
								</div>

								<!-- <div id="submitbutton">
									<button type="submit">Upload Files</button>
								</div> -->

							<div id="messages">
								<p>Status Messages</p>
							</div>
						</div>
						<div class="clearfix"></div>
						<script src="js/filedrag.js"></script>
					</div>
					<div class="clearfix"></div>
					<p class="post-terms">By clicking <strong>auction Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>

					<input type="submit" name="addauction" value="auction">					
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>	
	<!-- </div> -->
	
	<!--footer section start-->		
	<?php include 'footer.php'; ?>
    <!--footer section end-->

	</body>

	

</html>