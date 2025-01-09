<?php
include '../database/connect.php';
$id = $_GET['id'];

$sql_str = "SELECT * FROM orders WHERE id=$id";
$res = mysqli_query($conn, $sql_str);
$row = mysqli_fetch_assoc($res);

if(isset($_POST['btnUpdate'])) {
$status = $_POST['status'];

$sql_str = "UPDATE `orders` SET status = '$status' WHERE `id`=$id";

mysqli_query($conn, $sql_str);

header("location: ./listorders.php");
} else {
    include './includes/header.php';
    ?>

<div class="container">

<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Xem và cập nhật trạng thái đơn hàng</h1>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form class="user" method="post" action="#">
                                <div class="row">
                                    <div class="col-md-3">Khách hàng:</div>
                                    <div class="col-md-9">
                                        <?= $row['firstname'] . ' ' . $row['lastname'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Địa chỉ:</div>
                                    <div class="col-md-9">
                                        <?= $row['address'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Số điện thoại:</div>
                                    <div class="col-md-9">
                                        <?= $row['address'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Email:</div>
                                    <div class="col-md-9">
                                        <?= $row['address'] ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">Trạng thái đơn hàng:</div>
                                    <!-- 'Processing','Confirmed','Shipping','Delivered','Cancelled' -->
                                    <div class="col-md-9">
                                        <select name="status" id="">
                                            <option <?= $row['status'] == 'Processing' ? 'selected' : '' ?>>Processing
                                            </option>
                                            <option <?= $row['status'] == 'Confirmed' ? 'selected' : '' ?>>Confirmed
                                            </option>
                                            <option <?= $row['status'] == 'Shipping' ? 'selected' : '' ?>>Shipping
                                            </option>
                                            <option <?= $row['status'] == 'Delivered' ? 'selected' : '' ?>>Delivered
                                            </option>
                                            <option <?= $row['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <button class="btn btn-primary mt-2" name="btnUpdate">Cập nhật</button>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <h3>Chi tiết đơn hàng</h3>
                            <table class="table">
                                <tr>
                                    <th>STT</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tiền</th>

                                </tr>
                                <?php
                                $sql = "SELECT *, products.name AS pname, order_details.price AS oprice FROM products, order_details WHERE products.id=order_details.product_id AND order_id=$id";
                                $res = mysqli_query($conn, $sql);
                                $stt = 0;
                                $tongtien = 0;
                                while ($row = mysqli_fetch_assoc($res)) {
                                    $tongtien += $row['qty'] * $row['oprice'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?= ++$stt ?>
                                        </td>
                                        <td>
                                            <?= $row['pname'] ?>
                                        </td>
                                        <td>
                                            <?= number_format($row['oprice'], 0, '', '.') . " VNĐ" ?>
                                        </td>
                                        <td>
                                            <?= $row['qty'] ?>
                                        </td>
                                        <td>
                                            <?= number_format($row['total'], 0, '', '.') . " VNĐ" ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <div class="tongtien">
                                <h5>
                                    Tổng tiền:
                                    <?= number_format($tongtien, 0, '', '.') . " VNĐ" ?>
                                </h5>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

</div>

<?php
include './includes/footer.php';
                            }
?>