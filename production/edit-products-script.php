<?php
include 'db/dbh.php';

if(isset($_POST['editProduct'])){
	$productName = $_POST['productName'];
	$productCategory = $_POST['productCategory'];
	//$productQuantity = $_POST['productQuantity'];
	$productPrice = $_POST['productPrice'];

	$query = $db->query("UPDATE products SET productName = '$productName', productCategory = '$productCategory' WHERE id = $_GET[id]");

	header("Location: edit-products.php?edit=true");
}
?>