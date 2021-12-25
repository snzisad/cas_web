<?php
  
  // define variables and set to empty values
  $user_typeErr = $userFullNameErr  = $contactErr = $emailErr = $addressErr = $usernameErr = $passwordErr = "";
  $user_type = $name = $contact = $address = $email = $username = $password = "";

  if (isset($_POST['addUser'])) {
    
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
      $addUserQuery = "
                        INSERT INTO `users`(
                            `user_type_id`, 
                            `name`, 
                            `contact`, 
                            `address`, 
                            `email`, 
                            `username`, 
                            `password`) 
                        VALUES (
                          '$user_type', 
                          '$name', 
                          '$contact',     
                          '$address',
                          '$email',
                          '$username',
                          '$password'
                                )
                      ";

      $execQuery = query($addUserQuery);
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
            <h2>Users Entry<small>User Login Information</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <form method="POST" action="" id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data">
            <a href="dashboard.php?p=userList" class="btn btn-dark"><i class="fa fa-plus-square-o"></i>&nbsp;User List</a>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <?php
                  //print_r($addUserQuery);
                      if(isset($execQuery))
                      {
                    ?>
                      <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        User added Successfully.
                      </div>
                  <?php
                      }
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Type<span class="required">*</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="user_type">
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
                  <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter User Full Name ...'>
                  <span class="error"><?php echo $userFullNameErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contact">Contact<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="contact" name="contact" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter Contact ...'>
                  <span class="error"><?php echo $contactErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter Email ...'>
                  <span class="error"><?php echo $emailErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="address" name="address" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter Address ...'></textarea>
                  <span class="error"><?php echo $addressErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="username">User Name<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="username" name="username" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter User Name ...'>
                  <span class="error"><?php echo $usernameErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="password" id="password" name="password" class="form-control" placeholder='Enter Password...'>
                  <span class="error"><?php echo $passwordErr;?></span>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="addUser" class="btn btn-success pull-right">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
   

  </div>
</div>