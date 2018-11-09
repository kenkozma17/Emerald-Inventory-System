<?php 
	include 'db/dbh.php';
	include 'top-template.php';
  include 'data-table-top.php';

	$status = isset($_GET['edit']) ? $_GET['edit'] : 1;
  $status1 = isset($_GET['delete']) ? $_GET['delete'] : 1;

	if($status == 'true'){
		echo "<script>alert('Product Edited Successfully')</script>";
	} if($status1 == 'true'){
    echo "<script>alert('Product Deleted Successfully')</script>";
  }

  $query = "SELECT * FROM purchases ORDER BY dateRecorded DESC";
  $result = $db->query($query);

  $query1 = "SELECT * FROM products";
  $result1 = $db->query($query1);
  
?>
<script>
  $(document).ready(function() {
    $('table.table').DataTable();
} );
</script>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Transaction Record</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
        </p>
        <table id="datatable" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th></th>
        
              <th>Purpose</th>
              <th>Withdrawal #</th>
              <th>Customer Name</th>
              <th>Product ID</th>
              <th>Product</th>
              <th>Quantity</th>
              <!--<th>Previous Quantity</th>
              <th>Current Quantity</th>!-->
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
          <?php $x = 1; while($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
							 <!--<a class="green" href="edit-purchases-form.php?id=<?php //echo $row['id']?>">Edit</a>-->
               <!--<?php /*if($row['type'] == 'Quantity Increase Adjustment'){
                echo '<a class="red" href="delete-qia-script.php?id='.$row['id'].'" onclick="return  confirm("Are you sure you want delete this record?")">Delete</a>';}else{
                  echo '<a class="red" href="delete-purchases-script.php?id='.$row['id'].'" onclick=return  confirm("Are you sure you want delete this record?")>Delete</a>';} */?>-->
               
						  </td>
              
              <td><?php echo $row['purpose']; ?></td>
              <td><?php echo $row['orderNumber']; ?></td>
              <td><?php echo $row['customerName']; ?></td>
              <td><?php echo $row['productId']; ?></td>
              <td><?php echo $row['productName']; ?></td>
              <td <?php if($row['type'] == 'Quantity Decrease Adjustment' || $row['type'] == 'Withdrawal'){echo 'style="color:red;"';}elseif($row['type'] == 'Quantity Increase Adjustment'){echo 'style="color:green;"';} ?>><?php if($row['type'] == 'Quantity Decrease Adjustment' || $row['type'] == 'Withdrawal'){echo '-';}
              elseif($row['type'] == 'Quantity Increase Adjustment'){echo '+';} echo $row['decrement']; ?></td>
              <!--<td><?php //echo $row['previousBalance']; ?></td>
              <td><?php //echo $row['currentBalance']; ?></td>-->
              <td><?php echo $row['dateRecorded']; ?></td>
            </tr>
          <?php $x++;  endwhile;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Product Inventory</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        
        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th></th>
              <th>Product Name</th>
              <th>Category</th>
              <th>Price</th>
              <th>Current Quantity</th>
            </tr>
          </thead>
          <tbody>
          <?php $x = 1; while($row1 = $result1->fetch_assoc()): ?>
            <tr>
              <td><?php echo $x; $x++; ?></td>
              <td><?php echo $row1['productName']; ?></td>
              <td><?php echo $row1['productCategory']; ?></td>
              <td><?php echo number_format($row1['productPrice'], 2) ?></td>
              <td><?php echo $row1['productQuantity']; ?></td>
            </tr>
          <?php endwhile;?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
<?php 
	include 'bottom-template.php';
	include 'data-table-bottom.php';
?>