<?php
session_start();
include '../database/connect.php';

// Kiểm tra xem khách hàng đã đăng nhập chưa
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Lấy customer_id từ session và id đơn hàng từ URL
$customer_id = $_SESSION['user'];
$order_id = $_GET['id'];

// Lấy thông tin đơn hàng
$sql_order = "SELECT * FROM orders WHERE id = $order_id AND customer_id = $customer_id";
$result_order = mysqli_query($conn, $sql_order);
$order = mysqli_fetch_assoc($result_order);

// Nếu không tìm thấy đơn hàng
if (!$order) {
    echo "<p class='text-center'>Không tìm thấy đơn hàng.</p>";
    exit();
}

// Lấy chi tiết sản phẩm trong đơn hàng
$sql_order_details = "SELECT order_details.*, products.name AS product_name 
                      FROM order_details 
                      INNER JOIN products ON order_details.product_id = products.id 
                      WHERE order_id = $order_id";
$result_order_details = mysqli_query($conn, $sql_order_details);

// Giao diện hiển thị
include './includes/header.php';
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Chi tiết đơn hàng #<?= $order['id'] ?></h2>

    <div class="mb-3">
        <strong>Ngày đặt hàng:</strong> <?= $order['created_at'] ?><br>
        <strong>Trạng thái:</strong> <?= $order['status'] ?><br>
        <strong>Tổng tiền:</strong> <?= number_format($order['total_amount'], 0, '', '.') ?> VNĐ<br>
    </div>

    <h3 class="mb-3">Danh sách sản phẩm</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stt = 0;
            while ($detail = mysqli_fetch_assoc($result_order_details)) {
                $stt++;
                ?>
                <tr>
                    <td><?= $stt ?></td>
                    <td><?= $detail['product_name'] ?></td>
                    <td><?= number_format($detail['price'], 0, '', '.') ?> VNĐ</td>
                    <td><?= $detail['qty'] ?></td>
                    <td><?= number_format($detail['total'], 0, '', '.') ?> VNĐ</td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include './includes/footer.php'; ?>
