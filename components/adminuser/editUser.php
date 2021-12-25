<?php
  
  // Retrieve Data
  $getID = $_GET['id'];
    
  $selectUsersQuery = "
                        SELECT users.*,
                        user_type.`id` AS user_type_id,
                        user_type.`user_type` AS user_type
                        FROM
                            `users`
                            INNER JOIN `user_type` 
                                ON (`users`.`user_type_id` = user_type_id)
                        WHERE users.id = '$getID'
                      "; 
  $data = fetchDataWithID($selectUsersQuery);   

  $user_type_id = $data['user_type_id'];
  $user_type = $data['user_type'];
  $name = $data['name'];
  $contact = $data['contact'];
  $address = $data['address'];
  $email = $data['email'];
  $username = $data['username'];
  $password = $data['password'];
  

  // define variables and set to empty values
  $user_typeErr = $userFullNameErr  = $contactErr = $emailErr = $addressErr = $usernameErr = $passwordErr = "";

  if (isset($_POST['editUser'])) {

    if (empty($_POST['user_type'])) {
      $userTypeErr = "User Type is required";
    } 
    else {
      $user_type = escape($_POST['user_type']);
    }

    if (empty($_POST["name"])) {
      $userFullNameErr = "User Full Name is required";
    } 
    else {
      $name = escape($_POST['name']);
    }
    
    if (empty($_POST['contact'])) {
      $contactErr = "Contact is required";
    } 
    else {
      $contact = escape($_POST['contact']);
    }

    if (empty($_POST["address"])) {
      $addressErr = "Address is required";
    } 
    else {
      $address = escape($_POST['address']);
    }

    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } 
    else {
      $email = escape($_POST['email']);
    }

    if (empty($_POST["username"])) {
      $usernameErr = "User Name is required";
    } 
    else {
      $username = escape($_POST['username']);
    }

    if (empty($_POST["password"])) {
      $passwordErr = "Password is required";
    } 
    else {
      $password = escape($_POST['password']);
    }
    
    if(!empty($_POST["user_type"]) && !empty($_POST["username"]) && !empty($_POST["password"])) {
      $editUserQuery = "
                        UPDATE users 
                        SET
                            user_type_id = '$user_type',
                            name = '$name',
                            contact = '$contact',
                            address = '$address',
                            email = '$email',
                            username = '$username',
                            password = '$password'
                        
                        WHERE id = '$getID'
                      ";

      $execQuery = query($editUserQuery);
      // header('location: register.php?err=0&msg=registered');
      $redirectpPage = 'dashboard.php?p=userList';
      header('Refresh: 1; URL='.$redirectpPage);
    }
  }
?>

<div class="right_col" role="main" style="min-height: 700px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Users LogIn Info</h3>
      </div>

      <div class="title_right">
        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
              <button class="btn btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Users Entry<small>User details</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form method="POST" action="" id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data">
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <?php
                  //print_r($editUserQuery);
                      if(isset($execQuery))
                      {
                    ?>
                      <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        User updated Successfully.
                      </div>
                  <?php
                      }
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Type</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="user_type">
                    <option value = "<?php  echo $user_type_id; ?>"><?php echo $user_type; ?></option>
                    <option value="">Choose user Type</option>
                  <?php 
                    $selectUserTypeQuery =  "
                                              SELECT * FROM user_type
                                            ";
                    $record = fetchData($selectUserTypeQuery);
                    foreach ($record as $data) 
                    {
                  ?>
                      <option value = "<?php  echo $data['id']; ?>"><?php echo $data['user_type']; ?></option>
                  <?php    
                    } 
                  ?>
                  </select>
                  <span class="error"><?php echo $user_typeErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Full Name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter User Full Name ...' value="<?php echo $name ;?>">
                  <span class="error"><?php echo $userFullNameErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact">Contact<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="contact" name="contact" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter Contact ...' value="<?php echo $contact ;?>">
                  <span class="error"><?php echo $contactErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter Email ...' value="<?php echo $email ;?>">
                  <span class="error"><?php echo $emailErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter Address ...'><?php echo $address ;?></textarea>
                  <span class="error"><?php echo $addressErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User Name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter User Name ...' value="<?php echo $username; ?>">
                  <span class="error"><?php echo $usernameErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="password" name="password" class="form-control" placeholder='Enter Password...' value="<?php echo $password; ?>">
                  <span class="error"><?php echo $passwordErr;?></span>
                </div>
              </div>

             <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="dashboard.php?p=userList" class="btn btn-dark">Back</a>
                  <button type="submit" name="editUser" class="btn btn-success pull-right">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   

  </div>
</div>