
<?php
    include 'core/dbe.inc.php';
    include 'core/core.inc.php';
    session_start(); 
    // checkManager(); 
     // dump($_SESSION);
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

		.chat-list ul{
			list-style: none;
		}
		.chat-list ul li{
			display: block;
			background-color: #A3DDD3;
			padding: 5px 8px;
			margin-top: 12px;
		}

		.chat-list ul li a{
		    color: #414141;
		}

		/*.status{ background: green; 
			background: rgb(66, 183, 42) none repeat scroll 0% 0%;
			border-radius: 10px; padding: 0px 10px;}*/

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

					<div class="container">
						<div class="row">
							<div class="col-md-3 chat-list" style="overflow-y:scroll; border: 1px solid #01a185; padding-left: 20px; height:500px; display:none;">
								<ul>
									<?php
										$sess_id = $_SESSION['uid'];
										$query = " SELECT chat.*, post.post_title as post_title, post.price as post_price, post.userid as post_user_id, users.name as name FROM `chat` LEFT JOIN post ON chat.chat_room_id = post.id LEFT JOIN users ON post.userid = users.id GROUP BY chat_room_id HAVING userid = '$sess_id'";

										$record1 = fetchData($query);
										$i=1;
				                      	foreach ($record1 as $data1) 
					                    {
					                    	
									?>
									<li class="post" id="<?php echo $i; ?>">
										<a href="my_chat.php?uid=<?php echo $data1['post_user_id']; ?>&pid=<?php echo $data1['chat_room_id']; ?>">
											<h3><?php echo $data1['post_title'];?></h3>
											<p>Price: <?php echo $data1['post_price'];?>Tk. </p>
										</a>
									</li>
									
									<?php
											$i++;
										}
									?>
								</ul>
							</div>
							<div class="col-md-3 col-md-offset-1 chat-list" style="overflow-y:scroll; border: 1px solid #01a185; padding-left: 20px; height:500px;  display:none;">
								<ul>
									<?php
										$sess_id = $_SESSION['uid'];
										$query = " SELECT chat.*, post.post_title as post_title,post.userid as post_user_id, users.name as name FROM `chat` LEFT JOIN post ON chat.chat_room_id = post.id LEFT JOIN users ON post.userid = users.id GROUP BY chat_room_id HAVING userid = '$sess_id'";

										$record1 = fetchData($query);
										$i=1;
				                      	foreach ($record1 as $data1) 
					                    {
					                    	
									?>
									<li class="post" id="<?php echo $i; ?>">
										<a href="my_chat.php?uid=<?php echo $data1['post_user_id']; ?>&pid=<?php echo $data1['chat_room_id']; ?>">
											<h3><?php echo $data1['post_title'];?></h3>
											<p><?php echo $data1['name'];?> <span class="status" id="<?php echo $data1['post_user_id']; ?>"></span></p>
											<p><?php echo $data1['chat_msg'];?></p>
										</a>
									</li>
									
									<?php
											$i++;
										}
									?>
								</ul>
							</div>
							<!-- <div class="col-md-1">
								
							</div> -->
							<div class="col-md-4 col-md-offset-1" style="">
								<div class="sign-up" style="width: 90%;">
									<!-- <h1>Create an account</h1> -->
									<!-- <p class="creating">Create an account at Classified Auction System.</p> -->

									<?php
										// $getID = $_GET['pid'];
										$getID = isset($_GET['pid'])?$_GET['pid']:1; 
										$postUserQuery = "SELECT post.*, users.username
														FROM post
														left JOIN users
														ON post.userid = users.id
														WHERE post.id = '$getID'";


										$data5 = fetchDataWithID($postUserQuery); 
										$name = (isset($data5['username'])) ? $data5['username'] : ' - ' ;
										$post_title = (isset($data5['post_title'])) ? $data5['post_title'] : ' - ' ;
										// dump($data5, TRUE);
									?>
									<h2>Welcome: <?php echo $_SESSION['userName']; ?>, Chat with <?php echo $name; ?> for <?php echo $post_title;?></h2>

									<?php
										// $selectChatRoom = "
					     				//                     select * from `chat_room`
					     				//                   ";
					     				// $record = fetchData($selectChatRoom);
					     				// foreach ($record as $data) 
					     				// {
									?>
									<!-- <div>
										Chat Room Name: <?php //echo $data['chat_room_name']; ?><br><br>
									</div> -->

									<div id="result" style="overflow-y:scroll; border: 1px solid #01a185; padding-left: 20px; height:300px;"></div>

									<form>
										<div class="sign-u">

											<div class="chat2">
											
													<input type="text" id="msg" placeholder=" write here ..." required="1"/>

													<input type="hidden" value="<?php echo $data5['id']; ?>" id="id">
													<input type="hidden" value="<?php echo $data5['userid']; ?>" id="post_user_id">
											
											</div>
											<div class="clearfix"> </div>
										</div>
									
										<div class="sub_home">
											<div class="sub_home_left">
													<button type="button" id="send_msg">Send</button>
													<!-- <input type="submit" id="send_msg" name="sign_up" value="Send"> -->
												
											</div>
											<!-- <div class="sub_home_right">
												<p>Go Back to <a href="index.php">Home</a></p>
											</div> -->
											<div class="clearfix"> </div>
										</div>
									</form>
									<?php
										//}
									?>
								</div>
							</div>
						</div>
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
					}else{
						$msg = $('#msg').val();
						$id = $('#id').val();
						$post_user_id = $('#post_user_id').val();
						$('#msg').val('');
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
					}	
				});
			/*****	*****/
		});
		
		function displayResult(){
			$id = $('#id').val();
			//alert($id);
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