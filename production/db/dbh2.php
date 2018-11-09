<?php

$conn = mysqli_connect("localhost", "root", "", "emeraldInventory");

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}