<?php
include '../database/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $type = $_POST['type'];
    
    // Trả dữ liệu về bảng db
    $sql_str = "INSERT INTO `admins` (`name`, `email`, `password`, `phone`, `address`, `type`, `status`, `created_at`, `updated_at`) VALUES 
                ('$name', '$email', '$password', '$phone', '$address', '$type', 'Active', NOW(), NOW());";
                
    mysqli_query($conn, $sql_str);
    
    header("location: ./listroles.php");
}
?>