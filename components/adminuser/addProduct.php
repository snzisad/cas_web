<?php
  
  // define variables and set to empty values
  $categoryNameErr = $productNameErr = $priceErr = $conditionErr = $descriptionErr = "";
  $categoryID = $productName = $price = $condition = $description = "";

  if (isset($_POST['addProduct'])) {
    $categoryID= $_POST['categoryID'];
    $productName= $_POST['productName'];
    $price= $_POST['price'];
    $condition= $_POST['condition'];
    $description= $_POST['description'];

    if (empty($categoryID)) {
      $categoryNameErr = "Category Name is required";
    } 
    else {
      $categoryID = escape($categoryID);
    }

    if (empty($productName)) {
      $productNameErr = "Product Name is required";
    } 
    else {
      $productName = escape($productName);
    }

    if (empty($price)) {
      $priceErr = "Price is required";
    } 
    else {
      $price = escape($price);
    }

    if (empty($condition)) {
      $conditionErr = "Condition is required";
    } 
    else {
      $condition = escape($condition);
    }

    if (empty($description)) {
      $descriptionErr = "Description is required";
    } 
    else {
      $description = escape($description);
    }
    
    if(!empty($categoryID) && !empty($productName) && !empty($price) && !empty($condition) && !empty($description)) {
        
      $addProductQuery = "
                              INSERT INTO product (category_categoryID, productName, price, p_condition, description) 
                              VALUES ('$categoryID', '$productName', '$price', '$condition', '$description')
                            ";

      $execQuery = query($addProductQuery);
    }
  }

?>
 <div class="right_col" role="main" style="min-height: 700px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Product</h3>
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
                <a href="dashboard.php" >&nbsp;Dashboard / </a> Product
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
              <div class="form-group">
                   <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <?php
                          if(isset($execQuery))
                          {
                        ?>
                          <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                             Product Name added Successfully.
                          </div>
                      <?php
                          }
                      ?>
                    </div>
               </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Category Name <span class="required">*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="selectCategory_single form-control" name="categoryID">
                    <option value="">Select Category</option>
                    <?php 
                        $selectCategoryQuery = "SELECT * FROM category";
                        $record = fetchData($selectCategoryQuery);
                        foreach ($record as $data) 
                        {
                           ?>
                            <option value="<?php echo $data['categoryID'] ?>"><?php echo $data['categoryName']; ?></option>
                           <?php    
                        } 
                    ?>
                  </select>
                  <span class="error"><?php echo $categoryNameErr;?></span>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="productName">Product Name <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="productName" name="productName" required="required" class="form-control col-md-7 col-xs-12" placeholder='Product Name ...'>
                  <span class="error"><?php echo $productNameErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="price"> Price <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="price" name="price" required="required" class="form-control col-md-7 col-xs-12" placeholder='Price ...'>
                  <span class="error"><?php echo $priceErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="condition"> Condition <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="condition" name="condition" required="required" class="form-control col-md-7 col-xs-12" placeholder='Condition ...'>
                  <span class="error"><?php echo $conditionErr;?></span>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea id="description" name="description" required="required" class="form-control col-md-7 col-xs-12" placeholder='Description ...' rows="10"></textarea>
                  <span class="error"><?php echo $descriptionErr;?></span>
                </div>
              </div>

              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <!-- <a href="dashboard.php" class="btn btn-dark">Back</a> -->
                  <button type="submit" name="addProduct" class="btn btn-success pull-right">Save</button>
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
            <h2>Product List</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li> -->
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Product Name</th>
                  <th>Price</th>
                  <th>Condition</th>
                  <th>Description</th>
                  <th>Action</th>                         
                </tr>
              </thead>

              <tbody>
              <?php
                $selectProductQuery =  "
                                          SELECT product.productID, product.productName, product.price, product.p_condition, product.description, category.categoryName
                                          FROM product
                                          LEFT JOIN category
                                          ON product.category_categoryID = category.categoryID;
                                        "; 
                $record = fetchData($selectProductQuery);

                foreach ($record as $data) {
                $productID = $data['productID'];

              ?>
                <tr>
                  <td class=" "><?php echo $data['categoryName'];; ?></td>
                  <td class=" "><?php echo $data['productName']; ?></td>
                  <td class=" "><?php echo $data['price']; ?></td>
                  <td class=" "><?php echo $data['p_condition']; ?></td>
                  <td class=" "><?php echo $data['description']; ?></td>
                  <td class=" last">
                    <a href="dashboard.php?p=editProduct&id=<?php echo $productID; ?>"><i class="fa fa-edit"></i>&nbsp; Edit
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href="dashboard.php?p=delProduct&id=<?php echo $productID; ?>"><i class="fa fa-times"></i>&nbsp; Delete
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