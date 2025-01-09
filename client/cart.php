<?php
$is_homepage = false;

include '../database/connect.php';

include './includes/header.php';

?>

<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Giỏ hàng</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Giỏ hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="checkout__form">
            <h4>Giỏ hàng</h4>
            <!-- <form action="#"> -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="checkout__order">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="checkout__order__products">
                            Sản phẩm
                        </div>
                        <table class="table">
                            <tr>
                                <th>STT</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Hành động</th>
                            </tr>

                            <!-- Hiển thị sản phẩm từ table khi ấn thêm cart -->
                            <?php
                            $cart = [];
                            if (isset($_SESSION['cart'])) {
                                $cart = $_SESSION['cart'];
                            }

                            $count = 0; //số thứ tự
                            $total = 0;
                            foreach ($cart as $item) {
                                $total += $item['qty'] * $item['disscounted_price']; // = Số lượng * giá tiền
                            ?>
                                <form action="updatecart.php?id=<?= $item['id'] ?>" method="POST">
                                    <tr>
                                        <td>
                                            <?= ++$count ?>
                                        </td>
                                        <td>
                                            <?= $item['name'] ?>
                                        </td>
                                        <td>
                                            <?= number_format($item['disscounted_price'], 0, '', '.') . " VNĐ" ?>
                                        </td>
                                        <td><input type="number" name="qty" value="<?= $item['qty'] ?>" min="1" /></td>
                                        <td>
                                            <?= number_format($item['disscounted_price'] * $item['qty'], 0, '', '.') . " VNĐ" ?>
                                        </td>
                                        <!-- Cột hành động trong bảng -->
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <button type="submit" class="btn btn-sm mr-2" style="background-color: #FFB100; color: #fff; border: none; padding: 6px 12px; border-radius: 4px; font-size: 13px; margin-top: 0;">
                                                    Sửa 
                                                </button>
                                                <a href='./deletecart.php?id=<?= $item['id'] ?>' class="btn btn-sm custom-delete" style="background-color: #dc3545; color: #fff; border: none; padding: 6px 12px; border-radius: 4px; font-size: 13px;" >
                                                    Xóa
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </form>
                            <?php } ?>
                        </table>
                        <!-- Mã giảm giá -->
                        <!-- <div class="">
                            <input type="text" placeholder="Mã giảm giá">
                        </div> -->
                        <div class="checkout__order__total">
                            Tổng tiền: <span>
                                <?= number_format($total, 0, '', '.') . " VNĐ" ?>
                            </span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="shop.php" class="btn btn-primary">Tiếp tục mua sắm</a>
                            <a href="checkout.php" class="btn btn-success">
                                Thanh toán
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</section>

<?php
include './includes/footer.php';
?>