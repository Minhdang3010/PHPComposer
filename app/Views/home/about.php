<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Giới thiệu</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Về chúng tôi</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="about-area py-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                        <div class="about-img">
                            <div class="row">
                                <div class="col-7">
                                    <img class="img-1" src="<?= BASE_URL ?>public/assets/img/about/01.jpg" alt="">
                                </div>
                                <div class="col-5 align-self-end">
                                    <img class="img-2" src="<?= BASE_URL ?>public/assets/img/about/02.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="about-experience">
                            <div class="about-experience-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/experience.svg" alt="">
                            </div>
                            <b>30 Năm <br> Kinh Nghiệm</b>
                        </div>
                        <div class="about-shape">
                            <img src="<?= BASE_URL ?>public/assets/img/shape/05.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                        <div class="site-heading mb-3">
                            <span class="site-title-tagline justify-content-start">
                                <i class="flaticon-drive"></i> Về chúng tôi
                            </span>
                            <h2 class="site-title">
                                Thị trường <span>Mua sắm trực tuyến</span> lớn nhất thế giới dành cho bạn.
                            </h2>
                        </div>
                        <p>
                            Chúng tôi tự hào là đơn vị tiên phong trong việc cung cấp các giải pháp mua sắm hiện đại, kết nối hàng ngàn thương hiệu uy tín đến tay người tiêu dùng một cách nhanh chóng và an toàn nhất.
                        </p>
                        <div class="about-list">
                            <ul>
                                <li><i class="fas fa-check-double"></i> Trải nghiệm vận chuyển tối ưu</li>
                                <li><i class="fas fa-check-double"></i> Thiết kế hiện đại, giá cả hợp lý</li>
                                <li><i class="fas fa-check-double"></i> Giá cạnh tranh & Dễ dàng mua sắm</li>
                                <li><i class="fas fa-check-double"></i> Sản phẩm chất lượng vượt trội</li>
                            </ul>
                        </div>
                        <a href="<?= BASE_URL ?>contact" class="theme-btn mt-4">Liên hệ ngay<i
                                class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="counter-area pt-50 pb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <img src="<?= BASE_URL ?>public/assets/img/icon/sale.svg" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-amount">
                                <span class="counter" data-count="+" data-to="50" data-speed="3000">50</span>
                                <span class="counter-sign">k</span>
                            </div>
                            <h6 class="title">Tổng doanh số </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <img src="<?= BASE_URL ?>public/assets/img/icon/rate.svg" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-amount">
                                <span class="counter" data-count="+" data-to="90" data-speed="3000">90</span>
                                <span class="counter-sign">k</span>
                            </div>
                            <h6 class="title">Khách hàng hài lòng</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <img src="<?= BASE_URL ?>public/assets/img/icon/employee.svg" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-amount">
                                <span class="counter" data-count="+" data-to="150" data-speed="3000">150</span>
                                <span class="counter-sign">+</span>
                            </div>
                            <h6 class="title">Nhân viên hỗ trợ</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <img src="<?= BASE_URL ?>public/assets/img/icon/award.svg" alt="">
                        </div>
                        <div class="counter-info">
                            <div class="counter-amount">
                                <span class="counter" data-count="+" data-to="30" data-speed="3000">30</span>
                                <span class="counter-sign">+</span>
                            </div>
                            <h6 class="title">Giải thưởng đạt được</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-area2 bg py-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline">Đánh giá</span>
                        <h2 class="site-title">Khách hàng nói gì <span>về chúng tôi</span></h2>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                <div class="testimonial-item">
                    <div class="testimonial-author">
                        <div class="testimonial-author-img">
                            <img src="<?= BASE_URL ?>public/assets/img/testimonial/01.jpg" alt="">
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Sylvia H Green</h4>
                            <p>Khách hàng</p>
                        </div>
                    </div>
                    <div class="testimonial-quote">
                        <p>
                            Dịch vụ rất chuyên nghiệp, sản phẩm nhận được hoàn toàn xứng đáng với số tiền bỏ ra. Tôi sẽ tiếp tục ủng hộ shop trong tương lai.
                        </p>
                    </div>
                    <div class="testimonial-rate">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <div class="testimonial-quote-icon"><img src="<?= BASE_URL ?>public/assets/img/icon/quote.svg" alt=""></div>
                </div>
            </div>
        </div>
    </div>
    <div class="video-area">
        <div class="container-fluid px-0">
            <div class="video-content" style="background-image: url(<?= BASE_URL ?>public/assets/img/video/01.jpg);">
                <div class="video-wrapper">
                    <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="feature-area pb-100 pt-100">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="feature-wrap">
                <div class="row g-0">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/delivery-2.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Miễn phí vận chuyển</h4>
                                <p>Cho đơn hàng trên $120</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/refund.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Hoàn tiền 100%</h4>
                                <p>Trong vòng 30 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/payment.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Thanh toán an toàn</h4>
                                <p>Bảo mật thông tin 100%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/support.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Hỗ trợ 24/7</h4>
                                <p>Sẵn sàng phục vụ bạn</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="brand-area bg pt-50 pb-50">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="site-title">Được tin dùng bởi hơn <span>3.2k+</span> công ty</h2>
                    </div>
                </div>
            </div>
            <div class="brand-slider pt-40 pb-40 owl-carousel owl-theme">
                <div class="brand-item">
                    <img src="<?= BASE_URL ?>public/assets/img/brand/01.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="<?= BASE_URL ?>public/assets/img/brand/02.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="<?= BASE_URL ?>public/assets/img/brand/03.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="<?= BASE_URL ?>public/assets/img/brand/04.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="<?= BASE_URL ?>public/assets/img/brand/05.png" alt="">
                </div>
                <div class="brand-item">
                    <img src="<?= BASE_URL ?>public/assets/img/brand/06.png" alt="">
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>