<?php
session_start();
$idsp = $_GET['id'];
$qty =$_POST['qty'];

$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}
for ($i = 0; $i < count($cart); $i++) {
    if ($cart[$i]['id'] == $idsp) {
        $cart[$i]['qty'] = $qty;
        break;
    }
} 
$_SESSION['cart'] = $cart;

header("location: cart.php");
?>