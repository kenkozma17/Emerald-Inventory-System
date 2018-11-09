<?php 
	include 'db/dbh.php';
	include 'top-template.php';

	$status = isset($_GET['add']) ? $_GET['add'] : 1;

	if($status == 'true'){
		echo "<script>alert('Product Added Successfully')</script>";
	} else {

	}

  $query = "SELECT * FROM products WHERE id = $_GET[id]";
  $result = $db->query($query);
  $row = $result->fetch_assoc();

  $query1 = "SELECT * FROM purchases WHERE productId = $_GET[id] ORDER BY dateRecorded DESC";
  $result1 = $db->query($query1);
?>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="row" >
	      <div class="col-md-6 col-md-offset-0">
	        <div>
	          
	          <h3 style="color: black;">Product: <strong><?php echo $row['productName'] ?></strong></h3>

	          <h3 style="color: black;">Current Quantity: <strong><?php echo $row['productQuantity'] ?></strong></h3>
	          <form action='daily-trans.php' method='GET'>
              <input type='date' name='date' required/> | 
              <input type='hidden' name='id' value='<?php echo $_GET['id']?>' /> 
              <input type='submit' name='submit' value='Find'/>
            </form>
	        </div>
	      </div>
	    </div>
      <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered bulk_action">
            <col width='0.1'>
          <thead>
            <tr>
              <th style='width: 0px'></th>
              <th>Date/Time</th>
              
              <th>Purpose</th>
              <th>Withdrawal #</th>
              <th>Customer Name</th>
              <th>Previous Balance</th>
              <th>Quantity</th>
              <th>New Balance</th>
            </tr>
          </thead>


          <tbody>
            <?php while($row1 = $result1->fetch_assoc()): ?>
            <tr>
              <td style='width: 0px'></td>
              <td><?php echo date('Y-m-d H:i:s',strtotime($row1['dateRecorded'])); ?></td>
  			  
              <td><?php echo $row1['purpose'] ?></td>  	
              <td><?php echo $row1['orderNumber'] ?></td>
              <td><?php echo $row1['customerName'] ?></td>
              <td style="font-size: 15px;"><?php 
                echo $row1['previousBalance'] ; ?></td>
              <td <?php if($row1['type'] == 'Quantity Decrease Adjustment' || $row1['type'] == 'Withdrawal'){echo 'style="color:red; font-size: 15px;"';}elseif($row1['type'] == 'Quantity Increase Adjustment'){echo 'style="color:green; font-size: 15px;"';} ?>><?php if($row1['type'] == 'Quantity Decrease Adjustment' || $row1['type'] == 'Withdrawal'){echo '-';}
  					elseif($row1['type'] == 'Quantity Increase Adjustment'){echo '+';} echo $row1['decrement']; ?></td>	  
              <td style="font-size: 15px;"> <?php echo $row1['currentBalance']; ?></td>
              
            </tr>
        <?php endwhile; ?>

			</tbody>
        </table>
      </div>
    </div>
  </div>
<?php 
	include 'bottom-template.php';
	include 'data-table-bottom.php';
?>