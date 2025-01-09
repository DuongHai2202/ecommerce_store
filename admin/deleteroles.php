<?php
include '../database/connect.php';
$delete_id = $_GET['id'];

$sql_str = "DELETE FROM admins WHERE id=$delete_id";
mysqli_query($conn, $sql_str);

header("Location: listroles.php");
?>