<?php
    include '../core/dbe.inc.php';
    include '../core/core.inc.php';
    session_start(); 
    checkManager(); 
    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CAS | ADMIN</title>

    <!-- Bootstrap -->
    <link href="../public/admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../public/admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- iCheck -->
    <link href="../public/admin/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    
    <!-- Datatables -->
    <link href="../public/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../public/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">

    <!-- bootstrap-wysiwyg -->
    <link href="../public/admin/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="../public/admin/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="../public/admin/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="../public/admin/vendors/starrr/dist/starrr.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../public/admin/css/custom.css" rel="stylesheet">
    <link href="../public/admin/css/style.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php

        // <!-- sidebar -->
        include '../components/adminuser/sidebar.php';
        // <!-- /sidebar -->

        // <!-- top navigation -->
        include '../components/adminuser/topNavbar.php'; 
        // <!-- /top navigation -->

        // <!-- page content -->

        $link = isset($_GET['p']) ? $_GET['p'] : ''; 

        if ($link == '') {
           include '../components/adminuser/pageContent.php';
        }

        if ($link == 'addUserType') {
           include '../components/adminuser/addUserType.php';
        }
        if ($link == 'editUserType') {
           include '../components/adminuser/editUserType.php';
        }
        if ($link == 'delUserType') {
           include '../components/adminuser/delUserType.php';
        }

        if ($link == 'addUsers') {
           include '../components/adminuser/addUsers.php';
        }
        if ($link == 'editUser') {
           include '../components/adminuser/editUser.php';
        }
        if ($link == 'delUser') {
           include '../components/adminuser/delUser.php';
        }

        if ($link == 'userList') {
           include '../components/adminuser/userList.php';
        }

        if ($link == 'addCategory') {
          include '../components/adminuser/addCategory.php';
        }
        if ($link == 'editCategory') {
          include '../components/adminuser/editCategory.php';
        }
        if ($link == 'delCategory') {
          include '../components/adminuser/delCategory.php';
        }
        if ($link == 'categoryList') {
           include '../components/adminuser/categoryList.php';
        }

        if ($link == 'addCity') {
          include '../components/adminuser/addCity.php';
        }
        if ($link == 'editCity') {
          include '../components/adminuser/editCity.php';
        }
        if ($link == 'delCity') {
          include '../components/adminuser/delCity.php';
        }
        if ($link == 'cityList') {
           include '../components/adminuser/cityList.php';
        }

        if ($link == 'addProduct') {
          include '../components/adminuser/addProduct.php';
        }
        if ($link == 'editProduct') {
          include '../components/adminuser/editProduct.php';
        }
        if ($link == 'delProduct') {
          include '../components/adminuser/delProduct.php';
        }
        if ($link == 'productList') {
           include '../components/adminuser/productList.php';
        }

        if ($link == 'notification') {
           include '../components/adminuser/notification.php';
        }

        if ($link == 'logOut') {
           include '../components/adminuser/logOut.php';
        }
        else {
            $_GET['page'] = '';
        }
      // =======================End====================   
        // <!-- /page content -->

        // <!-- footer content -->
        include '../components/adminuser/footer.php'; 
        // <!-- /footer content -->
        ?>
      </div>
    </div>

    <!-- JS FILE -->
      <!-- jQuery -->
      <script src="../public/admin/vendors/jquery/dist/jquery.min.js"></script>

      

      <!-- jQuery Smart Wizard -->
      <script src="../public/admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
      <!-- Bootstrap -->
      <script src="../public/admin/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- FastClick -->
      <script src="../public/admin/vendors/fastclick/lib/fastclick.js"></script>
      <!-- NProgress -->
      <script src="../public/admin/vendors/nprogress/nprogress.js"></script>
      
      <!-- Datatables -->
      <script src="../public/admin/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
      <script src="../public/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
      <script src="../public/admin/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
      <script src="../public/admin/vendors/jszip/dist/jszip.min.js"></script>
      <script src="../public/admin/vendors/pdfmake/build/pdfmake.min.js"></script>
      <script src="../public/admin/vendors/pdfmake/build/vfs_fonts.js"></script>

      <!-- FORM -->
      <!-- bootstrap-progressbar -->
      <script src="../public/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
      <!-- iCheck -->
      <script src="../public/admin/vendors/iCheck/icheck.min.js"></script>
      <!-- bootstrap-daterangepicker -->
      <script src="../public/admin/js/moment/moment.min.js"></script>
      <script src="../public/admin/js/datepicker/daterangepicker.js"></script>
      <!-- bootstrap-wysiwyg -->
      <script src="../public/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
      <script src="../public/admin/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
      <script src="../public/admin/vendors/google-code-prettify/src/prettify.js"></script>
      <!-- jQuery Tags Input -->
      <script src="../public/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
      <!-- Switchery -->
      <script src="../public/admin/vendors/switchery/dist/switchery.min.js"></script>
      <!-- Select2 -->
      <script src="../public/admin/vendors/select2/dist/js/select2.full.min.js"></script>
      <!-- Parsley -->
      <script src="../public/admin/vendors/parsleyjs/dist/parsley.min.js"></script>
      <!-- Autosize -->
      <script src="../public/admin/vendors/autosize/dist/autosize.min.js"></script>
      <!-- jQuery autocomplete -->
      <script src="../public/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
      <!-- starrr -->
      <script src="../public/admin/vendors/starrr/dist/starrr.js"></script>
      <!-- /FROM -->

      <!-- validator -->
      <script src="../public/admin/vendors/validator/validator.min.js"></script>

      <!-- Custom Theme Scripts -->
      <script src="../public/admin/js/custom.js"></script>


      <!-- themeCustomJS -->
      <script src="../public/js/theme.js"></script>

  </body>
</html>