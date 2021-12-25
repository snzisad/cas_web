<?php

	include 'core/dbe.inc.php';

	if(isset($_POST['login'])) {
			session_start();
			//variables 
			$users 		=	$_POST['userName'];
			$password 	= 	$_POST['userPassword'];
			$user_type_id 	= 	$_POST['user_type_id'];

			$select = "SELECT * FROM `users` WHERE `username`='$users' AND `password`='$password' AND `user_type_id`='$user_type_id' ";
			$data = fetchDataWithID($select);

			$row_num = login($select);
    
           if ( $row_num  > 0 ){
					header('location: index.php');

					

					$_SESSION['userName'] = $users;
					$_SESSION['uid'] = $data['id'];
					$_SESSION['loggedIn'] = TRUE;

					if($user_type_id == '3') {
						$_SESSION['userTypeCompany'] = TRUE;
					}
					if($user_type_id == '2') {
						$_SESSION['userTypeUsers'] = TRUE;
					}

					$sessID = $_SESSION['uid'];

					$query = "
                				INSERT INTO `online_users`(`userid`) VALUES ('$sessID')
				            "; 
				  	// dump($query, TRUE);
				  	query($query);
           }
           else{
				header('location: login.php?err=1&msg=Failed');
           }	
    }
?>

<!DOCTYPE html>
<html>

<head>
	<title>Classsified Auction System</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

	<script type="application/x-javascript"> 
		addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
	</script>
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

<style type="text/css">
	.login-select {
	    margin-bottom: 25px;
	    padding: 8px;
	    width: 98%;
	}
</style>
</head>
<body>

	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="index.php"><span>Classsified</span> Auction System</a>
			</div>
			<div class="header-right">
				<a class="account" href="login.php">My Account</a>
				<!-- <span class="active uls-trigger">Select language</span> -->
				<!-- Large modal -->
				<div class="selectregion">
					<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
					Select Your Region</button>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
					aria-hidden="true">
						<div class="modal-dialog modal-lg">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;</button>
									<h4 class="modal-title" id="myModalLabel">
										Please Choose Your Location</h4>
								</div>
								<div class="modal-body">
								 <form class="form-horizontal" role="form">
									<div class="form-group">
										<select id="basic2" class="show-tick form-control" multiple>

											<optgroup label="Bangladesh">
												<optgroup label="Chittagong">
													<option>Chittagong</option>
													<option>Rangamati</option>
													<option>Rauzan</option>
													<option>Cox's Bazar</option>
													<option>Sitakund</option>
												</optgroup>
												<optgroup label="Dhaka">
													<option>Mirpur</option>
													<option>Naraongong</option>
													<option>Gazipur</option>
												</optgroup>		
											</optgroup>
										</select>
									</div>
								  </form>    
								</div>
							</div>
						</div>
					</div>
					<script>
						$('#myModal').modal('');
					</script>
				</div>
			</div>
		</div>
	</div>

 	<section>
		<div id="page-wrapper" class="sign-in-wrapper">
			<div class="graphs">
				<div class="sign-in-form">
					<div class="sign-in-form-top">
						<h1>Log in</h1>
					</div>
					<div class="signin">
						<div class="signin-rit">
							<span class="checkbox1">
								 <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Forgot Password ?</label>
							</span>
							<p><a href="#">Click Here</a> </p>
							<div class="clearfix"> </div>
						</div>
						<form method="POST" action="">
							<div class="log-input">
				              	<?php
			                        if(isset($_GET['msg'])){
			                         ?>
			                         <div class="form-error alert alert-danger">
			                            Invalid Username or Password!
			                         </div>
			                         <br>
			                    <?php 
			                    }
			                    ?>
			              </div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" name="userName" class="user" value="Your User Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Your User Name';}"/>
								</div>
								<!-- <span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span> -->
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" name="userPassword" class="lock" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/>
								</div>
								<!-- <span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span> -->
								<div class="clearfix"> </div>
							</div>

							<div class="log-input">
								<div class="log-input-left">
									<select name="user_type_id" class="login-select">
										<option value="">-- Select Type </option>	
										<option value="2"> User </option>	
										<option value="3"> Company </option>	
								   	</select>
								</div>
								
								<div class="clearfix"> </div>
							</div>

							<input type="submit" name="login" value="Log in">
					</form>	 
					</div>
					<div class="new_people">
						<h2>For New People</h2>
						<p>Having hands on experience in creating innovative designs,I do offer design 
							solutions which harness.</p>
						<a href="register.php">Register Now!</a>
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
</body>

</html>