<?php
include 'db/dbh.php';

if(isset($_POST['addProduct'])){
	$productName = $_POST['productName'];
	$productCategory = $_POST['productCategory'];
	$productQuantity = $_POST['productQuantity'];
	//$productPrice = $_POST['productPrice'];

	$query = $db->query("INSERT INTO products (productName, productCategory, productQuantity) VALUES ('$productName', '$productCategory', '$productQuantity')");


	
	header("Location: add-products.php?add=true");
}
?>