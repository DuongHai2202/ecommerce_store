<?php 
include '../database/connect.php';

$deleteid = $_GET['id'];

$sql_str = "DELETE FROM newscategories WHERE id = $deleteid";
mysqli_query($conn, $sql_str);

header("location: ./listnewscategories.php");
?>
