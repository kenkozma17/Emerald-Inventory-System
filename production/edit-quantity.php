<?php 
  include 'db/dbh.php';
  include 'top-template.php';

  $status = isset($_GET['inc']) ? $_GET['inc'] : 1;
  $status1 = isset($_GET['dec']) ? $_GET['dec'] : 1;

  if($status == 'true'){
    echo "<script>alert('Quantity Increased Successfully')</script>";
  } if($status1 == 'true'){
    echo "<script>alert('Quantity Decreased Successfully')</script>";
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
              <th></th>
              <th>Product ID</th>
              <th>Product Name</th>
              <th>Category</th>
              <th>Quantity</th>
            </tr>
          </thead>
          <tbody>
          <?php while($row = $result->fetch_assoc()): ?>
            <tr>
              <td></td>    
              <td>
               <a class="green" href="edit-increase-quantity-form.php?id=<?php echo $row['id']?>">Increase Quantity/Stock</a>
               <a class="red" href="edit-decrease-quantity-form.php?id=<?php echo $row['id']?>">Decrease Quantity/Stock</a>
              </td>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['productName']; ?></td>
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