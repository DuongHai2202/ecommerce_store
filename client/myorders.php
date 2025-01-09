<?php
session_start();
include '../database/connect.php';

// Kiểm tra xem khách hàng đã đăng nhập chưa
if (!isset($_SESSION['customer_id'])) {
    header("Location: login.php");
    exit();
}

// Lấy customer_id từ session
if (!isset($_SESSION['customer_id'])) {
   $_SESSION['customer_id'] = $customer_id;
}

// Lấy danh sách đơn hàng của khách hàng
$sql_orders = "SELECT * FROM orders, users WHERE customer_id = $customer_id ORDER BY created_at DESC";
$result_orders = mysqli_query($conn, $sql_orders);

// Giao diện hiển thị
include './includes/header.php';
?>

<div class="container my-5">
    <h2 class="text-center mb-4">Danh sách đơn hàng của bạn</h2>

    <?php if (mysqli_num_rows($result_orders) > 0) { ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Trạng thái</th>
                    <th>Tổng tiền</th>
                    <th>Chi tiết</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stt = 0;
                while ($order = mysqli_fetch_assoc($result_orders)) {
                    $stt++;
                    ?>
                    <tr>
                        <td><?= $stt ?></td>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['created_at'] ?></td>
                        <td><?= $order['status'] ?></td>
                        <td><?= number_format($order['total_amount'], 0, '', '.') ?> VNĐ</td>
                        <td>
                            <a href="order_detail.php?id=<?= $order['id'] ?>" class="btn btn-info btn-sm">Xem chi tiết</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="text-center">Hiện tại bạn chưa có đơn hàng nào.</p>
    <?php } ?>
</div>

<?php include './includes/footer.php'; ?>
