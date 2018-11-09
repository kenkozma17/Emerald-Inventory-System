<h1>All Product Transactions for <?php echo date('Y-m-d'); ?></h1>
<?php 
include 'db/dbh.php';

$date = date('Y-m-d');

$query = "SELECT * FROM purchases WHERE dateRecorded >= '$date' ORDER BY productName ASC";
$result = $db->query($query);

$x = 0;
while($row = $result->fetch_assoc()){
    $transId[$x] = ($row['productId']);
    $x++;
}

foreach(array_unique($transId) as $key){
    $query1 = "SELECT * FROM purchases WHERE dateRecorded >= '$date' AND productId = '$key' ORDER BY productName ASC";
    $result1 = $db->query($query1);
    $row1    = $result1->fetch_assoc();
    
    $query3 = "SELECT * FROM products WHERE id = '$key'";
    $result3 = $db->query($query3);
    $row3    = $result3->fetch_assoc();
    
    $query5 = "SELECT * FROM purchases WHERE productId = '$key' AND dateRecorded >= '$date' ORDER BY dateRecorded ASC LIMIT 1";
  	$result5 = $db->query($query5);
  	$row5 = $result5->fetch_assoc();
  	
  	$query6 = "SELECT * FROM purchases WHERE productId = '$key' AND dateRecorded > '$date' ORDER BY dateRecorded DESC";
  	$result6 = $db->query($query6);
  	
  	$totalInc = 0;
  	$totalDec = 0;
  	$total 	  = 0;
  	while($row6 = $result6->fetch_assoc()){
  		if($row6['type'] == 'Quantity Decrease Adjustment' || $row6['type'] == 'Withdrawal'){
  			$totalDec += $row6['decrement'];
  		} elseif($row6['type'] == 'Quantity Increase Adjustment'){
  			$totalInc += $row6['decrement'];
  		}
  		$total = $totalInc - $totalDec;
  	}
    
    echo '<hr/><h3>'. $row1['productName']. '</h3>' . '<p>Current Quantity: '. $row3['productQuantity'] .'</p><p>Start Quantity for today: ' . $row5['previousBalance'] . '</p><p style=color:green>Total Increase: +'.$totalInc.'</p><p style=color:red>Total Decrease: -'.$totalDec.'</p>';
    
    $query2 = "SELECT * FROM purchases WHERE dateRecorded >= '$date' AND productId = '$key' ORDER BY dateRecorded DESC";
    $result2 = $db->query($query2);
    
        ?>
        <style>
            body {
                font-family: Calibri;
            }
            th, td, tr, table {
                border: 1px solid black;
            }
            
            p {
                margin: 0;
            }
        </style>
        <table>
				<thead>
				  <tr>
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
				<?php while($row2 = $result2->fetch_assoc()){ ?>
				<tr>
    				<td><?php echo date('Y-m-d H:i:s',strtotime($row2['dateRecorded'])); ?></td>
    				<td><?php echo $row2['purpose'] ?></td>
    				<td><?php echo $row2['orderNumber'] ?></td>
    				<td><?php echo $row2['customerName'] ?></td>
    				<td style="font-size: 15px;"><?php echo $row2['previousBalance'] ; ?></td>
    				<td <?php if($row2['type'] == 'Quantity Decrease Adjustment' || $row2['type'] == 'Withdrawal'){echo 'style="color:red; font-size: 15px;"';}elseif($row2['type'] == 'Quantity Increase Adjustment'){echo 'style="color:green; font-size: 15px;"';} ?>><?php if($row2['type'] == 'Quantity Decrease Adjustment' || $row2['type'] == 'Withdrawal'){echo '-';}
    		  					elseif($row2['type'] == 'Quantity Increase Adjustment'){echo '+';} echo $row2['decrement']; ?></td>	  
    		        <td style="font-size: 15px;"> <?php echo $row2['currentBalance'];} ?></td>
		        </tr>
                </tbody>
			</table>
			<?php
    
    
}
?>