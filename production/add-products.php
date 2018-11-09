<?php 
	include 'db/dbh.php';
	include 'top-template.php';

	$status = isset($_GET['add']) ? $_GET['add'] : 1;

	if($status == 'true'){
		echo "<script>alert('Product Added Successfully')</script>";
	} else {

	}
  $query = "SELECT * FROM category";
  $result = $db->query($query);
 

?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add Products <small>Data</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="add-products-script.php">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Product Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="productName">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Category <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="productCategory">
                <?php while($row = $result->fetch_assoc()): ?>
                <option value="<?php echo $row['productCategory']; ?>"><?php echo $row['productCategory'] ?></option>
                <?php endwhile; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Initial Quantity <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="productQuantity">
            </div>
          </div>
          
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success" name="addProduct">Add Product</button>
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