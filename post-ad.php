<?php
    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
	include 'core/notification_manager.php';
    session_start(); 
    // checkManager(); 
    // Set default time zone 
	date_default_timezone_set('Asia/Dhaka');
?>

<?php

  	// define variables and set to empty values
  	$post_titleErr = $post_descErr = $conditionErr = $product_typeErr = $priceErr = $nameErr = $mobileErr = $emailErr = $locationErr = "";
	
	$post_title = $post_desc = $condition = $product_type = $price = $name = $mobile = $email = $location =  "";

    if (isset($_POST['addPost'])) {

    	$post_time = date('h:i:s');
    	// $post_time = date('d-m-Y h:i:s');
   		$city_id = escape($_POST['city']);
   		$location = escape($_POST['location']);
   		$category_id = escape($_POST['category']);
   		$post_title = escape($_POST['post_title']);
   		$post_desc = escape($_POST['post_desc']);
   		$condition = escape($_POST['condition']);
   		$product_type = escape($_POST['product_type']);
   		$price = escape($_POST['price']);
   		$name = escape($_POST['name']);
   		$mobile = escape($_POST['mobile']);
   		$email = escape($_POST['email']);
		$userid = $_SESSION['uid'];

		if(isset($_POST ['sub_category'])){
			$category_id = escape($_POST['sub_category']);
		}
		


   		foreach ($_FILES['file']['name'] as $key => $filename)
   		 {

        	$filename  = $_FILES['file']['name'][$key];
          	$filesize  = $_FILES['file']['size'][$key];
          	$filetmp   = $_FILES['file']['tmp_name'][$key];
			$filetype  = $_FILES['file']['type'][$key];
			$fileext   = strtolower(end(explode('.',$_FILES['file']['name'][$key])));

			$expensions = array("jpeg","jpg","png");


			if ( in_array($fileext,$expensions) === false ) 
			{
				$fileErr = "Extension not allowed, Please Choose a JPEG or PNG file.";
			}

			if ( $filesize > 2097152 ) 
			{
				$fileErr = 'File size must be excately 2 MB';
			}

			if ( empty($fileErr) == true ) 
			{
				$updir = 'public/uploads/posts/';
				$filepath = $updir.$filename;
				move_uploaded_file($filetmp,$filepath);
			}
			else 
			{
				$filename       = escape($filename);
			}
        // dump($filename, TRUE);
			// echo "$fileErr";
      	}



	 //    $filename           = $_FILES['file']['name'];
		// $filesize           = $_FILES['file']['size'];
		// $filetmp            = $_FILES['file']['tmp_name'];
		// $filetype           = $_FILES['file']['type'];
		// $fileext            = strtolower(end(explode('.',$_FILES['file']['name'])));

		// $expensions         = array("jpeg","jpg","png");

		// dump($_FILES, TRUE);

		// if ( in_array($fileext,$expensions) === false ) {
		// 	$fileErr        = "Extension not allowed, Please Choose a JPEG or PNG file.";
		// }

		// if ( $filesize > 2097152 ) {
		// 	$fileErr        = 'File size must be excately 2 MB';
		// }

		// if ( empty($fileErr) == true ) {

		// 	$updir = 'public/uploads/posts/';
		// 	$filepath       = $updir.$filename;
		// 	move_uploaded_file($filetmp,$filepath);
		// }
		// else {
		// 	$filename       = escape($filename);
		// }

	    

   		if (empty($_POST["post_title"])) {
	      $post_titleErr = "Post Title is required";
	    }
	    if (empty($_POST["post_desc"])) {
	      $post_descErr = "Post Description is required";
	    } 
	    if (empty($_POST["condition"])) {
	      $conditionErr = "Item Condition is required";
	    } 
	    if (empty($_POST["price"])) {
	      $priceErr = "Item Price is required";
	    } 
	    if (empty($_POST["product_type"])) {
	      $product_typeErr = "Item Type is required";
	    } 
	    if (empty($_POST["name"])) {
	      $nameErr = "Your Name is required";
	    } 
	    if (empty($_POST["mobile"])) {
	      $mobileErr = "Your Mobile is required";
	    } 
	    if (empty($_POST["email"])) {
	      $emailErr = "Your Email is required";
	    } 

	    if( !empty($_POST["post_title"]) && !empty($_POST["post_desc"]) && !empty($_POST["condition"]) && !empty($_POST["product_type"]) && !empty($_POST["price"]) && !empty($_POST["name"]) && !empty($_POST["mobile"]) && !empty($_POST["email"]) ) 
	    {

	      	$addPostQuery = "
	      		INSERT INTO post(
					post_time, 
					city_id, 
					location, 
					category_id, 
					post_title, 
					post_desc, 
					condition1, 
					product_type, 
					price, 
					name, 
					mobile, 
					email, 
					userid
				) VALUES (
					'$post_time',
					'$city_id',
					'$location',
					'$category_id',
					'$post_title',
					'$post_desc',
					'$condition',
					'$product_type',
					'$price',
					'$name',
					'$mobile',
					'$email',
					'$userid'
				)
	          ";
	        
	        // dump($addPostQuery, TRUE);
	      	$execQuery = query($addPostQuery);
	      	$post_id = insertID();

	     	if(!empty($post_id) && $post_id != 0){

				// echo $category_id;
				// $redirectpPage = 'single.php?id=' . $post_id . '&cid=' . $category_id;
				// header('Refresh: 1; URL=' . $redirectpPage);


				// echo "ZISAD";

	     		foreach ($_FILES['file']['name'] as $key => $filename)
		   		 {

		        		$filename  = $_FILES['file']['name'][$key];

						$updir = 'public/uploads/posts/';
						$filepath       = $updir.$filename;

      	
				      	$addPostImageQuery = "INSERT INTO `post_image`(
				      							`post_id`, 
				      							`image`) 
			      							VALUES (
			      								'$post_id',
			      								'$filepath')";
			      								// dump($addPostImageQuery,true);
						  $execImageQuery = query($addPostImageQuery);
				  }

				$redirectpPage = 'single.php?id=' . $post_id . '&cid=' . $category_id;
				header('Refresh: 1; URL=' . $redirectpPage);
				
				//send notification to android app
				send_notification($post_id, $post_title, $price, $location);

			}
			else{
				echo error();
			}
	    }
    }

