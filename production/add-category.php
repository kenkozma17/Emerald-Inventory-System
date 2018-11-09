<?php 
	include 'db/dbh.php';
	include 'top-template.php';

	$status = isset($_GET['add']) ? $_GET['add'] : 1;

	if($status == 'true'){
		echo "<script>alert('Category Added Successfully')</script>";
	} else {

	}
	
	if(isset($_POST['addCategory'])){
	echo $productCategory = $_POST['category'];

	$query = $db->query("INSERT INTO category (productCategory) VALUES ('$productCategory')");

    }
?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add Product Category <small>Data</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="add-category.php">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Product Category <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required class="form-control col-md-7 col-xs-12" name="category">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success" name="addCategory">Add Category</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<?php 
	include 'bottom-template.php';
?>