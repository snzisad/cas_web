<?php
  
  // define variables and set to empty values
  $city_nameErr = "";

  if (isset($_POST['addCity'])) {
    
    $division = escape($_POST['division']);
    // }

    if (empty($_POST["city_name"])) {
      $city_nameErr = "City Name is required";
    } 
    else {
      $city_name = escape($_POST['city_name']);
    }
    
    if( !empty($_POST["city_name"]) ) {
      $addCityQuery = "
                            INSERT INTO city (city_name, division) 
                            VALUES ('$city_name', '$division')
                          ";

      $execQuery = query($addCityQuery);

      $redirectpPage = 'dashboard.php?p=cityList';
      header('Refresh: 1; URL='.$redirectpPage);
    }
  }

?>

<div class="right_col" role="main" style="min-height: 700px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>City</h3>
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
            <h2>New Entry
              <small>
                <a href="dashboard.php" >&nbsp;Dashboard / </a>
                <a href="dashboard.php?p=cityList" >&nbsp;City / </a>
              </small>
            </h2>
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
              <a href="dashboard.php?p=cityList" class="btn btn-dark"><i class="fa fa-plus-square-o"></i>&nbsp;City List</a>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <?php
                      if(isset($execQuery))
                      {
                    ?>
                      <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        City added Successfully.
                      </div>
                  <?php
                      }
                  ?>
                  <!-- New Added -->
                  <?php
                      if(isset($_GET['Error']))
                      {
                    ?>
                      <div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                        </button>
                        Error!!! It is Used in Product!!! Delete the Product First
                      </div>
                  <?php
                      }
                  ?>
                  <!-- /New Added -->
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Division</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="division">
                    <option value="">Select Division</option>
                    
                    <option value="BARISHAL">BARISHAL</option>
                    <option value="CHITTAGONG">CHITTAGONG</option>
                    <option value="DHAKA">DHAKA</option>
                    <option value="KHULNA">KHULNA</option>
                    <option value="MYMENSINGH">MYMENSINGH</option>
                    <option value="RAJSHAHI">RAJSHAHI</option>
                    <option value="RANGPUR">RANGPUR</option>
                    <option value="SYLHET">SYLHET</option>
                  </select>
                 
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="city_name">City Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="city_name" name="city_name" required="required" class="form-control col-md-7 col-xs-12" placeholder='City Name ...'>
                  <span class="error"><?php echo $city_nameErr;?></span>
                </div>
              </div>
              
              
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="addCity" class="btn btn-success pull-right">Save</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>