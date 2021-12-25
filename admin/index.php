<?php 
    include '../core/dbe.inc.php'; 
	session_start();
?>
<?php

	if(isset($_POST['login'])) {
			//variables 
			$users 		  =	$_POST['userName'];
			$password 	= $_POST['userPassword'];

			$select = "SELECT * FROM `users` WHERE `userName`='$users' AND `password`='$password' AND user_type_id = '1' ";

			$row_num = login($select);
    
      if( $row_num  > 0 ) {
          
        $_SESSION['userName']=$users;
        header('location: dashboard.php');
        
      }
      else {
          if (!headers_sent()) {
              header_remove();
            }
            header('location: index.php?err=1&msg=Failed');
      }	
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CAS! | Admin - Login </title>

    <!-- Bootstrap -->
    <link href="../public/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../public/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../public/admin/css/custom.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST">
              <h1>Login Form</h1>
              <div>
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
              <div>
                <input type="text" id="userName" class="form-control" name = "userName" placeholder="Enter Username" required="1">
              </div>
              <div>
                <input type="password" class="form-control" id="userPassword" name="userPassword" placeholder="Enter Password" required="1">
              </div>
              <div>
                <button type="submit" name="login" class="btn btn-success submit pull-right" id = "login">Log In</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Classified Auction System!</h1>
                  <p>©2017 All Rights Reserved. Classified Auction System!. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>