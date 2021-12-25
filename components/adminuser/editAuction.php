<?php
  // Retrieve Data
  $getID = $_GET['id'];
  $selectAuctionQuery =  "
                           SELECT auction.* ,
                            city.city_name as city_name,
                            category.category_name as category_name
                            FROM auction 
                            LEFT JOIN city
                            ON auction.city_id = city.id
                            LEFT JOIN category
                            ON auction.category_id = category.id
                          WHERE auction.id = '$getID'
                         "; 

  $data = fetchDataWithID($selectAuctionQuery);

                    $id = $data['id'];
                    $city_id = $data['city_id'];
                    $category_id = $data['category_id'];
                    $keyword = $data['keyword'];
                    $auction_title = $data['auction_title'];
                    $auction_desc = $data['auction_desc'];
                    $starting_date = $data['starting_date'];
                    $ending_date = $data['ending_date'];
                    $starting_price = $data['starting_price'];
                    $reserve_price = $data['reserve_price'];
                    $condition = $data['condition'];
                    $product_type = $data['product_type'];
                    $com_id = $data['com_id'];
                    $status = $data['status'];
                    $city_name = $data['city_name'];
                    $category_name = $data['category_name'];

                    // dump($data);



  // define variables and set to empty values
  $cityNameErr = $categoryNameErr = $keywordErr = $auctionTitleErr = $auctionDescErr = $startingDateErr = $endingDateErr = $startingPriceErr = $reservePriceErr = $conditionErr = $productTypeErr = $comIdErr = $statusErr = "";

  if (isset($_POST['editAuction'])) {

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

 if (empty($_POST["city_id"])) {
      $cityNameErr = "City Name is required";
    } 
    else {
      $city_id = escape($_POST['city_id']);
    }
    if (empty($_POST["category_id"])) {
      $categoryNameErr = "Category Name is required";
    } 
    else {
      $category_id = escape($_POST['category_id']);
    }
    if (empty($_POST["keyword"])) {
      $keywordErr = "Keyword is required";
    } 
    else {
      $keyword = escape($_POST['keyword']);
    }
    if (empty($_POST["auction_title"])) 
      {
        $auctionTitleErr = "Auction Title is required";
      } 
    else 
      {
        $auction_title = escape($_POST['auction_title']);
      }
      

    if (empty($_POST["auction_desc"])) {
      $auctionDescErr = "Auction Description is required";
    } 
    else {
      $auction_desc = escape($_POST['auction_desc']);
    }

    if (empty($_POST["starting_date"])) {
      $startingDateErr = "Sarting Date is required";
    } 
    else {
      $starting_date = escape($_POST['starting_date']);
    }
    if (empty($_POST["ending_date"])) {
      $endingDateErr = "Ending Date is required";
    } 
    else {
      $ending_date = escape($_POST['ending_date']);
    }
    if (empty($_POST["starting_price"])) {
      $startingPriceErr = "Starting Price is required";
    } 
    else {
      $starting_price = escape($_POST['starting_price']);
    }
    if (empty($_POST["reserve_price"])) {
      $reservePriceErr = "Reserve Price is required";
    } 
    else {
      $reserve_price = escape($_POST['reserve_price']);
    }
    if (empty($_POST["condition"])) {
      $conditionErr = "Condition is required";
    } 
    else {
      $condition = escape($_POST['condition']);
    }
    if (empty($_POST["product_type"])) {
      $productTypeErr = "Product Type is required";
    } 
    else {
      $product_type = escape($_POST['product_type']);
    }
    if (empty($_POST["com_id"])) {
      $comIdErr = "Com Id is required";
    } 
    else {
      $com_id = escape($_POST['com_id']);
    }

    if (empty($_POST["status"])) {
      $statusErr = "Status is required";
    } 
    else {
      $status = escape($_POST['status']);
    }

    
    if(!empty($city_id) && !empty($category_id) && !empty($keyword) && !empty($auction_title) && !empty($auction_desc) && !empty($starting_date) && !empty($ending_date) && !empty($starting_price) && !empty($reserve_price) && !empty($condition) && !empty($product_type) && !empty($com_id) && !empty($status)) {
        
      $editAuctionQuery = "
                              UPDATE `auction` 
                                SET
                                `city_id`='$city_id',
                                `category_id`='$category_id',
                                `keyword`='$keyword',
                                `auction_title`='$auction_title',
                                `auction_desc`='$auction_desc',
                                `starting_date`='$starting_date',
                                `ending_date`='$ending_date',
                                `starting_price`='$starting_price',
                                `reserve_price`='$reserve_price',
                                `condition`='$condition',
                                `product_type`='$product_type',
                                `com_id`='$com_id',
                                `status`='$status'
                                WHERE id = '$getID'
                            ";
      // dump($editAuctionQuery);

      $execQuery = query($editAuctionQuery);

      $redirectpPage = 'dashboard.php?p=auctionList';
      header('Refresh: 1; URL='.$redirectpPage);
    }
  }
  
?>
 <div class="right_col" role="main" style="min-height: 700px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Auction</h3>
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
                           Auction details Updated Successfully.
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keyword"> Keyword <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="keyword" name="keyword" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $keyword; ?>">
                  <span class="error"><?php echo $keywordErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="auction_title">Auction Title <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="auction_title" name="auction_title" required="required" class="form-control col-md-7 col-xs-12"  rows="1"><?php echo $auction_title; ?></textarea>
                  <span class="error"><?php echo $auctionTitleErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="auction_desc">Auction Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="auction_desc" name="auction_desc" required="required" class="form-control col-md-7 col-xs-12"  rows="10"><?php echo $auction_desc; ?></textarea>
                  <span class="error"><?php echo $auctionDescErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="starting_date"> Starting Date <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" id="starting_date" name="starting_date" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $starting_date; ?>">
                  <span class="error"><?php echo $startingDateErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ending_date"> Ending Date <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="date" id="ending_date" name="ending_date" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $ending_date; ?>">
                  <span class="error"><?php echo $endingDateErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="starting_price"> Starting Price <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="starting_price" name="starting_price" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $starting_price; ?>">
                  <span class="error"><?php echo $startingPriceErr;?></span>
                </div>
              </div>             
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="reserve_price"> Reserve Price <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="reserve_price" name="reserve_price" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $reserve_price; ?>">
                  <span class="error"><?php echo $reservePriceErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="condition"> Condition <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select id="condition" name="condition" required="required" class="form-control col-md-7 col-xs-12">
                    <option><?php echo $condition; ?></option>
                    <option>Good</option>
                    <option>Medium</option>
                    <option>Bad</option>
                    <option>Very Bad</option>
                  </select>
                  <!-- <input type="text" id="condition" name="condition" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $condition; ?>"> -->
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
<!--                   <select class="form-control" name="package">
                          <option><?php echo $package; ?></option>
                          <option>7 Mbps</option>
                          <option>12 Mbps</option>
                          <option>20 Mbps</option>
                  </select> -->
                  <!-- <input type="text" id="product_type" name="product_type" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $product_type; ?>"> -->
                  <span class="error"><?php echo $productTypeErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="com_id"> Company Id <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="com_id" name="com_id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $com_id; ?>">
                  <span class="error"><?php echo $comIdErr;?></span>
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
                  <a href="dashboard.php?p=auctionList" class="btn btn-dark">Cancel</a>
                  <button type="submit" name="editAuction" class="btn btn-success pull-right">Update</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>