<?php
session_start();
unset($_SESSION['customer_id']);

header("Location: index.php");
exit();
?>