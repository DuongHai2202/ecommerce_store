<?php
require('includes/header.php');
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900 text-uppercase font-weight-bold">Thêm mới sản phẩm</h1> 
                        </div>

                        <form class="user" method="POST" action="addproducts.php" enctype="multipart/form-data">
                            <!-- Tên sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Tên sản phẩm</label>
                                <input type="text"
                                    class="form-control form-control-user"
                                    id="name"
                                    name="name"
                                    placeholder="Nhập tên sản phẩm"
                                    required>
                            </div>

                            <!-- Hình ảnh sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="anhs">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <input type="file" class="form-control"
                                        id="anhs"
                                        name="anhs[]"
                                        multiple>
                                </div>
                                <small class="text-muted mt-1">Có thể chọn nhiều hình ảnh</small>
                            </div>

                            <!-- Tóm tắt sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="sumary">Tóm tắt sản phẩm</label>
                                <textarea name="sumary"
                                    id="sumary"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Nhập tóm tắt sản phẩm..."
                                    style="resize: vertical;"
                                    required>
                                </textarea>
                            </div>

                            <!-- Mô tả sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="description">Mô tả sản phẩm</label>
                                <textarea name="description"
                                    id="description"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Nhập mô tả chi tiết sản phẩm..."
                                    style="resize: vertical;">
                                </textarea>
                            </div>

                            <!-- Thông tin giá -->
                            <div class="form-group row mb-3">
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label class="form-label" for="stock">Số lượng nhập</label>
                                    <input type="number"
                                        class="form-control form-control-user"
                                        id="stock"
                                        name="stock"
                                        placeholder="Nhập số lượng">
                                </div>
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label class="form-label" for="giagoc">Giá gốc</label>
                                    <input type="number"
                                        class="form-control form-control-user"
                                        id="giagoc"
                                        name="giagoc"
                                        placeholder="Nhập giá gốc">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="giaban">Giá bán</label>
                                    <input type="number"
                                        class="form-control form-control-user"
                                        id="giaban"
                                        name="giaban"
                                        placeholder="Nhập giá bán">
                                </div>
                            </div>

                            <!-- Danh mục -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="danhmuc">Danh mục</label>
                                <select class="form-control" id="danhmuc" name="danhmuc" required>
                                    <option value="">-- Chọn danh mục --</option>
                                    <?php
                                    require_once('../database/connect.php');
                                    $sql_categories = "SELECT * FROM categories ORDER BY name";
                                    $result_categories = mysqli_query($conn, $sql_categories);
                                    while ($category = mysqli_fetch_assoc($result_categories)) {
                                        echo "<option value='" . $category['id'] . "'>" . htmlspecialchars($category['name']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Thương hiệu -->
                            <div class="form-group mb-4">
                                <label class="form-label" for="thuonghieu">Thương hiệu</label>
                                <select class="form-control" id="thuonghieu" name="thuonghieu" required>
                                    <option value="">-- Chọn thương hiệu --</option>
                                    <?php
                                    $sql_brands = "SELECT * FROM brands ORDER BY name";
                                    $result_brands = mysqli_query($conn, $sql_brands);
                                    while ($brand = mysqli_fetch_assoc($result_brands)) {
                                        echo "<option value='" . $brand['id'] . "'>" . htmlspecialchars($brand['name']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Submit button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require('includes/footer.php');
?>