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
            <h2>Post List 
              <small><a href="dashboard.php" >&nbsp;Dashboard / </a>
              <a href="dashboard.php?p=postList" >&nbsp;Post / </a>
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
            <!-- <a href="dashboard.php?p=addCategory" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp;New Auction Entry</a> -->
            <div class="table-responsive">
              <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Id </th>
                    <!-- <th class="column-title">Post Time</th> -->
                    <th class="column-title">City</th>
                    <th class="column-title">Location </th>
                    <th class="column-title">Category </th>
                    <!-- <th class="column-title">Post Title </th> -->
                    <!-- <th class="column-title">Post Description </th> -->
                    <th class="column-title">Condition </th>
                    <th class="column-title">Product Type </th>
                    <th class="column-title">Price </th>
                    <th class="column-title">Name </th>
                    <th class="column-title">Mobile </th>
                    <!-- <th class="column-title">Email</th> -->
                    <th class="column-title">UserId</th>
                    <th class="column-title">Status</th>
                    
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                <?php
                  $selectPostQuery = "
                                          SELECT post.*, 
                                            city.city_name AS city_name, 
                                            category.category_name AS category_name
                                          FROM post
                                          LEFT JOIN city
                                          ON post.city_id = city.id
                                          LEFT JOIN category
                                          ON post.category_id = category.id
                                         "; 
                  $record = fetchData($selectPostQuery);

                  foreach ($record as $data) {

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
                                         
  
                ?>
                  <tr class="even pointer">
                    <td class=" "><?php echo $id; ?></td>
                    <!-- <td class=" "><?php echo $post_time; ?></td> -->
                    <td class=" "><?php echo $city_name; ?></td>
                    <td class=" "><?php echo $location; ?></td>
                    <td class=" "><?php echo $category_name; ?></td>
                    <!-- <td class=" "><?php echo $post_title; ?></td> -->
                    <!-- <td class=" "><?php echo $post_desc; ?></td> -->
                    <td class=" "><?php echo $condition1; ?></td>
                    <td class=" "><?php echo $product_type; ?></td>
                    <td class=" "><?php echo $price; ?></td>
                    <td class=" "><?php echo $name; ?></td>
                    <td class=" "><?php echo $mobile; ?></td>
                    <!-- <td class=" "><?php echo $email; ?></td> -->
                    <td class=" "><?php echo $userid; ?></td>
                    <td class=" "><?php echo $status; ?></td>
                    
                    <td class=" last">
                      <a href="dashboard.php?p=editPost&id=<?php echo $id; ?>"><i class="fa fa-edit"></i>&nbsp; Edit
                      </a>&nbsp;&nbsp;&nbsp;
                      <a href="dashboard.php?p=delPost&id=<?php echo $id; ?>" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');" ><i class="fa fa-times"></i>&nbsp; Del
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
</div>