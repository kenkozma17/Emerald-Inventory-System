<?php 
	include 'db/dbh.php';
	include 'top-template.php';

	$status = isset($_GET['edit']) ? $_GET['edit'] : 1;
  $status1 = isset($_GET['delete']) ? $_GET['delete'] : 1;

	if($status == 'true'){
		echo "<script>alert('Product Edited Successfully')</script>";
	} if($status1 == 'true'){
    echo "<script>alert('Product Deleted Successfully')</script>";
  }

  $query = "SELECT * FROM products ORDER BY productName ASC";
  $result = $db->query($query);
  
?>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Product Inventory</small></h2>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <p class="text-muted font-13 m-b-30">
        </p>
        <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
          <thead>
            <tr>
              <th></th>
              <th>Product Name</th>
              <th>Product ID</th>
              <th>Category</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td>
							 <a class="green" href="edit-products-form.php?id=<?php echo $row['id']?>">Edit</a>
               <a class="red" href="delete-products-script.php?id=<?php echo $row['id']?>" onclick="return  confirm('Are you sure you want delete this record?')">Delete</a>
						  </td>
			  <td><?php echo $row['productName']; ?></td>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['productCategory']; ?></td>
              <td><?php echo $row['productQuantity']; ?></td>
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