<footer class="footer-area ft-bg">
    <div class="footer-widget">
        <div class="container">
            <div class="row footer-widget-wrapper pt-100 pb-40">
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box about-us">
                        <a href="<?= BASE_URL ?>" class="footer-logo">
                            <img src="<?= BASE_URL ?>public/assets/img/logo/logo-light.png" alt="">
                        </a>
                        <p class="mb-3">
                            Chúng tôi cung cấp các sản phẩm chất lượng cao với dịch vụ tốt nhất, mang lại trải nghiệm mua sắm tuyệt vời cho khách hàng.
                        </p>
                        <ul class="footer-contact">
                            <li><a href="tel:+840376630401"><i class="far fa-phone"></i>+84 0376 630 401</a></li>
                            <li><i class="far fa-map-marker-alt"></i>FPT Polytechnic, TP.HCM</li>
                            <li><i class="far fa-clock"></i>Thứ 2 - Thứ 6 (9.00AM - 8.00PM)</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Liên Kết Nhanh</h4>
                        <ul class="footer-list">
                            <li><a href="<?= BASE_URL ?>gioi-thieu">Về Chúng Tôi</a></li>
                            <li><a href="<?= BASE_URL ?>lien-he">Liên Hệ</a></li>
                            <li><a href="<?= BASE_URL ?>cau-hoi-thuong-gap">Câu Hỏi Thường Gặp</a></li>
                            <li><a href="<?= BASE_URL ?>chinh-sach">Chính Sách Đổi Trả</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Cửa Hàng</h4>
                        <ul class="footer-list">
                            <li><a href="<?= BASE_URL ?>cua-hang">Tất cả sản phẩm</a></li>
                            <li><a href="<?= BASE_URL ?>danh-muc">Danh mục</a></li>
                            <li><a href="<?= BASE_URL ?>gio-hang">Giỏ hàng</a></li>
                            <li><a href="<?= BASE_URL ?>thanh-toan">Thanh toán</a></li>
                            <li><a href="<?= BASE_URL ?>yeu-thich">Sản phẩm yêu thích</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Tải Ứng Dụng</h4>
                        <p>Ứng dụng Mocart hiện đã có mặt trên App Store & Google Play.</p>
                        <div class="footer-download">
                            <div class="footer-download-btn">
                                <a href="#">
                                    <i class="fab fa-google-play"></i>
                                    <div class="download-btn-info">
                                        <span>Tải ngay trên</span>
                                        <h6>Google Play</h6>
                                    </div>
                                </a>
                                <a href="#">
                                    <i class="fab fa-app-store"></i>
                                    <div class="download-btn-info">
                                        <span>Tải ngay trên</span>
                                        <h6>App Store</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="copyright-wrap">
                <div class="row">
                    <div class="col-12 col-lg-6 align-self-center">
                        <p class="copyright-text">
                            &copy; Bản quyền <span id="date"></span> <a href="<?= BASE_URL ?>"> Mocart </a>. Bảo lưu mọi quyền.
                        </p>
                    </div>
                    <div class="col-12 col-lg-6 align-self-center">
                        <div class="footer-social">
                            <span>Theo dõi chúng tôi:</span>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-x-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>

<div class="modal quickview fade" id="quickview" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal"><i class="far fa-xmark"></i></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="quickview-img">
                            <img src="<?= BASE_URL ?>public/assets/img/product/e1.png" alt="#">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="quickview-content">
                            <h4 class="quickview-title">Tên sản phẩm</h4>
                            <div class="quickview-cart">
                                <a href="#" class="theme-btn">Thêm vào giỏ hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="quickview" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="row">
                    <div class="col-md-6">
                        <div class="quickview-img">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h4 class="product-title"></h4>
                        <div class="price">
                            <span class="new-price"></span>
                        </div>
                        <p class="product-desc"></p>
                        <a href="#" class="theme-btn btn-view-detail">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?= BASE_URL ?>public/assets/js/jquery-3.7.1.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modernizr.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/jquery.magnific-popup.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/isotope.pkgd.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/jquery.appear.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/jquery.easing.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/owl.carousel.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/counter-up.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/jquery-ui.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/jquery.nice-select.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/countdown.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/wow.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/flex-slider.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/apexcharts.min.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/apexchart-custom.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/main.js"></script>

<script src="<?= BASE_URL ?>public/assets/js/modules/cart/cart-api.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modules/cart/cart-ui.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modules/cart/cart-controller.js"></script> 
<!-- controller luôn nằm cuối cùng so với api và ui -->

<script src="<?= BASE_URL ?>public/assets/js/modules/user/user-api.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modules/user/user-ui.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modules/user/user-controller.js"></script>

<script src="<?= BASE_URL ?>public/assets/js/modules/order/order-api.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modules/order/order-ui.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modules/order/order-controller.js"></script>

<script src="<?= BASE_URL ?>public/assets/js/modules/product/product-api.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modules/product/product-ui.js"></script>
<script src="<?= BASE_URL ?>public/assets/js/modules/product/product-controller.js"></script>