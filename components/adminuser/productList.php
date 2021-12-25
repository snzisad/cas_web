
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