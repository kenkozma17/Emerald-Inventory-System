<?php 
	include 'db/dbh.php';
	include 'top-template.php';


  $query = "SELECT * FROM products WHERE id = $_GET[id]";
  $result = $db->query($query);
  $row = $result->fetch_assoc();

  $query1 = "SELECT * FROM incrementtype";
  $result1 = $db->query($query1);
?>
<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Increase Product Quantity/Stock <small>Data</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST" action="edit-increase-quantity-script.php?id=<?php echo $_GET['id'] ?>">
                    <div class="row" >
                      <div class="col-md-6 col-md-offset-3">
                        <div class="tile-stats">
                          
                          <h3 style="color: black;">Product: <strong><?php echo $row['productName'] ?></strong></h3>

                          <h3 style="color: black;">Current Quantity: <strong><?php echo $row['productQuantity'] ?></strong></h3>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label col-md-3 col-sm-3 col-xs-12">Quantity Increment <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" class="form-control col-md-7 col-xs-12" type="text" name="quantityIncrement" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" >Purpose <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="form-control" name="purpose">
                            <?php while($row1 = $result1->fetch_assoc()): ?>
                            <option value="<?php echo $row1['purpose']; ?>"><?php echo $row1['purpose'] ?></option>
                            <?php endwhile; ?>
                          </select>
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <input type="submit" class="btn btn-success" name="increaseQuantity" value='Increase Quantity' onclick="this.style.visibility = 'hidden'" >
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