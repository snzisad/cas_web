<?php
    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
    session_start(); 
    // checkManager(); 
    

    // Retrieve Data
    $getID = $_GET['id'];
    $cat_id = $_GET['cid'];
    
    $postQuery = "
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
		WHERE post.id = '$getID' AND post.`category_id` = '$cat_id'
    ";


    $data = fetchDataWithID($postQuery); 

    // dump($data, TRUE);

      
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
	
	<!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-135052903-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-135052903-1');
    </script>
    
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
			
			console.log("Running");
			$( '.uls-trigger' ).uls( {
				onSelect : function( language ) {
					var languageName = $.uls.data.getAutonym( language );
					$( '.uls-trigger' ).text( languageName );
				},
					quickList: ['en', 'hi', 'he', 'ml', 'ta', 'fr'] //FIXME
				} );

				
   			function check_online_status() {
				   
   				$.ajax({
		           	url: 'status.php',
		           	dataType: "json",
		           	type: 'GET',
		           	success: function(data) {

		               	if (data.length > 0){  // if at least 1 is online

		                  	$('.status').each(function(){  // loop through each of the user posts
		                      	var userid = $(this).attr('id'); // get just the userid #
		                      	
			console.log("Running Function");
		                      	if($.inArray(userid, data) !== -1){  // if userid # in the returned data array set to online
		                      		// alert('Go In');
		                       		$(this).html("(Online)");  
		                      	} else{  // else if userid # not in the returned data array set to offline
		                       		$(this).html("(Offline)");  
		                       		// alert('Go OUT');
		                      	}
		                  	});
		               	} 
		               	else { // if no one is online, set all to offline
		                   	$('.status').html("(Offline)");
		                   	// alert('Go OUTER');
		               	}
		           	}
		        });
   			} 

   			check_online_status();                         
     		setInterval(function(){
		      	check_online_status()
		    }, 5000);
		} );
	</script>
	<link rel="stylesheet" href="css/flexslider.css" media="screen" />
	<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
	<style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
     /* #map {
        height: 100%;
      }*/
      /* Optional: Makes the sample page fill the window. */
      /*html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }*/
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
</head>
<body onload="initMap()">
	<!--header section start-->		
	<?php include 'header.php'; ?>
	<?php include 'banner.php'; ?>
    <!--header section end-->
	
	<div class="single-page main-grid-border">
		<div class="container">
			<ol class="breadcrumb" style="margin-bottom: 5px;">
				<li><a href="index.php">Home</a></li>
				<li><a href="all-classifieds.php">All Ads</a></li>
				<li class="active"><a href="<?php echo "all-classifieds.php?cid=$category_id"; ?>"><?php echo $category_name; ?></a></li>
				<!-- <li class="active">Mobile Phone</li> -->
			</ol>
			
				<div class="product-desc">
					<div class="col-md-7 product-view">
						<h2><?php echo $post_title; ?></h2>
						<p> <i class="glyphicon glyphicon-map-marker"></i><a href="#" id="loc"><?php echo strtoupper($location); ?></a>, <a href="#"><?php echo $city_name; ?></a>| Added at <?php echo $post_time; ?></p>
						<div class="flexslider">
							<ul class="slides">

								<?php 
			                      $selectPostImageQuery = "
			                                        SELECT * FROM `post_image` WHERE post_id = '$getID'
			                                       ";
			                      $record1 = fetchData($selectPostImageQuery);
			                      foreach ($record1 as $data1) 
			                      {
			                    ?>
			                    	<li data-thumb="<?php echo $data1['image']; ?>">
										<img src="<?php echo $data1['image']; ?>" />
									</li>
			           				
			                    <?php    
			                      } 
			                    ?>
								<!-- <li data-thumb="<?php //echo $image; ?>">
									<img src="<?php //echo $image; ?>" />
								</li>
								<li data-thumb="images/ss2.jpg">
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
						<h4>Name : <a href="#"><?php echo $name; ?></a></h4>
						<!-- <h4>Views : <strong>150</strong></h4> -->
						<!-- <p><strong>Display </strong>: 1.5 inch HD LCD Touch Screen</p> -->
						<p style="background-color: #A3DDD3; padding: 8px; color: #414141; font-size: 14px;"><strong>Summary</strong> : <?php echo $post_desc; ?></p>

						<!-- <ul style="display: none;">
							<li id="lat">22.347441</li>
							<li id="lan">91.819185</li>
							<li id="loc">Lalkhan bazar, chittagong, bangladesh</li>
							var lat = document.getElementById("lat").innerHTML;
						</ul> -->

						<!-- <div id="curr_addr">GEC Circle, chittagong, bangladesh</div> -->
						<b>From:</b> <div id="curr_addr"></div>
						<b>To:</b> <div id="post_addr"><?php echo $location; ?>, <?php echo $city_name; ?></div>
						<!-- <div id="floating-panel"> -->
						   <!--  <b>Start: </b>
						    <select id="curr_addr">
						      <option value="chicago, il">Chicago</option>
						    </select>
						    <b>End: </b>
						    <select id="post_addr">
						      <option value="chicago, il">Chicago</option>
						    </select> -->
						   <!--  <input type="text" name="curr_addr" id="curr_addr" value="GEC Circle, Chittagong, Bangladesh">
						    <input type="text" name="post_addr" id="post_addr" value="Lalkhan Bazar, Chittagong, Bangladesh"> -->
						<!-- </div> -->

						<div id="googleMap" style="width:630px;height:350px;" ></div> 

						<script>
							$(document).ready(function() {
								initMap();
							});
							function initMap() {
						        var directionsService = new google.maps.DirectionsService;
						        var directionsDisplay = new google.maps.DirectionsRenderer;
						        var map = new google.maps.Map(document.getElementById('googleMap'), {
						          zoom: 17,
						          center: {lat: 23.777176, lng: 90.399452}
						        });
						        directionsDisplay.setMap(map);
						        calculateAndDisplayRoute(directionsService, directionsDisplay);
						        // var onChangeHandler = function() {
						        //   calculateAndDisplayRoute(directionsService, directionsDisplay);
						        // };
						        // document.getElementById('curr_addr').addEventListener('change', onChangeHandler);
						        // document.getElementById('post_addr').addEventListener('change', onChangeHandler);
						    }

						    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
						        directionsService.route({
						          origin: document.getElementById('curr_addr').innerHTML,
						          destination: document.getElementById('post_addr').innerHTML,
						          travelMode: 'DRIVING'
						        }, function(response, status) {
						          if (status === 'OK') {
									  console.log(response);
						            directionsDisplay.setDirections(response);
						          } else {
						            // window.alert('Directions request failed due to ' + status);
						            console.log('Directions request failed due to ' + status);
						          }
						        });
						    }
						</script>

						<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCig1A__jp9dGgeqWJkLdQDys7lvRGnN4U&callback=initMap"></script>
						
					</div>
				</div>
				<div class="col-md-5 product-details-grid">
					<div class="item-price">
						<div class="product-price">
							<p class="p-price">Price</p>
							<h3 class="rate">Tk. <?php echo $price; ?></h3>
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
							<p class="p-price" style="text-align: center;">Chat with Post Admin <span class="status" id="<?php echo $puid; ?>"></span></p>
							<p>
								<?php
									if (isset($_SESSION['loggedIn'])) {
								?>
									<a href="message.php?uid=<?php echo $puid; ?>&pid=<?php echo $id; ?>">
								 		<img style="margin-left: 20px;" src="public/images/icon-chat.png">
								 	</a>
								<?php
									}
									else {
								?>
									<a href="login.php">Login In Here</a>
								<?php
									}
								?>
								
							</p>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="interested text-center">
						<h4>Interested in this Ad?<small> Contact the Seller!</small></h4>
						<p><i class="glyphicon glyphicon-user"></i><?php echo $name; ?></p>
						<p><i class="glyphicon glyphicon-envelope"></i><?php echo $email; ?></p>
						<p><i class="glyphicon glyphicon-earphone"></i>+88 0<?php echo $mobile; ?></p>
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
		</div>
	</div>

	<!--footer section start-->		
	<?php include 'footer.php'; ?>
    <!--footer section end-->
    <!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true"></script> -->
    <script type="text/javascript" charset="utf-8">

        $(document).ready(function() {
            var currgeocoder;

            //Set geo location lat and long

            navigator.geolocation.getCurrentPosition(function(position, html5Error) {

                 geo_loc = processGeolocationResult(position);
                 currLatLong = geo_loc.split(",");
                 initializeCurrent(currLatLong[0], currLatLong[1]);
            });

            //Get geo location result
            function processGeolocationResult(position) {
                 html5Lat = position.coords.latitude; //Get latitude
                 html5Lon = position.coords.longitude; //Get longitude
                 html5TimeStamp = position.timestamp; //Get timestamp
                 html5Accuracy = position.coords.accuracy; //Get accuracy in meters
                 return (html5Lat).toFixed(8) + ", " + (html5Lon).toFixed(8);
            }

            //Check value is present or not & call google api function
            function initializeCurrent(latcurr, longcurr) {
                currgeocoder = new google.maps.Geocoder();
                console.log(latcurr + "-- ######## --" + longcurr);

                if (latcurr != '' && longcurr != '') {
                    var myLatlng = new google.maps.LatLng(latcurr, longcurr);
                    return getCurrentAddress(myLatlng);
                }
            }

            //Get current address
            function getCurrentAddress(location) {
                currgeocoder.geocode({
                      'location': location

                }, function(results, status) {
               
                    if (status == google.maps.GeocoderStatus.OK) {
                        console.log(results[0]);
                        $("#curr_addr").html(results[0].formatted_address);
                    } 
                    else {
                        alert('Geocode was not successful for the following reason: ' + status);
                        // console.log('Geocode was not successful for the following reason: ' + status);
                    }
                });
            }
        });

    </script>
</body>

</html>