<?php 
include 'db/dbh.php';

if(isset($_GET['submit'])){
	$date = $_GET['date'];
	$id   = $_GET['id'];

	$query1 = "SELECT * FROM purchases WHERE productId = $_GET[id] AND dateRecorded BETWEEN '$date 00:00:00.00' AND '$date 23:59:59.999' ORDER BY dateRecorded DESC";
  	$result1 = $db->query($query1);

  	$query3 = "SELECT * FROM purchases WHERE productId = $_GET[id] AND dateRecorded BETWEEN '$date 00:00:00.00' AND '$date 23:59:59.999' ORDER BY dateRecorded DESC";
  	$result3 = $db->query($query3);
  	
  	$query5 = "SELECT * FROM purchases WHERE productId = $_GET[id] AND dateRecorded BETWEEN '$date 00:00:00.00' AND '$date 23:59:59.999' ORDER BY dateRecorded ASC LIMIT 1";
  	$result5 = $db->query($query5);
  	$row5 = $result5->fetch_assoc();

  	$totalInc = 0;
  	$totalDec = 0;
  	$total 	  = 0;
  	while($row3 = $result3->fetch_assoc()){
  		if($row3['type'] == 'Quantity Decrease Adjustment' || $row3['type'] == 'Withdrawal'){
  			$totalDec += $row3['decrement'];
  		} elseif($row3['type'] == 'Quantity Increase Adjustment'){
  			$totalInc += $row3['decrement'];
  		}
  		$total = $totalInc - $totalDec;
  	}


	$query2  = "SELECT * FROM products WHERE id = '$id'";
	$result2 = $db->query($query2);
	$row2 	 = $result2->fetch_assoc();

	$query4  = "SELECT * FROM purchases WHERE productId = $_GET[id] AND dateRecorded BETWEEN '$date 00:00:00.00' AND '$date 23:59:59.999' ORDER BY dateRecorded DESC LIMIT 1";
	$result4 = $db->query($query4);
	$row4 	 = $result4->fetch_assoc();

}

?>

<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
	<style>
		body{
			width: 70%;
			margin: 0 auto;
		}
	</style>
</head>
	<body>
	    <div style='float: right'><a href='index.php'>Back</a></div>
		<div>
			<h6>Product: <strong><?php echo $row2['productName'] ?></strong></h6>
			<h6>Date: <strong><?php echo $date ?></strong></h6>
			<h6>Total Increase: <strong style='color: green'>+<?php echo $totalInc ?></strong></h6>
			<h6>Total Decrease: <strong style='color: red'>-<?php echo $totalDec ?></strong></h6>
			<h6>Start Quantity for the day: <strong><?php echo $row5['previousBalance'] ?></strong></h6>
			<h6>End Quantity for the day: <strong><?php echo $row4['currentBalance'] ?></strong></h6>
		</div>
		<hr>
		<div>
			<table>
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
	</body>
</html>