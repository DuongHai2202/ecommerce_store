<?php
include './includes/header.php';
?>

<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Liên hệ với chúng tôi</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Trang chủ</a>
                        <span>Liên hệ</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Contact Section Begin -->
<section class="contact spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_phone"></span>
                    <h4>Điện thoại</h4>
                    <p>+01-3-8888-6868</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_pin_alt"></span>
                    <h4>Địa chỉ</h4>
                    <p>60-49 Đường 11378, New York</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_clock_alt"></span>
                    <h4>Thời gian làm việc</h4>
                    <p>10:00 sáng đến 23:00 tối</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                <div class="contact__widget">
                    <span class="icon_mail_alt"></span>
                    <h4>Email</h4>
                    <p>hello@ecommerce_store.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Contact Section End -->

<!-- Map Begin -->
<div class="map">
    <iframe
        src="https://www.google.com/maps/place/University+of+Transport+Technology/@20.9852148,105.7985203,17.81z/data=!4m16!1m9!3m8!1s0x3135acc6bdc7f95f:0x58ffc66343a45247!2sUniversity+of+Transport+Technology!8m2!3d20.984792!4d105.798832!9m1!1b1!16s%2Fg%2F1pznmrlzr!3m5!1s0x3135acc6bdc7f95f:0x58ffc66343a45247!8m2!3d20.984792!4d105.798832!16s%2Fg%2F1pznmrlzr?entry=ttu&g_ep=EgoyMDI0MTIxMS4wIKXMDSoASAFQAw%3D%3D"
        height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
    </iframe>
    <div class="map-inside">
        <i class="icon_pin"></i>
        <div class="inside-widget">
            <h4>New York</h4>
            <ul>
                <li>Điện thoại: +12-345-6789</li>
                <li>Địa chỉ: 16 Creek Ave. Farmingdale, NY</li>
            </ul>
        </div>
    </div>
</div>
<!-- Map End -->

<!-- Contact Form Begin -->
<div class="contact-form spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact__form__title">
                    <h2>Gửi tin nhắn</h2>
                </div>
            </div>
        </div>
        <form action="#">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Tên của bạn">
                </div>
                <div class="col-lg-6 col-md-6">
                    <input type="text" placeholder="Email của bạn">
                </div>
                <div class="col-lg-12 text-center">
                    <textarea placeholder="Tin nhắn của bạn"></textarea>
                    <button type="submit" class="site-btn">Gửi tin nhắn</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Contact Form End -->


<?php
include './includes/footer.php';
?>