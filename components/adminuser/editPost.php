<?php
  // Retrieve Data
  $getID = $_GET['id'];
  $selectAuctionQuery =  "
                           SELECT post.* ,
                            city.city_name as city_name,
                            category.category_name as category_name
                            FROM post 
                            LEFT JOIN city
                            ON post.city_id = city.id
                            LEFT JOIN category
                            ON post.category_id = category.id
                          WHERE post.id = '$getID'
                         "; 

  $data = fetchDataWithID($selectAuctionQuery);

                    $id = $data['id'];
                    $post_time = $data['post_time'];
                    $city_id = $data['city_id'];
                    $location = $data['location'];
                    $category_id = $data['category_id'];
                    $post_title = $data['post_title'];
                    $post_desc = $data['post_desc'];
                    $condition1 = $data['condition1'];
                    $product_type = $data['product_type'];
                    $price = $data['price'];
                    $name = $data['name'];
                    $mobile = $data['mobile'];
                    $email = $data['email'];
                    $userid = $data['userid'];
                    $status = $data['status'];
                    $city_name = $data['city_name'];
                    $category_name = $data['category_name'];

                    // dump($data);



  // define variables and set to empty values
  $postTimeErr = $cityNameErr = $locationErr = $categoryNameErr = $postTitleErr = $postDescErr = $conditionErr = $productTypeErr = $priceErr = $nameErr = $mobileErr = $emailErr = $userIdErr = $statusErr = "";

  if (isset($_POST['editPost'])) {

    // $city_id = $_POST['city_id'];
    // $category_id = $_POST['category_id'];
    // $keyword= $_POST['keyword'];
    // $auction_title= $_POST['auction_title'];
    // $auction_desc= $_POST['auction_desc'];
    // $starting_date= $_POST['starting_date'];
    // $ending_date= $_POST['ending_date'];
    // $starting_price= $_POST['starting_price'];
    // $reserve_price= $_POST['reserve_price'];
    // $condition= $_POST['condition'];
    // $product_type= $_POST['product_type'];
    // $com_id= $_POST['com_id'];
    // $status= $_POST['status'];

    // dump($_POST['status']);
    // if (empty($_POST["post_time"])) {
    //   $postTimeErr = "Post Time is required";
    // } 
    // else {
    //   $post_time = escape($_POST['post_time']);
    // }


    if (empty($_POST["city_id"])) {
      $cityNameErr = "City Name is required";
    } 
    else {
      $city_id = escape($_POST['city_id']);
    }

    if (empty($_POST["location"])) {
      $locationErr = "Location is required";
    } 
    else {
      $location = escape($_POST['location']);
    }

    if (empty($_POST["category_id"])) {
      $categoryNameErr = "Category Name is required";
    } 
    else {
      $category_id = escape($_POST['category_id']);
    }

    if (empty($_POST["post_title"])) 
      {
        $postTitleErr = "Post Title is required";
      } 
    else 
      {
        $post_title = escape($_POST['post_title']);
      }
      

    if (empty($_POST["post_desc"])) {
      $postDescErr = "Post Description is required";
    } 
    else {
      $post_desc = escape($_POST['post_desc']);
    }

    if (empty($_POST["condition1"])) {
      $conditionErr = "Condition is required";
    } 
    else {
      $condition1 = escape($_POST['condition1']);
    }
    if (empty($_POST["product_type"])) {
      $productTypeErr = "Product Type is required";
    } 
    else {
      $product_type = escape($_POST['product_type']);
    }
    if (empty($_POST["price"])) {
      $priceErr = "Price is required";
    } 
    else {
      $price = escape($_POST['price']);
    }
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } 
    else {
      $name = escape($_POST['name']);
    }
    if (empty($_POST["mobile"])) {
      $mobileErr = "Mobile No is required";
    } 
    else {
      $mobile = escape($_POST['mobile']);
    }
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } 
    else {
      $email = escape($_POST['email']);
    }
    // if (empty($_POST["userid"])) {
    //   $userIdErr = "User Id is required";
    // } 
    // else {
    //   $userid = escape($_POST['userid']);
    // }

    if (empty($_POST["status"])) {
      $statusErr = "Status is required";
    } 
    else {
      $status = escape($_POST['status']);
    }

    if(!empty($city_id) && !empty($location) && !empty($category_id) && !empty($post_title) && !empty($post_desc) && !empty($condition1) && !empty($product_type) && !empty($price) && !empty($name) && !empty($mobile) && !empty($email) && !empty($userid) && !empty($status)) {
        
      $editPostQuery = "
                        UPDATE `post` SET 
                              `city_id`='$city_id',
                              `location`='$location',
                              `category_id`='$category_id',
                              `post_title`='$post_title',
                              `post_desc`='$post_desc',
                              `condition1`='$condition1',
                              `product_type`='$product_type',
                              `price`='$price',
                              `name`='$name',
                              `mobile`='$mobile',
                              `email`='$email',
                              `status`='$status'
                               WHERE id = '$getID'
                            ";
      // dump($editAuctionQuery);

      $execQuery = query($editPostQuery);

      $redirectpPage = 'dashboard.php?p=postList';
      header('Refresh: 1; URL='.$redirectpPage);
    }
  }
  
