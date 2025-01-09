<?php
include '../database/connect.php';

$id = $_GET['id'];

$sql_str = "SELECT 
products.id AS pid,
sumary,
description,
stock,
price,
disscounted_price,
products.name AS pname,
images,
categories.name AS cname,
brands.name AS bname,
products.status AS pstatus
FROM products, categories, brands 
WHERE products.category_id=categories.id 
AND products.brand_id = brands.id 
AND products.id=$id";

$res = mysqli_query($conn, $sql_str);

$product = mysqli_fetch_assoc($res);

if (isset($_POST['btnUpdate'])) {
    //lay du lieu tu form
    $name = $_POST['name'];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    $sumary = $_POST['sumary'];
    $description = $_POST['description'];
    $stock = $_POST['stock'];
    $giagoc = $_POST['giagoc'];
    $giaban = $_POST['giaban'];
    $danhmuc = $_POST['danhmuc'];
    $thuonghieu = $_POST['thuonghieu'];
    $giaban = $_POST['giaban'];

    //xu ly hinh anh
    $countfiles = count($_FILES['anhs']['name']);

    if (!empty($_FILES['anhs']['name'][0])) { //có chọn hình ảnh mới - xóa các ảnh cũ
        //xoa anh cu
        $images_arr = explode(';', $product['images']);
        foreach ($images_arr as $img) {
            unlink($img);
        }

        //them anh moi 
        $imgs = '';
        for ($i = 0; $i < $countfiles; $i++) {
            $filename = $_FILES['anhs']['name'][$i];

            ## Location
            $location = "uploads/" . uniqid() . $filename;
            //pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | PATHINFO_EXTENSION | PATHINFO_FILENAME ] ) : mixed
            $extension = pathinfo($location, PATHINFO_EXTENSION);
            $extension = strtolower($extension);

            ## File upload allowed extensions
            $valid_extensions = array("jpg", "jpeg", "png");

            $response = 0;
            ## Check file extension
            if (in_array(strtolower($extension), $valid_extensions)) {

                // them vao CSDL - them thah cong moi upload anh len
                ## Upload file
                //$_FILES['file']['tmp_name']: $_FILES['file']['tmp_name'] - The temporary filename of the file in which the uploaded file was stored on the server.
                if (move_uploaded_file($_FILES['anhs']['tmp_name'][$i], $location)) {

                    $imgs .= $location . ";";
                }
            }
        }
        $imgs = substr($imgs, 0, -1);

        // echo substr($imgs, 0, -1); exit;

        // cau lenh them vao bang
        $sql_str = "UPDATE `products` 
        SET `name`='$name', 
        `slug`='$slug', 
        `description`='$description', 
        `sumary`='$sumary', 
        `stock`=$stock, 
        `price`=$giagoc, 
        `disscounted_price`=$giaban, 
        `images`='$imgs', 
        `category_id`=$danhmuc, 
        `brand_id`=$thuonghieu 
        WHERE `id`=$id
        ";
    } else {
        $sql_str = "UPDATE `products` 
        SET `name`='$name', 
        `slug`='$slug', 
        `description`='$description', 
        `sumary`='$sumary', 
        `stock`=$stock, 
        `price`=$giagoc, 
        `disscounted_price`=$giaban, 
        `category_id`=$danhmuc, 
        `brand_id`=$thuonghieu
        WHERE `id`=$id
        ";
    }
    mysqli_query($conn, $sql_str);

    header("location: ./listproducts.php");
} else {
    require('includes/header.php');
?>

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center mb-4">
                            <h1 class="h4 text-gray-900 text-uppercase font-weight-bold">Cập nhật sản phẩm</h1>
                        </div>

                        <form class="user" method="POST" action="#" enctype="multipart/form-data">
                            <!-- Tên sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="name">Tên sản phẩm</label>
                                <input type="text" 
                                    class="form-control form-control-user" 
                                    id="name" 
                                    name="name" 
                                    placeholder="Nhập tên sản phẩm"
                                    value="<?= $product['pname'] ?>"
                                    required>
                            </div>

                            <!-- Hình ảnh sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="anhs">Hình ảnh sản phẩm</label>
                                <div class="input-group">
                                    <input type="file" 
                                        class="form-control" 
                                        id="anhs" 
                                        name="anhs[]" 
                                        multiple>
                                </div>
                                <small class="text-muted mt-1">Có thể chọn nhiều hình ảnh</small>
                                <?php if($product['images']): ?>
                                    <div class="mt-2">
                                        <p>Các ảnh hiện tại:</p>
                                        <?php
                                        $arr = explode(';', $product['images']);
                                        foreach ($arr as $img) {
                                            echo "<img src='$img' height='100px' class='me-2' />";
                                        }
                                        ?>
                                    </div>
                                <?php endif; ?>
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
                                    required><?= $product['sumary'] ?></textarea>
                            </div>

                            <!-- Mô tả sản phẩm -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="description">Mô tả sản phẩm</label>
                                <textarea name="description" 
                                    id="description" 
                                    class="form-control" 
                                    rows="5" 
                                    placeholder="Nhập mô tả chi tiết sản phẩm..." 
                                    style="resize: vertical;"><?= $product['description'] ?></textarea>
                            </div>

                            <!-- Thông tin giá và số lượng -->
                            <div class="form-group row mb-3">
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label class="form-label" for="stock">Số lượng nhập</label>
                                    <input type="number" 
                                        class="form-control form-control-user" 
                                        id="stock" 
                                        name="stock" 
                                        placeholder="Nhập số lượng"
                                        value="<?= $product['stock'] ?>">
                                </div>
                                <div class="col-sm-4 mb-2 mb-sm-0">
                                    <label class="form-label" for="giagoc">Giá gốc</label>
                                    <input type="number" 
                                        class="form-control form-control-user" 
                                        id="giagoc" 
                                        name="giagoc" 
                                        placeholder="Nhập giá gốc"
                                        value="<?= $product['price'] ?>">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="giaban">Giá bán</label>
                                    <input type="number" 
                                        class="form-control form-control-user" 
                                        id="giaban" 
                                        name="giaban" 
                                        placeholder="Nhập giá bán"
                                        value="<?= $product['disscounted_price'] ?>">
                                </div>
                            </div>

                            <!-- Danh mục -->
                            <div class="form-group mb-3">
                                <label class="form-label" for="danhmuc">Danh mục</label>
                                <select class="form-control" id="danhmuc" name="danhmuc" required>
                                    <option value="">-- Chọn danh mục --</option>
                                    <?php
                                    $sql_str = "SELECT * FROM categories ORDER BY name";
                                    $result = mysqli_query($conn, $sql_str);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $selected = $row['name'] == $product['cname'] ? 'selected' : '';
                                        echo "<option value='" . $row['id'] . "' " . $selected . ">" . htmlspecialchars($row['name']) . "</option>";
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
                                    $sql_str = "SELECT * FROM brands ORDER BY name";
                                    $result = mysqli_query($conn, $sql_str);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $selected = $row['name'] == $product['bname'] ? 'selected' : '';
                                        echo "<option value='" . $row['id'] . "' " . $selected . ">" . htmlspecialchars($row['name']) . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <!-- Submit button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="btnUpdate">Cập nhật sản phẩm</button>
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
}
?>