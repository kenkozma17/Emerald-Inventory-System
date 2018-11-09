<?php
include 'db/dbh.php';

$query1 = "SELECT * FROM purchases WHERE id = $_GET[id]";
$result1 = $db->query($query1);
$row1 = $result1->fetch_assoc();

$increment = $row1['decrement'];
$productId = $row1['productId'];


$query2 = $db->query("UPDATE products SET productQuantity =  productQuantity + $increment WHERE id = $productId");

if($query2){
$query = $db->query("DELETE FROM purchases WHERE id = $_GET[id]");

header("Location: edit-purchases.php?deletePur=true");
} else{
	echo "error";
}
?>