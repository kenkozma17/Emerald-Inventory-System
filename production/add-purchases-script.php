<?php
include 'db/dbh.php';

if(isset($_POST['addPurchase'])){

	  $query1 = "SELECT * FROM products WHERE id = $_GET[id]";
    $result1 = $db->query($query1);
  	$row1 = $result1->fetch_assoc();

  	$currentBalance  = $row1['productQuantity'];
  	$productName 	 = $row1['productName'];
  	$decrement		 = $_POST['productDecrement'];
  	$customerName    = $_POST['customerName'];
  	$orderNumber 	 = $_POST['orderNumber'];
  	$date 			 = date("Y-m-d H:i:sa");
    $productId    = $row1['id'];
    $type       = 'Withdrawal';
    $purpose     = 'Customer Withdrawal';

  	$newBalance = ($currentBalance - $decrement);

	$query = $db->query("INSERT INTO purchases (productId, orderNumber, customerName, decrement, productName, previousBalance, currentBalance, dateRecorded, type, purpose) VALUES ('$productId', '$orderNumber', '$customerName', '$decrement', '$productName', '$currentBalance', '$newBalance', '$date', '$type', '$purpose')");

	$query2 = $db->query("UPDATE products SET productQuantity = $newBalance WHERE id = $_GET[id]");


	
	header("Location: add-purchases.php?addPur=true");
}
?>