?>

<!DOCTYPE html>
<html>

<head>
	<title>Classsified Auction System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
</head>
<body>
	<!--header section start-->		
	<?php include 'header.php'; ?>
	<?php include 'banner.php'; ?>
    <!--header section end-->

	<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Post an Ad</h2>
			
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
					<!-- <input type="submit" name="addPost" value="Post"> -->
					<div class="clearfix"></div>

					<label>Location <span>*</span></label>
					<input type="text" class="phone" placeholder="Enter Location ..." name="location">
					<span ><?php echo $locationErr;?></span>
					<div class="clearfix"></div>

					<label>Select Category <span>*</span></label>
					<select class="" name="category" onChange="getSubCategory(this.value);">
						<option>Select Category</option>
						<?php 
		                  $selectCategoryQuery = "
		                                    SELECT * FROM `category` WHERE pid = 0
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

					<label>Post Title <span>*</span></label>
					<input type="text" class="phone" placeholder="Enter Title ..." name="post_title">
					<span ><?php echo $post_titleErr;?></span>
					
					<div class="clearfix"></div>
						<label>Description <span>*</span></label>
						<textarea class="mess" placeholder="Write few lines about your product" name="post_desc"></textarea>
						<span ><?php echo $post_descErr;?></span>
					
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
							<option value="Fixed_Price">Fixed Price</option>
							<option value="Negotiable">Negotiable</option>
						</select>
						<span ><?php echo $product_typeErr;?></span>

					<div class="clearfix"></div>
						<label>Price <span>*</span></label>
						<input type="text" class="phone" placeholder="Enter Item Price ..." name="price">
						<span ><?php echo $priceErr;?></span>

					<div class="clearfix"></div>
					<div class="personal-details">
						<!-- <form> -->
						<label>Your Name <span>*</span></label>
						<input type="text" class="name" placeholder="Enter Your Name" name="name">
						<span ><?php echo $nameErr;?></span>

						<div class="clearfix"></div>
						<label>Your Mobile No <span>*</span></label>
						<input type="text" class="phone" placeholder="Enter Your Mobile ..." name="mobile">
						<span ><?php echo $mobileErr;?></span>

						<div class="clearfix"></div>
						<label>Your Email Address<span>*</span></label>
						<input type="text" class="email" placeholder="Enter Your Email ..." name="email">
						<span ><?php echo $emailErr;?></span>

						<div class="clearfix"></div>
						
						<!-- </form> -->
					</div>
					
					
					<div class="upload-ad-photos">
						<label>Photos for your ad :</label>	
						<div class="photos-upload-view">
								<!-- <input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" /> -->

								<div>
									<!-- <input type="file" id="fileselect" name="fileselect[]" multiple="multiple" /> -->
									<input type="file" id="fileselect" name="file[]" multiple="" />
									<!-- <div id="filedrag">or drop files here</div> -->
								</div>

								<!-- <div id="submitbutton">
									<button type="submit">Upload Files</button>
								</div> -->

							<!--<div id="messages">-->
							<!--	<p>Status Messages</p>-->
							<!--</div>-->
						</div>
						<div class="clearfix"></div>
						<!-- <script src="js/filedrag.js"></script> -->
					</div>
					<div class="clearfix"></div>
					<p class="post-terms">By clicking <strong>post Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>

					<input type="submit" name="addPost" value="Post">					
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>	
	<!-- </div> -->
	
	<!--footer section start-->		
	<?php include 'footer.php'; ?>
    <!--footer section end-->


    <!-- Sub Category script -->
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

	</body>

</html>