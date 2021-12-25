<div class="right_col" role="main" style="min-height: 700px;">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Users List</h3>
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
            <h2>User List <small>Users Details</small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="form-group">
        
          <div class="x_content">
            <a href="dashboard.php?p=addUsers" class="btn btn-success"><i class="fa fa-plus-square"></i>&nbsp;New User Entry</a>
            <table id="datatable-buttons" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>User Name</th> 
                  <th>Password</th>  
                  <th>User Type</th> 
                  <th>Action</th>                     
                </tr>
              </thead>


              <tbody>
              <?php
                $selectUsersQuery = "
                                      SELECT users.*,
                                      user_type.`user_type` AS user_type
                                      FROM
                                          `users`
                                          INNER JOIN `user_type` 
                                              ON (`users`.`user_type_id` = `user_type`.`id`);
                                     
                                    "; 
                $record = fetchData($selectUsersQuery);

                foreach ($record as $data) {
                  $id = $data['id'];
              ?>
                <tr class="even pointer">
                  <td class=" "><?php echo $data['username']; ?></td>
                  <td class=" "><?php echo $data['password']; ?></td>
                  <td class=" "><?php echo $data['user_type']; ?></td>
                  <td class=" last">
                    <a href="dashboard.php?p=editUser&id=<?php echo $id; ?>"><i class="fa fa-edit"></i>&nbsp; Edit
                    </a>&nbsp;&nbsp;&nbsp;
                    <a href="dashboard.php?p=delUser&id=<?php echo $id; ?>"><i class="fa fa-times"></i>&nbsp; Del
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