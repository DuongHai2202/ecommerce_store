<?php

include '../database/connect.php';
$id = $_GET['id'];

$sql_str = "SELECT * FROM news WHERE id=$id";

$res = mysqli_query($conn, $sql_str);

$news = mysqli_fetch_assoc($res);

if (isset($_POST['btnUpdate'])) {
    //Lấy dũ liệu
    $name = $_POST['title'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    $sumary = $_POST['sumary'];
    $description = $_POST['description'];
    $danhmuc = $_POST['danhmuc'];

    // Xử lý ảnh
    if (!empty($_FILES['anh']['name'])) {
        // Xóa ảnh cũ
        unlink($news['avatar']);
        //Thêm ảnh mới
        $filename = $_FILES['anh']['name'];

        // Location
        $location = "uploads/news/" . uniqid() . $filename;

        $extension = pathinfo($location, PATHINFO_EXTENSION);
        $extension = strtolower($extension);

        // File upload allowed extensions
        $valid_extensions = array("jpg", "jpeg", "png", "webp");

        $response = 0;
        // Check file extension
        if (in_array(strtolower($extension), $valid_extensions)) {
            if (move_uploaded_file($_FILES['anh']['tmp_name'], $location)) {
            }
        }

        // Thêm dữ liệu vào table news
        $sql_str = "UPDATE `news` 
        SET `title`='$name', 
        `slug`='$slug', 
        `description`='$description', 
        `sumary`='$sumary', 
        `avatar`='$location', 
        `newscategory_id`=$danhmuc, 
        `updated_at`=now()
        WHERE `id`=$id
        ";
    } else {
        $sql_str = "UPDATE `news` 
        SET `title`='$name', 
        `slug`='$slug', 
        `description`='$description', 
        `sumary`='$sumary', 
        `newscategory_id`=$danhmuc, 
        `updated_at`=now()
        WHERE `id`=$id
        ";
    }

    mysqli_query($conn, $sql_str);

    header("location: ./listnews.php");
} else {
    include 'includes/header.php';
?>
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Cập nhật tin tức</h1>
                            </div>
                            <form class="user" method="POST" action="#" enctype="multipart/form-data">
                                <div class="form-group mb-3">
                                    <label class="form-label" for="title">Tiêu đề tin tức</label>
                                    <input type="text"
                                        class="form-control form-control-user"
                                        id="title"
                                        name="title"
                                        placeholder="Nhập tiêu đề tin tức"
                                        value="<?= $news['title'] ?>">
                                </div>

                                <!-- Hình ảnh sản phẩm -->
                                <div class="form-group mb-3">
                                    <label class="form-label" for="anhs">Ảnh đại diện</label>
                                    <div class="input-group">
                                        <input type="file" class="form-control"
                                            id="anh"
                                            name="anh">
                                    </div>
                                    <br>
                                    Ảnh hiện tại:
                                    <?php $avatar = $news['avatar'] ?>
                                    <img src='<?= $avatar ?>' height='100px' />
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
                                        <?= $news['sumary'] ?>
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
                                        <?= $news['description'] ?>
                                </textarea>
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label">Danh mục tin:</label>
                                    <select class="form-control" name="danhmuc">
                                        <option>Chọn danh mục</option>
                                        <!-- Danh mục -->
                                        <?php
                                       include '../database/connect.php';
                                        $sql_str = "SELECT * FROM newscategories ORDER BY name";
                                        $result = mysqli_query($conn, $sql_str);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <option value="<?php echo $row['id']; ?>"
                                                <?php
                                                if ($row['id'] == $news['newscategory_id'])
                                                    echo "selected";

                                                ?>><?php echo $row['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="btnUpdate">Cập nhật</button>
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
    include 'includes/footer.php';
}
?>