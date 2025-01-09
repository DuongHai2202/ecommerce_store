<?php
include './includes/header.php';

include '../database/connect.php';

?>
<!-- Blog Details Hero Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Ecommerce Store</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.php">Trang chủ</a>
                        <span>Tin tức</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Hero End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 order-md-1 order-2">
                <div class="blog__sidebar">
                    <div class="blog__sidebar__search">
                        <form action="#">
                            <input type="text" placeholder="Search...">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Danh mục</h4>
                        <ul>
                            <li><a href="#">All</a></li>
                            <?php

                            $sql_str2 = "SELECT * FROM newscategories ORDER BY id";
                            $result2 = mysqli_query($conn, $sql_str2);
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                            ?>
                                <li><a href="#">
                                        <?= $row2['name'] ?> (20)
                                    </a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tin mới</h4>
                        <div class="blog__sidebar__recent">

                            <?php
                            $sql_str3 = "SELECT * FROM news ORDER BY created_at desc limit 0, 3";
                            $result3 = mysqli_query($conn, $sql_str3);
                            while ($row3 = mysqli_fetch_assoc($result3)) {
                            ?>

                                <a href="#" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img src="<?= '../admin/' . $row3['avatar'] ?>" width="70px" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6><?= $row3['title'] ?></h6>
                                        <span><?= $row3['created_at'] ?></span>
                                    </div>
                                </a>

                            <?php } ?>

                        </div>
                    </div>
                    <div class="blog__sidebar__item">
                        <h4>Tìm kiếm</h4>
                        <div class="blog__sidebar__item__tags">
                            <?php
                            $sql_str2 = "SELECT * FROM newscategories ORDER BY id";
                            $result2 = mysqli_query($conn, $sql_str2);
                            while ($row2 = mysqli_fetch_assoc($result2)) { ?>
                                <a href="#"><?= $row2['name'] ?></a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <?php
                $sql_str = "SELECT * FROM news ORDER BY created_at DESC LIMIT 0, 3";
                $result = mysqli_query($conn, $sql_str);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="col-12 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <a href="blog-detail.php?id=<?= $row['id'] ?>" class="text-decoration-none text-dark">
                                        <img src="<?= "../admin/" . $row['avatar'] ?>" class="img-fluid rounded-start" alt="Tin tức" 
                                        style="height: 100%; width: 100%; object-fit: cover; border-top-left-radius: 10px; border-bottom-left-radius: 10px;">
                                    </a>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title text-truncate">
                                            <a href="blog-detail.php?id=<?= $row['id'] ?>" class="text-decoration-none text-dark">
                                                <?= $row['title'] ?>
                                            </a>
                                        </h5>
                                        <p class="card-text text-muted small">
                                            <i class="fa fa-calendar-o"></i> <?= date("d/m/Y", strtotime($row['created_at'])) ?>
                                        </p>
                                        <p class="card-text text-justify">
                                            <?= $row['sumary'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->


<?php
include './includes/footer.php';
?>