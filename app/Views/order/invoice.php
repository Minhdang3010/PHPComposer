<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>Mocart - Hóa Đơn Mua Hàng</title>

    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>public/assets/img/logo/favicon.png">

    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">

</head>

<body>

    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="invoice-area bg pt-40 pb-90">
        <div class="invoice-container not-print">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-print">
                        <a href="javascript:window.print()" class="invoice-print-btn theme-btn"><i class="far fa-print"></i> In Hóa Đơn</a>
                    </div>
                    <div class="invoice-wrapper">
                        <div class="invoice-header">
                            <div class="invoice-logo">
                                <img src="<?= BASE_URL ?>public/assets/img/logo/logo.png" alt="">
                            </div>
                            <div class="invoice-number invoice-width">
                                <h3>Hóa Đơn</h3>
                                <p>#1234567</p>
                            </div>
                        </div>
                        <div class="invoice-date-box">
                            <div class="invoice-date">
                                <h6>Ngày lập</h6>
                                <p>21/01/2025</p>
                            </div>
                            <div class="invoice-date invoice-width">
                                <h6>Ngày thanh toán</h6>
                                <p>21/01/2025</p>
                            </div>
                        </div>
                        <div class="invoice-address-box">
                            <div class="invoice-address">
                                <h5>Nhà cung cấp</h5>
                                <ul>
                                    <li>Mocart Store</li>
                                    <li>(+84) 0376 630 401</li>
                                    <li>FPT Polytechnic, TP.HCM</li>
                                </ul>
                            </div>
                            <div class="invoice-address invoice-width">
                                <h5>Khách hàng</h5>
                                <ul>
                                    <li>Đỗ Môn Chủ</li>
                                    <li>(+84) 123 456 789</li>
                                    <li>Quang Trung, Gò Vấp, TP.HCM</li>
                                </ul>
                            </div>
                        </div>
                        <div class="invoice-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>SL</th>
                                        <th>Đơn giá</th>
                                        <th>Giảm giá</th>
                                        <th>Thuế</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tai nghe Apple Blue</td>
                                        <td>01</td>
                                        <td>$150</td>
                                        <td>$20</td>
                                        <td>$10</td>
                                        <td>$140</td>
                                    </tr>
                                    <tr>
                                        <td>Giày Thể Thao Nike</td>
                                        <td>01</td>
                                        <td>$150</td>
                                        <td>$20</td>
                                        <td>$10</td>
                                        <td>$140</td>
                                    </tr>
                                    <tr>
                                        <td>Áo Thun Thời Trang</td>
                                        <td>02</td>
                                        <td>$50</td>
                                        <td>$0</td>
                                        <td>$5</td>
                                        <td>$105</td>
                                    </tr>
                                    <tr>
                                        <th colspan="5" class="text-end">Tổng cộng:</th>
                                        <th>$385</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="invoice-bottom">
                            <a href="<?= BASE_URL ?>">www.mocart.com</a>
                            <a href="mailto:domonchu@example.com">domonchu@example.com</a>
                            <a href="tel:+840376630401">(+84) 0376 630 401</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="scroll-top"><i class="far fa-arrow-up-from-arc"></i></a>
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
    <script src="<?= BASE_URL ?>public/assets/js/main.js"></script>

</body>

</html>