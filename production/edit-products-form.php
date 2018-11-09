<?php 
	include 'db/dbh.php';
	include 'top-template.php';

	$status = isset($_GET['edit']) ? $_GET['edit'] : 1;

	if($status == 'true'){
		echo "<script>alert('Product Edited Successfully')</script>";
	} else {

	}

  $query = "SELECT * FROM products WHERE id = $_GET[id]";
  $result = $db->query($query);
  $row   = $result->fetch_assoc();
  
  $query1 = "SELECT * FROM category";
  $result1 = $db->query($query1);
  
?>
<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit Product <small></small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="edit-products-script.php?id=<?php echo $_GET['id']?>">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Product ID
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="productId" disabled value="<?php echo $row['id'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Product Name <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" required="required" class="form-control col-md-7 col-xs-12" name="productName" value="<?php echo $row['productName'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Category <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" name="productCategory">
              <?php while($row1 = $result1->fetch_assoc()):?>
                <option <?php if($row['productCategory'] == $row1['productCategory']){echo "selected";}?>><?php echo $row1['productCategory'] ?></option>
              <?php endwhile; ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Quantity <span class="required">*</span></label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="productQuantity" value="<?php echo $row['productQuantity'] ?>" disabled>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
              <button type="submit" class="btn btn-success" name="editProduct" onclick="return  confirm('Are you sure you want edit this record?')">Edit Product</button>
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