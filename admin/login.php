<?php
session_start();
$errorMsg = "";
if (isset($_POST["btnSubmit"])) {
    //Lấy dữ liệu từ form
    $email = $_POST["email"];
    $password = $_POST["password"];

    include "../database/connect.php";
    
    $sql = "SELECT * FROM admins WHERE email='$email' AND password='$password'";
    
    $result = mysqli_query($conn, $sql);
    //kiem tra so luong record trả về: > 0: đăng nhập thành công
    if (mysqli_num_rows($result) > 0) {
        // echo "<h4>Dang nhap thanh cong</h4>";
        //Lưu lại thông tin đăng nhập
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row;
        // Chuyển hướng về trang quản trị
        header("location: index.php");
    } else {
        $errorMsg = "Không tìm thấy thông tin tài khoản trong hệ thống";
        require_once("includes/loginform.php");
    }

    //
} else {
    require_once("includes/loginform.php");
}
?>