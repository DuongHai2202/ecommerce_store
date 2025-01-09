<?php
include './includes/header.php';
include '../database/connect.php';
?>

<style>
    .Processing {
        background-color: #0d6efd;
        font-weight: bold;
        padding: 3px 7px;
        color: white;
    }

    .Shipping {
        background-color:rgb(11, 56, 59);
        font-weight: bold;
        padding: 3px 7px;
        color: white;
    }

    .Confirmed {
        background-color: #ffc107;
        font-weight: bold;
        padding: 3px 7px;
        color: white;
    }

    .Cancelled {
        background-color: #dc3545;
        font-weight: bold;
        padding: 3px 7px;
        color: white;
    }

    .Delivered {
        background-color: #28a745;
        font-weight: bold;
        padding: 3px 7px;
        color: white;
    }
</style>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Đơn hàng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                <thead class="table">
                    <tr>
                        <th>STT</th>
                        <th>Mã đơn hàng</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Xem</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql_str = "SELECT * FROM orders ORDER BY created_at";
                    $result = mysqli_query($conn, $sql_str);
                    $stt = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $stt++;
                    ?>
                        <tr>
                            <td><?= $stt ?></td>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['created_at'] ?></td>
                            <td>
                                <span class='<?= $row['status'] ?>'><?= $row['status'] ?></span>
                            </td>
                            <td>
                                <a class="btn btn-warning btn-sm" href="vieworders.php?id=<?= $row['id'] ?>">Xem</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
include './includes/footer.php';
?>
