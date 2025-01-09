<?php
include './includes/header.php';

if ($_SESSION['user']['type'] != 'Admin') {
    echo "<h2>Quyền của bạn không đủ để truy cập nội dung này</h2>";
    die();
}
?>

<div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary fs-3">Danh sách thương hiệu</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Mật khẩu</th>
                            <th>Số điện thoại</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include '../database/connect.php';
                        $sql_str = "SELECT * FROM users ORDER BY id";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['password']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="editusers.php?id=<?= $row['id'] ?>">Edit</a>
                                    <a class="btn btn-danger" href="deleteusers.php?id=<?= $row['id'] ?>" onclick="return confirm('Bạn chắc chắn xóa mục này?');">Delete</a>
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
</div>

<?php
include './includes/footer.php';
?>