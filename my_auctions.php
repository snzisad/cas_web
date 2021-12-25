<?php
    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
    session_start(); 
    
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
</head>
<body>
	<!--header section start-->		
	<?php include 'header.php'; ?>
	<?php include 'banner.php'; ?>
    <!--header section end-->
    
<div class="single-page main-grid-border">
	<div class="container">
		<div class="grid_3 grid_5">
			<h3 class="head-top">Auction Information</h3>
			<div class="but_list">
				<div class="col-md-12 page_1">
					<p>Add modifier classes to change the appearance of a badge.</p>
					<table class="table table-bordered">

						<thead>
							<tr>
								<th width="50%">Auction Title</th>
								<th width="50%">Bid Price</th>
								<th width="50%">Image</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$userQuery = "SELECT * FROM users WHERE username = '". $_SESSION['userName'] . "' ";

								$userdata = fetchDataWithID($userQuery);   

								$users_id = $userdata['id'];

		                      $selectAuctionQuery = "
		                      					SELECT auction.*, category.category_name, auction_image.image 
												FROM auction 
												LEFT JOIN auction_image
												ON auction.id = auction_image.auction_id
												LEFT JOIN category
												ON auction.category_id = category.id
												
		                                       ";

		                      // dump($selectAuctionQuery, TRUE);
		                      $record = fetchData($selectAuctionQuery);
		                      foreach ($record as $data) 
		                      {
		                    ?>
		                    	<tr>
									<td><?php  echo $data['auction_title']; ?></td>
									<td><?php  echo $data['starting_price']; ?></td>
									<td> <img width="150" height="100" src="<?php  echo $data['image']; ?>"> </td>
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
    </div>
</div>
	<!--footer section start-->		
	<?php include 'footer.php'; ?>
    <!--footer section end-->
</body>

</html>