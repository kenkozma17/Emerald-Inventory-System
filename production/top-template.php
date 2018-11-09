<?php 
include 'php-config.php';
session_start();
if($_SESSION['user'] == NULL){
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Inventory </title>

    <?php include 'data-table-top.php'; ?>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"> <span>SIV Inventory</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="index.php">Stock History Log</a></li>
                    </ul>
                  </li>   
                  <li><a><i class="fa fa-code-fork"></i> Transactions <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add-purchases.php">Add Withdrawal</a></li>
                      <li><a href="edit-quantity.php">Adjust Quantity/Stock</a></li>
                      <li><a href="edit-purchases.php">View Transactions</a></li>
                      <li><a href="trans-today.php">All Product Transactions Today</a></li>
                    </ul>
                  </li>                               
                  <li><a><i class="fa fa-database"></i> Inventory Maintenance <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    <li><a href="add-products.php">Add Products</a></li>
                    <li><a href="edit-products.php">View/Edit Products</a></li>
                    <li><a href="add-purposes.php">Add Increase/Decrease Purposes</a></li>
                    <li><a href="add-category.php">Add Product Category</a></li>
                    <li><a href="edit-category.php">Edit Product Category</a></li>
                    </ul>
                  </li>  
                  <!--<li><a><i class="fa fa-bar-chart"></i> Reports and Stats <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="reports-sales.php">Sales Reports</a></li>
                    </ul>
                  </li>-->
                  <li><a href='logout-script.php'><i class="fa fa-power-off"></i> Log Out </a></li>             
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    Welcome, <?php echo $_SESSION['user'];?>!
                    
                  </a>
                  
                </li>

              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">