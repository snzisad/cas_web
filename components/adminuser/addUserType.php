<?php
  
  // define variables and set to empty values
  $userTypeErr = "";
  $userType = "";

  if (isset($_POST['addUserType'])) {

    if (empty($_POST['userType'])) {
      $userTypeErr = "User Type is required";
    } 
    else {
      $userType = escape($_POST['userType']);
    }
    
    if(!empty($_POST["userType"])) {
      $addUserTypeQuery = "
                            INSERT INTO user_type (user_type) 
                            VALUES ('$userType')
                          ";

      $execQuery = query($addUserTypeQuery);
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
            <h2>User Type Entry<small>User Type For Login</small></h2>
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
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <?php
                    if(isset($execQuery))
                    {
                  ?>
                    <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      User Type added Successfully.
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
                  <input type="text" id="userType" name="userType" required="required" class="form-control col-md-7 col-xs-12" placeholder='Enter User Type ...'>
                  <span class="error"><?php echo $userTypeErr;?></span>
                </div>
              </div>

             <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="addUserType" class="btn btn-success pull-right">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>User Type <small>User Type Details</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>User Type</th>
                  <th>Action</th>                         
                </tr>
              </thead>


              <tbody>
              <?php
                $selectUserTypeQuery =  "
                                          SELECT * FROM user_type
                                        "; 
                $record = fetchData($selectUserTypeQuery);

                foreach ($record as $data) {
                  $id = $data['id'];
              ?>
                <tr>
                  <td class=" "><?php echo $data['user_type']; ?></td>
                   <td class=" last">
                    <a href="dashboard.php?p=editUserType&id=<?php echo $id; ?>"><i class="fa fa-edit"></i>&nbsp; Edit
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href="dashboard.php?p=delUserType&id=<?php echo $id; ?>"><i class="fa fa-times"></i>&nbsp; Del
                    </a>
                  </td>
                </tr>
              <?php
                }
              ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>