<?php
include 'db/dbh.php';

if(isset($_POST['decreaseQuantity'])){


	$query1 = "SELECT * FROM products WHERE id = $_GET[id]";
    $result1 = $db->query($query1);
  	$row1 = $result1->fetch_assoc();

  	$currentBalance  = $row1['productQuantity'];
  	$productName 	 = $row1['productName'];
  	$quantityIncrement = $_POST['quantityIncrement'];
  	$productId 		 = $_GET['id'];
    $purpose    = $_POST['purpose'];

  	$query2 = "SELECT * FROM purchases WHERE productName = '$productName' ORDER BY id DESC LIMIT 1";
    $result2 = $db->query($query2);
  	$row2 = $result2->fetch_assoc();

  	if($query2){
  		$perviousBalance = $row2['previousBalance'];
  	} else {
  		$perviousBalance = $currentBalance;
  	}

  	$newBalance     = ($currentBalance - $quantityIncrement);
  	$type = 'Quantity Decrease Adjustment';
  	$date = date("Y-m-d H:i:sa");

  

	$query1 = $db->query("INSERT INTO purchases (productId, decrement, productName, previousBalance, currentBalance, dateRecorded, type, purpose) VALUES ('$productId', '$quantityIncrement', '$productName', '$currentBalance', '$newBalance', '$date', '$type', '$purpose')");

	$query = $db->query("UPDATE products SET productQuantity = productQuantity - $quantityIncrement WHERE id = $_GET[id]");

	header("Location: edit-quantity.php?inc=true");
}
?>