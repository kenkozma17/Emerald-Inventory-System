<?php
include 'db/dbh.php';

$query = $db->query("DELETE FROM products WHERE id = $_GET[id]");
$query1 = $db->query("DELETE FROM purchases WHERE productId = $_GET[id]");

header("Location: edit-products.php?delete=true");

?>