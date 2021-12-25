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
            <h2>City List 
              <small><a href="dashboard.php" >&nbsp;Dashboard / </a>
              <a href="dashboard.php?p=categoryList" >&nbsp;Category / </a>
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
            <a href="dashboard.php?p=addCity" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp;New City Entry</a>
            <div class="table-responsive">
              <table id="datatable-buttons" class="table table-striped table-bordered">
                <thead>
                  <tr class="headings">
                    <th class="column-title">Division Name </th>
                    <th class="column-title">City Name </th>
                    <th class="column-title no-link last"><span class="nobr">Action</span>
                    </th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>

                <tbody>
                <?php
                  $selectCategoryQuery = "
                                          SELECT * FROM city
                                         "; 
                  $record = fetchData($selectCategoryQuery);

                  foreach ($record as $data) {
                    $id = $data['id'];
                    $division = $data['division'];
                    $city_name = $data['city_name'];
                                         
  
                ?>
                  <tr class="even pointer">
                    <td class=" "><?php echo $division; ?></td>
                    <td class=" "><?php echo $city_name; ?></td>
                    
                    <td class=" last">
                      <a href="dashboard.php?p=editCity&id=<?php echo $id; ?>"><i class="fa fa-edit"></i>&nbsp; Edit
                      </a>&nbsp;&nbsp;&nbsp;
                      <a href="dashboard.php?p=delCity&id=<?php echo $id; ?>" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');" ><i class="fa fa-times"></i>&nbsp; Del
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