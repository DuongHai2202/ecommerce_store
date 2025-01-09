<?php
session_start();
include '../database/connect.php';

if (isset($_POST['btnRegister'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Kiểm tra email đã tồn tại chưa
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        $error = "Email đã được sử dụng!";
    } else {
        // Thêm người dùng mới
        $sql = "INSERT INTO users (name, email, password, phone, address) 
                VALUES ('$name', '$email', '$password', '$phone', '$address')";
        
        if (mysqli_query($conn, $sql)) {
            // Lấy thông tin user vừa đăng ký
            $user_id = mysqli_insert_id($conn);
            $get_user = "SELECT * FROM users WHERE id = $user_id";
            $user_result = mysqli_query($conn, $get_user);
            $user = mysqli_fetch_assoc($user_result);

            // Lưu session
            $_SESSION['user'] = $user;
            $_SESSION['customer_id'] = $user['id'];
            $_SESSION['customer_name'] = $user['name'];
            $_SESSION['customer_email'] = $user['email'];
            
            header("Location: login.php");
            exit();
        } else {
            $error = "Đăng ký thất bại!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../img/ecommerce_shopping_favicon.png">
    <style>
        a:hover {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Đăng ký</h3>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Số Điện Thoại</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" name="btnRegister" class="btn btn-primary">Đăng ký</button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <p>Đã có tài khoản? <a href="login.php">Đăng nhập</a></p>
                            <p><a href="forgot-password.php">Quên mật khẩu?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/main.js"></script>
</body>

</html>