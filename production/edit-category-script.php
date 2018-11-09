<?php
include 'db/dbh.php';

if(isset($_POST['editCategory'])){
	$productCategory = $_POST['category'];

	$query = $db->query("UPDATE category SET productCategory = '$productCategory' WHERE id = $_GET[id]");

	header("Location: edit-category.php?edit=true");
}
?>