<?php
include 'db/dbh.php';

if(isset($_POST['addPurposeIncrease'])){
	$purpose = $_POST['purposeInc'];

	$query = $db->query("INSERT INTO incrementtype (purpose) VALUES ('$purpose')");
	
	header("Location: add-purposes.php?add=true");
}

if(isset($_POST['addPurposeDecrease'])){
	$purpose = $_POST['purposeDec'];

	$query = $db->query("INSERT INTO decrementtype (purpose) VALUES ('$purpose')");

	header("Location: add-purposes.php?add=true");
}
?>