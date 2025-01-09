<?php 
include '../database/connect.php';

$deleteid = $_GET['id'];

$sql_str = "DELETE FROM products WHERE id = $deleteid";
mysqli_query($conn, $sql_str);

header("location: ./listproducts.php");
?>