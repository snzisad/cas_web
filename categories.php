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

	<div class="categories-section main-grid-border">
		<div class="container">
			<h2 class="head">Main Categories</h2>
			<div class="category-list">
				<div id="parentVerticalTab">
					<ul class="resp-tabs-list hor_1">
					<?php 
	                	$selectCategoryQuery = "
	                                    SELECT * FROM category WHERE pid = 0
	                                   ";
	                  	$record = fetchData($selectCategoryQuery);
	                  	foreach ($record as $data) 
	                  	{
	                ?>
	                		<li><?php  echo $data['category_name']; ?></li>
	                <?php    
	                  	} 
	                ?>	
						<a href="all-classifieds.php">All Ads</a>
					</ul>
					<div class="resp-tabs-container hor_1">
						<span class="active total" style="display:block;" data-toggle="modal" data-target="#myModal"><strong>All Bangladesh</strong> <!-- (Select your city to see local ads) --></span>

						<?php 
		                  $selectCategoryQuery = "
		                                    SELECT * FROM category WHERE pid = 0
		                                   ";
		                  $record = fetchData($selectCategoryQuery);
		                  foreach ($record as $data) 
		                  {
		                  		$cat_id = $data['id'];
		                ?>
		                	<div>
								<div class="category">
									<div class="category-img">
										<img src="<?php  echo $data['category_image']; ?>" title="image" alt="" />
									</div>
									<div class="category-info">
										<h4><?php  echo $data['category_name']; ?></h4>
										<!-- <span>5,12,850 Ads</span> -->
										<a href="<?php echo "all-classifieds.php?cid=$cat_id"; ?>">View all Ads</a>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="sub-categories">
									<ul>
										<?php 
						                  $selectCategoryQuery = "
						                                    SELECT * FROM category WHERE pid = '$cat_id'
						                                   ";
						                  $record = fetchData($selectCategoryQuery);
						                  foreach ($record as $data) 
						                  {
						                  	$sub_cat_id = $data['id'];
						                ?>
											<li>
												<div class="category-img">
													<img src="<?php  echo $data['category_image']; ?>" title="image" alt="" />
												</div>
												<a href="<?php echo "all-classifieds.php?cid=$sub_cat_id"; ?>"><?php  echo $data['category_name']; ?></a>
											</li>
										<?php    
						                  } 
						                ?>	
										<div class="clearfix"></div>
									</ul>
								</div>
							</div>
		                <?php    
		                  } 
		                ?>	
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!--Plug-in Initialisation-->
	<script type="text/javascript">
		$(document).ready(function() {

	        //Vertical Tab
	        $('#parentVerticalTab').easyResponsiveTabs({
	            type: 'vertical', //Types: default, vertical, accordion
	            width: 'auto', //auto or any width like 600px
	            fit: true, // 100% fit in a container
	            closed: 'accordion', // Start closed if in accordion view
	            tabidentify: 'hor_1', // The tab groups identifier
	            activate: function(event) { // Callback function if tab is switched
	            	var $tab = $(this);
	            	var $info = $('#nested-tabInfo2');
	            	var $name = $('span', $info);
	            	$name.text($tab.text());
	            	$info.show();
	            }
	        });
	    });
	</script>

	<!--footer section start-->		
	<?php include 'footer.php'; ?>
    <!--footer section end-->
	</body>

	</html>