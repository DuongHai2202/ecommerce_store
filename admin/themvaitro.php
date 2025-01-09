<?php
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
                            <h1 class="h4 text-gray-900 mb-4">Thêm mới tài khoản</h1>
                        </div>
                        <form class="user" method="POST" action="addroles.php" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Tên tài khoản</label>
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nhập tên tài khoản">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="email">Email</label>
                                <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Nhập email">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Nhập mật khẩu">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="phone">Số điện thoại</label>
                                <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="Nhập số điện thoại">
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="address">Địa chỉ</label>
                                <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="Nhập địa chỉ">
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label">Vai trò:</label>
                                <select class="form-control" name="type">
                                    <option>Chọn vai trò</option>
                                    <option value="Admin">Quản trị</option>
                                    <option value="Staff">Nhân viên</option>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Thêm tài khoản</button>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include './includes/footer.php';
?>