<?php

include '../database/connect.php';

if (isset($_POST['atcbtn'])) {
    $id = $_POST['pid'];
    $qty = $_POST['qty'];
    // them san pham vao gio hang
    $cart = [];
    if (isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }
    // print_r($cart);
    $isFound = false;
    for ($i = 0; $i < count($cart); $i++) {
        // print_r($cart[$i]);
        if ($cart[$i]['id'] == $id) {
            $cart[$i]['qty']+= $qty; 
            $isFound = true;
            break;
        }
    }
    if (!$isFound) {  //khong tim thay san pham trong gio
        $sql_str = "SELECT * FROM products WHERE id = $id";
        // echo $sql_str; exit;
        $result = mysqli_query($conn, $sql_str);
        $product = mysqli_fetch_assoc($result); //thuc thi cau lenh ('select * from products where id = '.$id, true);
        $product['qty'] = $qty;
        $cart[] = $product;
    }

    //update session
    $_SESSION['cart'] = $cart;
    // print_r($cart); exit;
}

include './includes/header.php';
?>


<?php
include './includes/footer.php';
?>