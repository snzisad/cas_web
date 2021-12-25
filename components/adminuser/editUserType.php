<?php
  
  // Retrieve Data
  $getID = $_GET['id'];
    
  $selectUserTypeQuery = "
                          SELECT * FROM user_type WHERE id = '$getID'
                         ";
  $data = fetchDataWithID($selectUserTypeQuery);   
  $id = $data['id'];
  $userType = $data['user_type'];

  // define variables and set to empty values
  $userTypeErr = "";

  if (isset($_POST['editUserType'])) {

    if (empty($_POST['userType'])) {
      $userTypeErr = "User Type is required";
    } 
    else {
      $userType = escape($_POST['userType']);
    }
    
    if(!empty($_POST["userType"])) {
      $editUserTypeQuery =  "
                              UPDATE user_type
                              SET user_type = '$userType'
                              WHERE id = '$getID'
                            ";

      $execQuery = query($editUserTypeQuery);
      
      $redirectpPage = 'dashboard.php?p=addUserType';
      header('Refresh: 1; URL='.$redirectpPage);
    }
  }
?>
<div class="right_col" role="main" style="min-height: 700px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>User Type</h3>
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
            <h2>Update User Type<small>User Type details</small></h2>
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
                      if(isset($execQuery))
                      {
                    ?>
                      <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        User Type updated Successfully.
                      </div>
                  <?php
                      }
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="userType">User Type <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="userType" name="userType" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter User Type ...' value="<?php echo $userType; ?>">
                  <span class="error"><?php echo $userTypeErr;?></span>
                </div>
              </div>

             <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="dashboard.php?p=addUserType" class="btn btn-dark">Back</a>
                  <button type="submit" name="editUserType" class="btn btn-success pull-right">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>