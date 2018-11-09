<?php
include 'db/dbh.php';

$query = $db->query("DELETE FROM category WHERE id = $_GET[id]");

header("Location: edit-category.php?delete=true");

?>