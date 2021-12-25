<?php
  
  // Retrieve Data
  $getID = $_GET['id'];
    
  $selectCategoryQuery = "
                          SELECT * FROM category WHERE id = '$getID'
                         ";
  $data = fetchDataWithID($selectCategoryQuery);   
  $categoryName = $data['category_name'];
  $PID = $data['pid'];

  $selectPCatagoryID = "SELECT * FROM `category` WHERE `id` = '$PID'";
  $rows = fetchDataWithID($selectPCatagoryID);

  if(empty($rows))
  {
    $parentCategoryName = 'Main Category';
    $paerntCategoryID = 0;
  }
  else
  {
    $parentCategoryName = $rows['category_name'];
    $paerntCategoryID = $rows['id'];
  }

  
  // define variables and set to empty values
  $PIDErr = $categoryNameErr = "";

  if (isset($_POST['editCategory'])) {

    // if (empty($_POST['PID'])) {
    //   $PIDErr = "Parent ID required";
    // } 
    // else {
      $PID = escape($_POST['PID']);
    // }

    if (empty($_POST["categoryName"])) {
      $categoryNameErr = "Category Name is required";
    } 
    else {
      $categoryName = escape($_POST['categoryName']);
    }
    
    if(!empty($_POST["categoryName"]) ) {
      $editCategoryQuery = "
                              UPDATE category 
                              SET category_name = '$categoryName',
                                  pid = '$PID'
                              WHERE id = '$getID'
                            ";

      $execQuery = query($editCategoryQuery);
      
      $redirectpPage = 'dashboard.php?p=categoryList';
      header('Refresh: 1; URL='.$redirectpPage);
    }
  }
?>
<div class="right_col" role="main" style="min-height: 700px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Category</h3>
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
            <h2>Update Category<small>Category details</small></h2>
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
                        Category updated Successfully.
                      </div>
                  <?php
                      }
                  ?>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent Category</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="form-control" name="PID">
                    <option value="<?php echo $paerntCategoryID; ?>"><?php  echo $parentCategoryName; ?></option>
                    <option value="">Select Parent Category</option>
                    <?php 
                      $selectCategoryQuery = "
                                        SELECT * FROM category
                                       ";
                      $record = fetchData($selectCategoryQuery);
                      foreach ($record as $data) 
                      {
                    ?>
                        <option value="<?php  echo $data['id']; ?>"><?php  echo $data['category_name']; ?></option>
                    <?php    
                      } 
                    ?>
                  </select>
                  <span class="error"><?php echo $PIDErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryName">Category Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="categoryName" name="categoryName" required="required" class="form-control col-md-7 col-xs-12" placeholder='Dealer Name ...' value="<?php echo $categoryName;?>">
                  <span class="error"><?php echo $categoryNameErr;?></span>
                </div>
              </div>

              <!-- <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categoryDescription">Category Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea class="form-control" rows="3" id="categoryDescription" name="categoryDescription" placeholder='Category Description  ...'></textarea>
                </div>
              </div> -->
              
              
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="dashboard.php?p=addCategory" class="btn btn-dark">Back</a>
                  <button type="submit" name="editCategory" class="btn btn-success pull-right">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>