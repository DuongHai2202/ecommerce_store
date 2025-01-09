<?php
include '../database/connect.php';
$is_homePage = false;

$cart = [];
if (isset($_SESSION['cart'])) { 
    $cart = $_SESSION['cart'];
}

if (isset($_POST['btnDatHang'])) {
    // Lấy dữ liệu từ form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    //tao du lieu cho order
    $sqli = "INSERT INTO orders VALUES (0, 0, '$firstname', '$lastname', '$address', '$phone', '$email', 'Processing', now(), now())";

    if (mysqli_query($conn, $sqli)) {
        $last_order_id = mysqli_insert_id($conn);
        // Thêm vào table orders_detail
        foreach($cart as $item) {
            $masp = $item['id'];
            $disscounted_price = $item['disscounted_price'];
            $qty = $item['qty'];
            $total = $item['qty'] * $item['disscounted_price'];
            $sqli2 = "INSERT INTO order_details VALUES (0, $last_order_id, $masp,  $disscounted_price, $qty, $total, now(), now())";
            mysqli_query($conn, $sqli2);
        }   
    }

    unset($_SESSION["cart"]);
    header("Location: thankyou.php");
}

include './includes/header.php';
?>

<!-- Đường dẫn -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Thanh toán</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Thanh toán</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4 class="mb-4 text-center fw-bold">Thông tin Khách hàng</h4>
            <!-- Form thông tin khách hàng -->
            <form action="#" method="POST">
                <div class="row">
                    <!-- Thông tin khách hàng -->
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="firstname" class="form-label">Họ & tên lót<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="firstname" placeholder="Nhập họ và tên lót">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="lastname" class="form-label">Tên<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="lastname" placeholder="Nhập tên">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ nhận hàng<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ nhận hàng">
                        </div>

                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="phone" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control"name="email" placeholder="Nhập email">
                            </div>
                        </div>
                    </div>

                    <!-- Bảng đơn hàng -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0 fw-bold text-center">Đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                <!-- Header -->
                                <div class="d-flex justify-content-between border-bottom pb-3 mb-3">
                                    <span class="fw-bold">Sản phẩm</span>
                                    <span class="fw-bold">Thành tiền</span>
                                </div>

                                <ul class="list-unstyled mb-4">
                                    <?php
                                        $cart = [];
                                        if (isset($_SESSION['cart'])) {
                                            $cart = $_SESSION['cart'];
                                        }
                                        $total = 0; 
                                        foreach ($cart as $item) {
                                            $total += $item['qty'] * $item['disscounted_price'];
                                    ?>
                                        <li class="d-flex justify-content-between align-items-center mb-2">
                                            <span><?=$item['name']?></span>
                                            <span class="text-end"><?= number_format($item['disscounted_price'] * $item['qty'], 0, '', '.') ?> VNĐ</span>
                                        </li>
                                    <?php } ?>
                                </ul>

                                <div class="d-flex justify-content-between border-top pt-3 mb-4">
                                    <h5 class="fw-bold mb-0">Tổng tiền:</h5>
                                    <h5 class="fw-bold mb-0" style="color: #DC3545;" ><?= number_format($total, 0, '', '.') ?> VNĐ</h5>
                                </div>

                                <button type="submit" name="btnDatHang" class="btn btn-success w-100 py-2 fw-medium fs-3">
                                    Đặt hàng
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php
include './includes/footer.php';
?>