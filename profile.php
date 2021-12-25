<?php include 'core/dbe.inc.php';?>
<?php include 'core/core.inc.php';?>

<?php
  
  // Retrieve Data
	session_start(); 
  	$getID = $_SESSION['uid'];
    
  	$selectUsersQuery = "
                        SELECT users.*, user_type.`id` AS user_type_id, user_type.`user_type` AS user_type FROM `users` 
						LEFT JOIN `user_type` 
						ON `users`.`user_type_id` = user_type.id
                        WHERE users.id = '$getID'
                      "; 
  	$data = fetchDataWithID($selectUsersQuery); 

  	// dump($data, true);

  	$id = $data['id'];
  	$user_type_id = $data['user_type_id'];
	$user_type = $data['user_type'];
	$name = $data['name'];
	$contact = $data['contact'];
	$address = $data['address'];
	$email = $data['email'];
	$username = $data['username'];
	$password = $data['password'];
	$nid = $data['nid'];
	$status = $data['status'];

	// dump($email, true);

	  // define variables and set to empty values
	  // $emailErr = $userNameErr = $passwordErr = $nidErr = $nidExistErr = "";
	  // $email = $userName = $password = $nid = "";

		if (isset($_POST['profile'])) {
		    
		    // $userTypeID = $_POST["user_type_id"];
		    $name = $_POST["name"];
		    $contact = $_POST["contact"];
		    $address = $_POST["address"];
		    

		    // if (empty($_POST["userName"])) {
		    //   $userNameErr = "User Name is required";
		    // } 
		    // else {
		    //   $userName = escape($_POST['userName']);
		    // }

		    // if (empty($_POST["password"])) {
		    //   $passwordErr = "Password is required";
		    // } 
		    // else {
		    //   $password = escape($_POST['password']);
		    // }

		    if (empty($_POST["email"])) {
		      $emailErr = "Email is required";
		    } 
		    else {
		      $email = escape($_POST['email']);
		    }

		    // if (empty($_POST["nid"])) {
		    //   $nidErr = "NID is required";
		    // } 
		    // else {
		    //   $nid = escape($_POST['nid']);
		    // }

		    // $select = "SELECT * FROM `users` WHERE `nid`='$nid' ";

			// $row_num = login($select);
		    
		   // if ( $row_num  > 0 ){
		   // 		// $nidExistErr = "NID already exists, try another ..!";
		   // 		header('location: register.php?err=1&msg1=Failed');
		   // }
		   // else {
			   	if(!empty($_POST["name"]) && !empty($_POST["contact"]) && !empty($_POST["address"]) && !empty($_POST["email"])) {
			      	
			      	$editUserQuery = "
                        UPDATE users 
                        SET                         
                            name = '$name',
                            contact = '$contact',
                            address = '$address',
                            email = '$email'                      
                        WHERE id = '$id'
                      ";
                    // dump($editUserQuery, true);
      				$execQuery = query($editUserQuery);

			      	header('location: profile.php?err=0&msg=updated');
			    }
		   // }  
		}

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
	<style type="text/css">
		.login-select {
		    margin-bottom: 25px;
		    padding: 8px;
		    width: 98%;
		}
	</style>
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
						<!-- <h1>My Profile</h1> -->
						<!-- <p class="creating">Create an account at Classified Auction System.</p> -->
						<h1>My Profile</h1>

						<form method="POST" action="">
						
						<div class="sign-u">
			                <?php
			                        if(isset($_GET['msg'])){
	                         ?>
				                         <div class="form-error alert alert-success">
				                            Profile Updated Successfully!
				                         </div>
				                         <br>
			                    <?php 
				                    }
				                    if(isset($_GET['msg1'])){
	                         ?>
				                         <div class="form-error alert alert-danger">
				                           NID already exists, try another ..!
				                         </div>
				                         <br>
			                    <?php 
				                    }
			                    ?>
			                  
		              </div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Picture* :</h4>
							</div>
							<div class="sign-up2" style="text-align: center;">
							
									<img src="public/images/profile-image-2.png" style="width: 200px; height: 200px;">
							
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>Name* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="name" value="<?php echo $name;?>" required="1"/>
							
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Contact* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="contact" value="<?php echo $contact;?>" required="1"/>
							
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Address* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="address" value="<?php echo $address;?>" required="1"/>
							
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Username* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="userName" value="<?php echo $username;?>"  disabled/>
							
							</div>
							<div class="clearfix"> </div>
						</div>
						<!-- <div class="sign-u">
							<div class="sign-up1">
								<h4>Password* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="password" name="password" placeholder="Password" required="1"/>
								
							</div>
							<div class="clearfix"> </div>
						</div> -->
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Email* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="email" value="<?php echo $email;?>" required="1"/>
							
							</div>
							<div class="clearfix"> </div>
						</div>

						<div class="sign-u">
							<div class="sign-up1">
								<h4>NID* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="nid" value="<?php echo $nid;?>"  disabled/>
							
							</div>
							<div class="clearfix"> </div>
						</div>

						<!-- <div class="sign-u">
							<div class="sign-up1">
								<h4>User Type* :</h4>
							</div>
							<div class="sign-up2">
							
								<select name="user_type_id" class="login-select">
									<option value="">-- Select Type </option>	
									<option value="2"> User </option>	
									<option value="3"> Company </option>	
							   	</select>
							
							</div>
							<div class="clearfix"> </div>
						</div> -->

						<!-- <div class="log-input">
							<div class="log-input-left">
								<select name="user_type_id" class="login-select">
									<option value="">-- Select Type </option>	
									<option value="2"> User </option>	
									<option value="3"> Company </option>	
							   	</select>
							</div>
							
							<div class="clearfix"> </div>
						</div> -->
						<div class="sub_home">
							<div class="sub_home_left">
								
									<input type="submit" name="profile" value="Update">
								
							</div>
							<div class="sub_home_right">
								<p>Go Back to <a href="index.php">Home</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						</form>
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