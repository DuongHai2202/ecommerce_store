<?php 
include '../database/connect.php';

$name = $_POST['name'];
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $name)));

$sql_str = "INSERT INTO `categories` (`name`, `slug`, `status`) VALUE ('$name', '$slug', 'Active');";

mysqli_query($conn, $sql_str);

header("location: listcategories.php");
?>