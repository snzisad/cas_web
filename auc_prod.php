<?php
    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
    session_start(); 
    // checkManager(); 
    

    // Retrieve Data
    $getID = $_GET['id'];
    // $cat_id = $_GET['cid'];
    
    $selectAuctionQuery = "
    	SELECT auction.*, category.`category_name` AS category_name, auction_image.image AS image
		FROM auction
		LEFT JOIN category
		ON auction.`category_id` = category.`id`
		LEFT JOIN auction_image
		ON auction_image.auction_id = auction.id
		WHERE auction.id = '$getID'
    ";

    $data = fetchDataWithID($selectAuctionQuery);   


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
	<link rel="stylesheet" href="css/flexslider.css" media="screen" />

	<style type="text/css">
		.zui-table {
		    border: solid 1px #DDEEEE;
		    border-collapse: collapse;
		    border-spacing: 0;
		    font: normal 13px Arial, sans-serif;
		}
		.zui-table thead th {
		    background-color: #01a185;
		    border: solid 1px #DDEEEE;
		    color: #336B6B;
		    color: #fff;
		    padding: 10px;
		    text-align: left;
		    text-shadow: 1px 1px 1px #fff;
		}
		.zui-table tbody td {
		    border: solid 1px #DDEEEE;
		    color: #333;
		    padding: 10px;
		    text-shadow: 1px 1px 1px #fff;
		}
		.zui-table-zebra tbody tr:nth-child(odd) {
		    background-color: #fff;
		}
		.zui-table-zebra tbody tr:nth-child(even) {
		    /*background-color: #EEF7EE;*/
		    background-color: #DDEFEF;
		}
		.zui-table-horizontal tbody td {
		    border-left: none;
		    border-right: none;
		}
	</style>
</head>
<body>
	<!--header section start-->		
	<?php include 'header.php'; ?>
	<?php include 'banner.php'; ?>
    <!--header section end-->
