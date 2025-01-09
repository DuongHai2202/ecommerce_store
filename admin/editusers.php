<?php
include '../database/connect.php';
include './includes/header.php';

// Lấy thông tin user từ ID
$id = $_GET['id'];

$sql_str = "SELECT * FROM users WHERE id = $id";
$res = mysqli_query($conn, $sql_str);
$user = mysqli_fetch_assoc($res);

if (isset($_POST['btnUpdate'])) {
    // Lấy dữ liệu từ form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $current_time = date('Y-m-d H:i:s');

    // Kiểm tra xem có cập nhật mật khẩu không
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $sql_str = "UPDATE users 
            SET name = '$name',
                email = '$email',
                password = '$password',
                phone = '$phone',
                address = '$address',
                updated_at = '$current_time'
            WHERE id = $id";
    } else {
        $sql_str = "UPDATE users 
            SET name = '$name',
                email = '$email',
                phone = '$phone',
                address = '$address',
                updated_at = '$current_time'
            WHERE id = $id";
    }
    
    // Thực hiện câu lệnh SQL
    if(mysqli_query($conn, $sql_str)) {
        header("location: ./listusers.php");
        exit();
    } else {
        $error = "Cập nhật thất bại: " . mysqli_error($conn);
    }
} else {
    
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900 text-uppercase font-weight-bold">Cập nhật thông tin người dùng</h1>
                        </div>

                        <?php if(isset($error)): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form class="user" method="POST" action="#" onsubmit="return validateForm()">
                            <!-- Tên người dùng -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Tên người dùng</label>
                                <input type="text" 
                                    class="form-control form-control-user" 
                                    id="name" 
                                    name="name" 
                                    placeholder="Nhập tên người dùng"
                                    value="<?= htmlspecialchars($user['name']) ?>"
                                    required>
                            </div>

                            <!-- Email -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" 
                                    class="form-control form-control-user" 
                                    id="email" 
                                    name="email" 
                                    placeholder="Nhập địa chỉ email"
                                    value="<?= htmlspecialchars($user['email']) ?>"
                                    required>
                            </div>

                            <!-- Mật khẩu -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">Mật khẩu (để trống nếu không thay đổi)</label>
                                <input type="password" 
                                    class="form-control form-control-user" 
                                    id="password" 
                                    name="password" 
                                    placeholder="Nhập mật khẩu mới"
                                    minlength="6">
                                <small class="text-muted">Mật khẩu phải có ít nhất 6 ký tự</small>
                            </div>

                            <!-- Số điện thoại -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="phone">Số điện thoại</label>
                                <input type="text" 
                                    class="form-control form-control-user" 
                                    id="phone" 
                                    name="phone" 
                                    placeholder="Nhập số điện thoại"
                                    value="<?= htmlspecialchars($user['phone']) ?>"
                                    required>
                            </div>

                            <!-- Địa chỉ -->
                            <div class="form-group mb-4">
                                <label class="form-label" for="address">Địa chỉ</label>
                                <input type="text" 
                                    class="form-control form-control-user" 
                                    id="address" 
                                    name="address" 
                                    placeholder="Nhập địa chỉ"
                                    value="<?= htmlspecialchars($user['address']) ?>"
                                    required>
                            </div>

                            <!-- Submit buttons -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="btnUpdate">Cập nhật</button>
                                <a href="listusers.php" class="btn btn-secondary">Hủy</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function validateForm() {
    // Validate phone number (Vietnamese format)
    const phone = document.getElementById('phone').value;
    const phoneRegex = /^(0|\+84)[3|5|7|8|9][0-9]{8}$/;
    
    if (!phoneRegex.test(phone)) {
        alert('Số điện thoại không hợp lệ! Vui lòng nhập số điện thoại Việt Nam hợp lệ.');
        return false;
    }
    
    // Validate password if provided
    const password = document.getElementById('password').value;
    if (password && password.length < 6) {
        alert('Mật khẩu phải có ít nhất 6 ký tự!');
        return false;
    }
    
    return true;
}
</script>

<?php
   include './includes/footer.php';
}
?>