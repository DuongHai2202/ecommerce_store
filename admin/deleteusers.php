<?php
include '../database/connect.php';

$deleteid = $_GET['id'];
$sql_str = "DELETE FROM users ORDER BY id = $deleteid";
mysqli_query($conn, $sql_str);

header("Location: listusers.php");
?>