?>
 <div class="right_col" role="main" style="min-height: 700px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Post</h3>
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
            <h2>Update</h2>
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
            <form id="demo-form2" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="">
             <!-- Successful Message -->
              <div class="form-group">
                 <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <?php
                        if(isset($execQuery))
                        {
                      ?>
                        <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                           Post details Updated Successfully.
                        </div>
                    <?php
                        }
                    ?>
                  </div>
              </div>
              <!--City Name-->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >City Name <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="selectCity_single form-control" name="city_id">
                   <option value="<?php echo $city_id; ?>"><?php echo $city_name; ?></option>
                    <?php 
                        $selectCityQuery = "SELECT * FROM city";
                        $record = fetchData($selectCityQuery);
                        foreach ($record as $data) 
                        {
                           ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['city_name']; ?></option>
                           <?php    
                        } 
                    ?>
                  </select>
                  <span class="error"><?php echo $cityNameErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="location"> Location <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="location" name="location" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $location; ?>">
                  <span class="error"><?php echo $locationErr;?></span>
                </div>
              </div>
              <!--Category Name-->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Category Name <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="selectCategory_single form-control" name="category_id">
                   <option value="<?php echo $category_id; ?>"><?php echo $category_name; ?></option>
                    <?php 
                        $selectCategoryQuery = "SELECT * FROM category";
                        $record = fetchData($selectCategoryQuery);
                        foreach ($record as $data) 
                        {
                           ?>
                            <option value="<?php echo $data['id'] ?>"><?php echo $data['category_name']; ?></option>
                           <?php    
                        } 
                    ?>
                  </select>
                  <span class="error"><?php echo $categoryNameErr;?></span>
                </div>
              </div>
              <!--Product Name-->
<!--               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productName">Product Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="productName" name="productName" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $productName; ?>">
                  <span class="error"><?php echo $productNameErr;?></span>
                </div>
              </div> -->



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="post_title">Post Title <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="post_title" name="post_title" required="required" class="form-control col-md-7 col-xs-12"  rows="1"><?php echo $post_title; ?></textarea>
                  <span class="error"><?php echo $postTitleErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="post_desc">Post Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="post_desc" name="post_desc" required="required" class="form-control col-md-7 col-xs-12"  rows="10"><?php echo $post_desc; ?></textarea>
                  <span class="error"><?php echo $postDescErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="condition1">Product Condition <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="condition1" name="condition1" required="required" class="form-control col-md-7 col-xs-12">
                    <option><?php echo $condition1; ?></option>
                    <option>Good</option>
                    <option>Medium</option>
                    <option>Bad</option>
                    <option>Very Bad</option>
                  </select>
                  <span class="error"><?php echo $conditionErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="product_type"> Product Type <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="product_type" required="required" class="form-control col-md-7 col-xs-12">
                    <option><?php echo $product_type; ?></option>
                    <option>Fixed Price</option>
                    <option>Negotiable</option>
                  </select>
                  <span class="error"><?php echo $productTypeErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price"> Price <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $price; ?>">
                  <span class="error"><?php echo $priceErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $name; ?>">
                  <span class="error"><?php echo $nameErr;?></span>
                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="mobile"> Mobile <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="mobile" name="mobile" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $mobile; ?>">
                  <span class="error"><?php echo $mobileErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email"> Email <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $email; ?>">
                  <span class="error"><?php echo $emailErr;?></span>
                </div>
              </div>              

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="status"> Status <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="status" name="status" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $status; ?>">
                  <span class="error"><?php echo $statusErr;?></span>
                </div>
              </div>
                         
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <a href="dashboard.php?p=postList" class="btn btn-dark">Cancel</a>
                  <button type="submit" name="editPost" class="btn btn-success pull-right">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>