<!--single-page-->
<div class="single-page main-grid-border">
	<div class="container">
		<!-- <ol class="breadcrumb" style="margin-bottom: 5px;">
			<li><a href="index.html">Home</a></li>
			<li><a href="all-classifieds.html">All Ads</a></li>
			<li class="active"><a href="mobiles.html">Mobiles</a></li>
			<li class="active">Mobile Phone</li>
		</ol> -->
		
			<div class="product-desc">
				<div class="col-md-7 product-view">
					<h2><?php echo $auction_title; ?></h2>
					<!-- <p> <i class="glyphicon glyphicon-map-marker"></i><a href="#">state</a>, <a href="#">city</a>| Added at 06:55 pm, Ad ID: 987654321</p> -->
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="<?php echo $image; ?>">
								<img src="<?php echo $image; ?>" /> 
								<!-- <img src="public/images/Desert.jpg" /> -->
							</li>
							<!-- <li data-thumb="images/ss2.jpg">
								<img src="images/ss2.jpg" />
							</li>
							<li data-thumb="images/ss3.jpg">
								<img src="images/ss3.jpg" />
							</li> -->
						</ul>
					</div>
					<!-- FlexSlider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						});
					});
				</script>
				<!-- //FlexSlider -->
				<div class="product-details">
					<!-- <h4>Brand : <a href="#">Company name</a></h4> -->
					<!-- <h4>Views : <strong>150</strong></h4> -->
					<!-- <p><strong>Display </strong>: 1.5 inch HD LCD Touch Screen</p> -->
					<p><strong>Summary</strong> : <?php echo $auction_desc; ?></p>
					
				</div>
			</div>
			<div class="col-md-5 product-details-grid">
				<div class="item-price">
					<div class="product-price">
						<p class="p-price">Starting Price</p>
						<h3 class="rate">Tk. <?php echo $starting_price; ?></h3>
						<div class="clearfix"></div>
					</div>
					<div class="condition">
						<p class="p-price">Condition</p>
						<h4><?php echo $condition; ?></h4>
						<div class="clearfix"></div>
					</div>
					<div class="itemtype">
						<p class="p-price">Item Type</p>
						<h4><?php echo $product_type; ?></h4>
						<div class="clearfix"></div>
					</div>
					<div class="itemtype">
						<p class="p-price">Auction End</p>
						<h4><?php $ending_date =date_create($ending_date); echo date_format($ending_date, 'Y-m-d'); ?></h4>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="interested text-center">
					<h4>Interested in this Auction Product?<small> bid!</small></h4>

					<?php
						if (isset($_SESSION['loggedIn'])) {


							if (isset($_POST['AddBid'])) {

								$bid_price 		=	$_POST['bid_price'];

								$userQuery = "SELECT * FROM users WHERE username = '". $_SESSION['userName'] . "' ";

								$userdata = fetchDataWithID($userQuery);   

								$users_id = $userdata['id'];

								$bidQuery = "INSERT INTO `bid`(`auction_id`, `auction_time`, `bid_price`, `users_id`) VALUES ('$id','$starting_date','$bid_price','$users_id')";

								//dump($bidQnameery, TRUE);

								$execQuery = query($bidQuery);
							}
					?>
					<form action="" method="POST">

						<p>
							<!-- <i class="glyphicon glyphicon-user"></i> -->
							<input type="text" class="phone" name="bid_price" style="width: 100px;">

							<input type="submit" class="phone" value="bid" name="AddBid">

						</p>


						<!-- <p><i class="glyphicon glyphicon-user"></i><?php echo $name; ?></p> -->
						<!-- <p><i class="glyphicon glyphicon-envelope"></i><?php echo $email; ?></p> -->
						<!-- <p><i class="glyphicon glyphicon-earphone"></i>+88 <?php echo $mobile; ?></p> -->
					</form>
					<?php 
						}
						else {
					?>
						<h4>Interested! Login for bid <a href="login.php">Here</a></h4>
					<?php
						}
					?>
				</div>
				<!-- <div class="tips">
					<h4>Safety Tips for Buyers</h4>
					<ol>
						<li><a href="#">Contrary to popular belief.</a></li>
						<li><a href="#">Contrary to popular belief.</a></li>
						<li><a href="#">Contrary to popular belief.</a></li>
						<li><a href="#">Contrary to popular belief.</a></li>
						<li><a href="#">Contrary to popular belief.</a></li>
						<li><a href="#">Contrary to popular belief.</a></li>
						<li><a href="#">Contrary to popular belief.</a></li>
						<li><a href="#">Contrary to popular belief.</a></li>
						<li><a href="#">Contrary to popular belief.</a></li>
					</ol>
				</div> -->
			</div>
			<div class="clearfix"></div>
		</div>


		<!-- Bid Info -->
		<div class="grid_3 grid_5">
			<h3 class="head-top">Bid Information</h3>
			<div class="but_list">
				<div class="col-md-12 page_1">
					<!-- <p>Add modifier classes to change the appearance of a badge.</p> -->
					

					
					<table class="zui-table zui-table-zebra zui-table-horizontal">
					    <thead>
					        <tr>
					            <th width="25%">Auction Title</th>
					            <th width="50%">Name</th>
					            <th width="25%">Bid Price</th>
					            <th width="25%">Image</th>
					        </tr>
					    </thead>
					    <tbody>
					        <?php 
							// $userQuery = "SELECT * FROM users WHERE username = '". $_SESSION['userName'] . "' ";

							// 	$userdata = fetchData($userQuery);   

							// 	$users_id = $userdata['id'];

		                      $selectBidQuery = "
		                      					SELECT bid.*, auction.auction_title, auction.auction_desc, auction.ending_date, category.category_name, auction_image.image, users.name,users.username 
												FROM bid
												LEFT JOIN users
												ON bid.users_id = users.id
												LEFT JOIN auction
												ON bid.auction_id = auction.id
												LEFT JOIN auction_image
												ON auction.id = auction_image.auction_id
												LEFT JOIN category
												ON auction.category_id = category.id
												WHERE auction.id = '$id'
												ORDER BY bid.bid_price desc
												
		                                       ";
		                      $record = fetchData($selectBidQuery);
		                      foreach ($record as $data) 
		                      {
		                    ?>
		                    	<tr>
									<td><?php  echo $data['auction_title']; ?></td>
									<td><?php  echo $data['username']; ?></td>
									<td><?php  echo $data['bid_price']; ?></td>
									<td> <img width="150" height="80" src="<?php  echo $data['image']; ?>"> </td>
								</tr>
		                    	
		           
		                    <?php    
		                      } 
		                    ?>
					    </tbody>
					</table>                
				</div>

				<div class="clearfix"> </div>
			</div>
		</div>
		<!-- End Bid Info -->
	</div>
</div>

	<!--footer section start-->		
	<?php include 'footer.php'; ?>
    <!--footer section end-->
</body>

</html>