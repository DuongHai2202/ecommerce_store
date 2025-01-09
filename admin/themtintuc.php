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
                            <h1 class="h4 text-gray-900 mb-4">Thêm mới tin tức</h1>
                        </div>
                        <form class="user" method="POST" action="addnews.php" enctype="multipart/form-data">
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Tiêu đề tin tức</label>
                                <input type="text"  
                                    class="form-control form-control-user"
                                    id="name"
                                    name="name"
                                    placeholder="Nhập tiêu đề tin tức">
                            </div>

                            <!-- Hình ảnh sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="anhs">Ảnh đại diện</label>
                                <div class="input-group">
                                    <input type="file" class="form-control"
                                        id="anhs"
                                        name="anhs[]">
                                </div>
                            </div>

                            <!-- Tóm tắt sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="sumary">Tóm tắt tin tức</label>
                                <textarea name="sumary"
                                    id="sumary"
                                    class="form-control"
                                    rows="3"
                                    placeholder="Nhập tóm tắt tin tức..."
                                    style="resize: vertical;">
                                </textarea>
                            </div>

                            <!-- Mô tả sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="description">Nội dung tin tức</label>
                                <textarea name="description"
                                    id="description"
                                    class="form-control"
                                    rows="5"
                                    placeholder="Nhập nội dung tin tức..."
                                    style="resize: vertical;">
                                </textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label class="form-label">Danh mục tin:</label>
                                <select class="form-control" name="danhmuc">
                                    <option>Chọn danh mục</option>
                                    <!-- Danh mục -->
                                    <?php
                                    require('../database/connect.php');
                                    $sql_str = "SELECT * FROM newscategories ORDER BY name";
                                    $result = mysqli_query($conn, $sql_str);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Thêm tin tức</button>
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