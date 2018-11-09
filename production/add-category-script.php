<?php
include 'db/dbh.php';

if(isset($_POST['addCategory'])){
	echo $productCategory = $_POST['category'];

	$query = $db->query("INSERT INTO category (productCategory) VALUES ('$productCategory')");

}
header("Location: add-category.php?add=true");
?>