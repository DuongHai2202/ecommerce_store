<?php
$is_homePage = false;
include '../database/connect.php';
include './includes/header.php';


// Kiểm tra khi nhấn nút addtocartbtn
if(isset($_POST['addtocartbtn'])) {
    $id = $_POST['pid'];
    $qty = $_POST['qty'];

    // Thêm sản phẩm và số lượng vào giỏ hàng
    $cart = [];
    if(isset($_SESSION['cart'])) {
        $cart = $_SESSION['cart'];
    }

    $isFound = false;
    // Thêm sản phẩm vào giỏ
    for ($i = 0; $i < count($cart); $i++) {
        if ($cart[$i]['id'] == $id) {
            $cart[$i]['qty'] += $qty;
            $isFound = true;
            break;
        }
    }

    if (!$isFound) {
        $sql_str = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $sql_str);
        $product = mysqli_fetch_assoc($result);
        $product['qty'] = $qty;
        $cart[] = $product; 
    }

    // Cập nhật lại Session cart
    $_SESSION['cart'] = $cart;
}

$idsp = $_GET['id'];
$sql_str = "SELECT * FROM products WHERE id=$idsp";
$result = mysqli_query($conn, $sql_str);
$row = mysqli_fetch_assoc($result);
$anh_arr = explode(';', $row['images']);


?>
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>
                        <?= $row['name'] ?>
                    </h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <a href="./index.html">Sản phẩm</a>
                        <span>
                            <?= $row['name'] ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <img class="product__details__pic__item--large" src="<?= "../admin/" . $anh_arr[0] ?>"
                            alt="<?= $row['name'] ?>">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>
                        <?= $row['name'] ?>
                    </h3>
                    <div class="product__details__rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        <span>(21 reviews)</span>
                    </div>
                    <div class="product__details__price">
                        <div class="prices mt-3">
                            <span style="text-decoration: line-through" class="text-muted small d-block">
                                <?= number_format($row['price'], 0, '', '.') . " VNĐ" ?>
                            </span>
                            <span class="fs-5 fw-bold text-danger">
                                <?= number_format($row['disscounted_price'], 0, '', '.') . " VNĐ" ?>
                            </span>
                        </div>
                    </div>
                    <p class="text-justify">
                        <?= $row['sumary'] ?>
                    </p>

                    <form method="POST">
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1">
                                    <input type="hidden" value="1" name="qty">
                                </div>
                                <input type="hidden" value="<?=$idsp?>" name="pid">
                            </div>
                        </div>
                        <!-- Kiểm tra khách hàng đã đăng nhập chưa -->
                        <button style="outline: none; border: none;" class="primary-btn" name="addtocartbtn">
                            Thêm vào giỏ hàng
                        </button>
                    </form>

                    <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                        <li><b>Weight</b> <span>0.5 kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                aria-selected="false">Đánh giá <span>(1)</span></a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc text-justify">
                                <h6>Thông tin sản phẩm</h6>
                                <?= $row['description'] ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Đánh giá sản phẩm (reviews)</h6>
                                <p>(Đang hoàn thiện chức năng)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title related__product__title">
                    <h2>Các sản phẩm liên quan</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            //Tìm các snar phẩm liên quan cùng category_id với sản phẩm đang hiện
            $ctid = $row['category_id'];
            $sql2 = "SELECT * FROM products WHERE category_id=$ctid  AND id <> $idsp";
            $result2 = mysqli_query($conn, $sql2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $arrs = explode(";", $row2["images"]);
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?= "../admin/" . $arrs[0] ?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>

                        <div class="product__item__text">
                            <h6><a href="shop-detail.php?id=<?= $row2['id'] ?>"><?= $row2['name'] ?></a></h6>
                            <div class="product__details__price">
                                <div class="prices">
                                    <span class="fs-5 fw-bold text-danger">
                                        <?= number_format($row['disscounted_price'], 0, '', '.') . " VNĐ" ?>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php
include './includes/footer.php';
?>