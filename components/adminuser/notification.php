<?php
include '../core/notification_manager.php';

// define variables and set to empty values

if (isset($_POST['notification_title']) && isset($_POST['notification_body']) && isset($_POST['post'])) {
    $title = $_POST['notification_title'];
    $body = $_POST['notification_body'];
    $pid = $_POST['post'];
    $max = $_POST['max_times'];
    $min = $_POST['min_times'];

    $query = "SELECT DISTINCT(users.firebase_id), post_tracking.userid 
                FROM `post_tracking` JOIN users on post_tracking.userid = users.id WHERE post_tracking.post_id = '$pid'  
                GROUP BY userid HAVING 1 ";

    if ($min) {
        $query = $query . " AND COUNT(userid)>='$min'";
    }
    if ($max) {
        $query = $query . " AND COUNT(userid)<='$max'";
    }

    $users = fetchData($query);
    $total_user = 0;

    foreach ($users as $data) {
        $fcm = $data['firebase_id'];

        if ($fcm != null) {
            send_post_notification_from_admin($pid, $title, $body, $fcm);
            $total_user++;
        }
    }

    // send_admin_notification($title, $body);
    $execQuery = "Success";

    // $redirectpPage = 'dashboard.php?p=notification';
    // header('Refresh: 1; URL=' . $redirectpPage);
}
// else{
//     $error = "Please enter valid title and body";
// }

?>

<div class="right_col" role="main" style="min-height: 700px;">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Notification</h3>
            </div>


        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Notification
                            <small>
                                <a href="dashboard.php">&nbsp;Dashboard / </a>
                                <a href="dashboard.php?p=notification">&nbsp;Notification / </a>
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
                                    if (isset($execQuery)) {

                                        // var_dump($query);
                                        ?>
                                    <div class="alert alert-success alert-dismissible fade in text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        Notification sent to
                                        <?php echo ($total_user) ?> user(s).
                                    </div>
                                    <?php

                                }
                                ?>
                                    <!-- New Added -->
                                    <?php
                                    if (isset($error)) {
                                        ?>
                                    <div class="alert alert-danger alert-dismissible fade in text-center" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>
                                        <?php echo $error; ?>
                                    </div>
                                    <?php

                                }
                                ?>
                                    <!-- /New Added -->
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notification_title">Select Post <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">

                                    <select name="post" class="form-control col-md-7 col-xs-12">
                                        <?php
                                        $selectCategoryQuery = "
                                            SELECT * FROM post
                                          ";
                                        $record = fetchData($selectCategoryQuery);

                                        foreach ($record as $data) {
                                            $id = $data['id'];
                                            $title = $data['post_title'];
                                            ?>

                                        <option value="<?php echo $id ?>">
                                            <?php echo $title ?>
                                        </option>

                                        <?php

                                    }
                                    ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="times">Visited times <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="number" id="times" name="min_times" required autofocus class="" placeholder='Minimum times'>
                                    <input type="number" id="times" name="max_times" required autofocus class="" placeholder='Maximum times'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notification_title">Notification Title <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="notification_title" name="notification_title" required autofocus class="form-control col-md-7 col-xs-12" placeholder='Notification Title ...'>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="notification_body">Notification Body <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <textarea d="notification_body" name="notification_body" required="required" class="form-control col-md-7 col-xs-12" placeholder='Notification Body ...'></textarea>
                                </div>
                            </div>


                            <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                    <button type="submit" class="btn btn-success pull-right">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>