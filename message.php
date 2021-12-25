
<?php
    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
    session_start(); 
    // checkManager(); 
     // dump($_SESSION);
?>
<?php

    if(!isset($_SESSION['userName'])){
        if (!headers_sent()) {
          header_remove();
        }
        header('location: login.php');
    }
$uid = $_GET['uid'];
$pid = $_GET['pid'];
$page = "message.php?uid='$uid'&pid='$pid'";
// dump($page,TRUE);
// message.php?uid='.$_GET[['uid'].'&pid='.$_GET['pid'].';
$sec = "2";
?>
<!DOCTYPE html>
<html>

<head>
	<title>Classsified Auction System</title>
	<!-- <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'"> -->

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

			var data_cat = <?php echo json_encode($data_cat); ?>;
			console.log(data_cat);
			var currencies = [
			    { value: 'Electronics', data: 'Electronics' },
			    { value: 'Property', data: 'Property' },
			    { value: 'Vehicles', data: 'Vehicles' },
			    { value: 'Health &amp; Beauty', data: 'Health &amp; Beauty' },
			    { value: 'Mobiles', data: 'Mobiles' },
			    { value: 'Computers', data: 'Computers' },
			    { value: 'TVs', data: 'TVs' },
			    { value: 'Samsung', data: 'Samsung' },
			    { value: 'Music Instruments', data: 'Music Instruments' }
			];
			
			console.log(currencies);
			// setup autocomplete function pulling from currencies[] array
			$('#autocomplete').autocomplete({
				lookup: currencies
			});
		});
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


	    .chat2 input[type="text"] {
	    	outline: none;
		    border: 1px solid #BEBEBE;
		    background: none;
		    font-size: 15px;
		    padding: 10px 10px;
		    width: 100%;
		    margin: 1em 0;
	    }

	    .sub_home_left button {
		    outline: none;
		    border: none;
		    background: #01a185;
		    color: #fff;
		    font-size: 1em;
		    text-align: center;
		    width: 100%;
		    padding: 10px 0;
		    transition: .5s all;
		    -webkit-transition: .5s all;
		    -moz-transition: .5s all;
		    -o-transition: .5s all;
		    -ms-transition: .5s all;
		}
		.status{ background: grey; border-radius: 50%; display: inline-block; height: 8px; margin-left: 4px; width: 8px; }
	</style>


	<!-- <link rel="stylesheet" type="text/css" href="js/jScrollPane/jScrollPane.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/page.css" /> -->
	<!-- <link rel="stylesheet" type="text/css" href="css/chat.css" /> -->
</head>
<body>

	<!--header section start-->		
	<?php include 'header.php'; ?>
	<?php include 'banner.php'; ?>
    <!--header section end-->


	 <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<!-- <h1>Create an account</h1> -->
						<!-- <p class="creating">Create an account at Classified Auction System.</p> -->

						<?php
							$getID = $_GET['pid'];

							$postUserQuery = "SELECT post.*, users.username, users.id as userid
											FROM post
											left JOIN users
											ON post.userid = users.id
											WHERE post.id = '$getID'";
							$data = fetchDataWithID($postUserQuery); 

							// dump($data, TRUE);
						?>
						
						<h2>Welcome: <?php echo $_SESSION['userName']; ?>, Chat with <span class="status" id="<?php echo $data['userid']; ?>"></span> <?php echo $data['name']; ?> for <?php echo $data['post_title'];?></h2>

						<?php
							// $selectChatRoom = "
		     //                                    select * from `chat_room`
		     //                                   ";
		     //                  $record = fetchData($selectChatRoom);
		     //                  foreach ($record as $data1) 
		     //                {
						?>
						<!-- <div>
							Chat Room Name: <?php //echo $data1['chat_room_name']; ?><br><br>
						</div> -->

						<div id="result" style="overflow-y:scroll; border: 1px solid #01a185; padding-left: 20px; height:300px;"></div>

						<form>
							<div class="sign-u">

								<div class="chat2">
								
										<input type="text" id="msg" placeholder=" write here ..."/>

										<input type="hidden" value="<?php echo $data['id']; ?>" id="id">
										<input type="hidden" value="<?php echo $data['userid']; ?>" id="post_user_id">
								
								</div>
								<div class="clearfix"> </div>
							</div>
						
							<div class="sub_home">
								<div class="sub_home_left">
										<button type="submit" id="send_msg">Send</button>
									
								</div>
								<div class="sub_home_right">
									<p>Go Back to <a href="index.php">Home</a></p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</form>
						<?php
							//}
						?>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">&copy 2017 Classsified Auction System. All Rights Reserved | Design by <a href="#" target="_blank">Classsified Auction System.</a></p>
			</footer>
        <!--footer section end-->
	</section>

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script src="js/jScrollPane/jquery.mousewheel.js"></script>
	<!-- <script src="js/jScrollPane/jScrollPane.min.js"></script> -->
	<!-- <script src="js/scriptc.js"></script> -->


	<script src = "js/jquery-3.1.1.js"></script>	
<script type = "text/javascript">

	$(document).ready(function(){
	displayResult();
	/* Send Message	*/	
		
		$('#send_msg').on('click', function(){
			if($('#msg').val() == ""){
				alert('Please write message first');
				return false;
			}else{
				$msg = $('#msg').val();
				$id = $('#id').val();
				$post_user_id = $('#post_user_id').val();
				$.ajax({
					type: "POST",
					url: "send_message.php",
					data: {
						msg: $msg,
						id: $id,
						post_user_id: $post_user_id,
					},
					success: function(){
						displayResult();
					}
				});

				$('#msg').val('');
			}
			return false;	
		});
	/*****	*****/
	});
	
	function displayResult(){
		$id = $('#id').val();
		$.ajax({
			url: 'send_message.php',
			type: 'POST',
			async: false,
			data:{
				id: $id,
				res: 1,
			},
			success: function(response){
				$('#result').html(response);
			}
		});

		$('#msg').val('');
	}
	
</script>


<script type="text/javascript">    
   		$(document).ready(function() {  

   			function check_online_status() {
   				$.ajax({
		           	url: 'status.php',
		           	dataType: "json",
		           	type: 'GET',
		           	success: function(data) {

		               	if (data.length > 0){  // if at least 1 is online

		                  	$('.status').each(function(){  // loop through each of the user posts
		                      	var userid = $(this).attr('id'); // get just the userid #
		                      	
		                      	if($.inArray(userid, data) !== -1){  // if userid # in the returned data array set to online
		                      		// alert('Go In');
		                       		$(this).css({background: 'rgb(66, 183, 42) none repeat scroll 0% 0%'});  
		                      	} else{  // else if userid # not in the returned data array set to offline
		                       		$(this).css({background: 'grey'});  
		                       		// alert('Go OUT');
		                      	}
		                  	});
		               	} 
		               	else { // if no one is online, set all to offline
		                   	$('.status').css({background: 'grey'});
		                   	// alert('Go OUTER');
		               	}
		           	}
		        });
   			}    
   			check_online_status();                         
     		setInterval(function(){
		      	check_online_status()
		    }, 5000);
		});
 	</script>
</body>
</html>