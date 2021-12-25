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
            <h2>Auction List 
              <small><a href="dashboard.php" >&nbsp;Dashboard / </a>
              <a href="dashboard.php?p=auctionList" >&nbsp;Auction / </a>
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
                    <th class="column-title">City</th>
                    <th class="column-title">Category</th>
                    <!-- <th class="column-title">Keyword </th> -->
                    <th class="column-title">Auction Title </th>
                    <th class="column-title">Auction Description </th>
                    <th class="column-title">Starting Date </th>
                    <th class="column-title">Ending Date </th>
                    <th class="column-title">Starting Price </th>
                    <th class="column-title">Reserve Price </th>
                    <!-- <th class="column-title">Condition </th>
                    <th class="column-title">Product Type </th>
                    <th class="column-title">Com Id </th>
                    <th class="column-title">Status</th> -->
                    
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                <?php
                  $selectAuctionQuery = "
                                          SELECT auction.*, 
                                              city.city_name as city_name, 
                                              category.category_name as category_name
                                            FROM auction
                                            LEFT JOIN city 
                                            ON auction.city_id = city.id
                                            LEFT JOIN category
                                            ON auction.category_id = category.id
                                         "; 
                  $record = fetchData($selectAuctionQuery);

                  foreach ($record as $data) {

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
                                         
  
                ?>
                  <tr class="even pointer">
                    <td class=" "><?php echo $id; ?></td>
                    <td class=" "><?php echo $city_name; ?></td>
                    <td class=" "><?php echo $category_name; ?></td>
                    <!-- <td class=" "><?php echo $keyword; ?></td> -->
                    <td class=" "><?php echo $auction_title; ?></td>
                    <td class=" "><?php echo $auction_desc; ?></td>
                    <td class=" "><?php echo $starting_date; ?></td>
                    <td class=" "><?php echo $ending_date; ?></td>
                    <td class=" "><?php echo $starting_price; ?></td>
                    <td class=" "><?php echo $reserve_price; ?></td>
                    <!-- <td class=" "><?php echo $condition; ?></td>
                    <td class=" "><?php echo $product_type; ?></td>
                    <td class=" "><?php echo $com_id; ?></td>
                    <td class=" "><?php echo $status; ?></td> -->
                    
                    <td class=" last">
                      <a href="dashboard.php?p=editAuction&id=<?php echo $id; ?>"><i class="fa fa-edit"></i>&nbsp; Edit
                      </a>&nbsp;&nbsp;&nbsp;
                      <a href="dashboard.php?p=delAuction&id=<?php echo $id; ?>" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');" ><i class="fa fa-times"></i>&nbsp; Del
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