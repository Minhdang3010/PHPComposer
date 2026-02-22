<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title : 'Mocart - Siêu thị điện tử' ?></title>
    <script>
        const APP_URL = "<?= BASE_URL ?>";
    </script>

    <link rel="icon" type="image/x-icon" href="<?= BASE_URL ?>public/assets/img/logo/favicon.png">

    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/all-fontawesome.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/animate.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/flex-slider.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets/css/style.css">


</head>

<body class="home-2">

    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <header class="header">

        <div class="header-top">
            <div class="container">
                <div class="header-top-wrap">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6 col-xl-5">
                            <div class="header-top-left">
                                <ul class="header-top-list">
                                    <li><a href="<?= BASE_URL ?>dang-nhap">
                                            <i class="far fa-envelopes"></i>
                                            <span>
                                                <?php
                                                // Kiểm tra nếu đã đăng nhập thì hiện email user, ngược lại hiện email hỗ trợ
                                                if (isset($_SESSION['user_email'])) {
                                                    echo htmlspecialchars($_SESSION['user_email']);
                                                } else {
                                                    echo 'Bạn chưa đăng nhập!'; // Email mặc định của cửa hàng
                                                }
                                                ?>
                                            </span></a>
                                    </li>
                                    <li><a href="tel:+840376630401"><i class="far fa-headset"></i>+84 0376 630 401</a></li>
                                    <li class="help"><a href="<?= BASE_URL ?>lien-he"><i class="far fa-comment-question"></i> Cần giúp đỡ?</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6 col-xl-7">
                            <div class="header-top-right">
                                <ul class="header-top-list">
                                    <li><a href="<?= BASE_URL ?>san-pham"><i class="far fa-timer"></i> Khuyến mãi mỗi ngày</a></li>
                                    <li class="social">
                                        <div class="header-top-social">
                                            <span>Theo dõi: </span>
                                            <a href="#"><i class="fab fa-facebook"></i></a>
                                            <a href="#"><i class="fab fa-x-twitter"></i></a>
                                            <a href="#"><i class="fab fa-instagram"></i></a>
                                            <a href="#"><i class="fab fa-linkedin"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-navigation">
                <nav class="navbar navbar-expand-lg">
                    <div class="container position-relative">
                        <a class="navbar-brand" href="<?= BASE_URL ?>">
                            <img src="<?= BASE_URL ?>public/assets/img/logo/logo.png" alt="logo">
                        </a>
                        <div class="mobile-menu-right">
                            <div class="mobile-menu-btn">
                                <a href="#" class="nav-right-link search-box-outer"><i class="far fa-search"></i></a>
                                <a href="<?= BASE_URL ?>yeu-thich" class="nav-right-link"><i class="far fa-heart"></i><span>2</span></a>
                                <a href="<?= BASE_URL ?>gio-hang" class="nav-right-link">
                                    <i class="far fa-shopping-bag"></i>
                                    <span class="cart-count">0</span> </a>
                            </div>
                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                                aria-label="Toggle navigation">
                                <span></span><span></span><span></span>
                            </button>
                        </div>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                            <div class="offcanvas-header">
                                <a href="<?= BASE_URL ?>" class="offcanvas-brand">
                                    <img src="<?= BASE_URL ?>public/assets/img/logo/logo.png" alt="">
                                </a>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav justify-content-end flex-grow-1">
                                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>">Trang chủ</a></li>

                                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>danh-muc">Cửa Hàng</a></li>


                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Trang</a>
                                        <ul class="dropdown-menu fade-down">
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>quen-mat-khau">Quên mật khẩu</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>chinh-sach">Chính sách đổi trả</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>hoa-don">Hóa đơn</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>cau-hoi-thuong-gap">Câu hỏi thường gặp</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>404">Lỗi 404</a></li>
                                        </ul>
                                    </li> -->

                                    <!-- <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Cửa hàng</a>
                                        <ul class="dropdown-menu fade-down">
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>cua-hang">Tất cả sản phẩm</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>tim-kiem">Tìm kiếm sản phẩm</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>gio-hang">Giỏ hàng</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>thanh-toan">Thanh toán</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>hoan-tat-don-hang">Hoàn tất thanh toán</a></li>
                                        </ul>
                                    </li> -->

                                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>lien-he">Liên hệ</a></li>


                                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>gioi-thieu">Giới thiệu</a></li>

                                    <li class="nav-item"><a class="nav-link" href="<?= BASE_URL ?>cau-hoi-thuong-gap">FAQ</a></li>


                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Tài khoản</a>
                                        <ul class="dropdown-menu fade-down">
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>tai-khoan">Bảng điều khiển</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>ho-so">Hồ sơ của tôi</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>don-hang-cua-toi">Danh sách đơn hàng</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>theo-doi-don-hang">Theo dõi đơn hàng</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>yeu-thich">Sản phẩm yêu thích</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>so-dia-chi">Danh sách địa chỉ</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>cai-dat-tai-khoan">Cài đặt</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>dang-nhap">Đăng nhập</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>dang-ky">Đăng ký</a></li>
                                            <li><a class="dropdown-item" href="<?= BASE_URL ?>dang-xuat">Đăng xuất</a></li>
                                        </ul>
                                    </li>


                                </ul>
                                <div class="nav-right icon">
                                    <a href="#" class="nav-right-link search-box-outer"><i class="far fa-search"></i></a>
                                    <a href="<?= BASE_URL ?>yeu-thich" class="nav-right-link"><i class="far fa-heart"></i><span>2</span></a>
                                    <a href="<?= BASE_URL ?>gio-hang" class="nav-right-link">
                                        <i class="far fa-shopping-bag"></i>
                                        <span class="cart-count">0</span> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
    </header>

    <div class="search-popup">
        <button class="close-search"><span class="far fa-times"></span></button>
        <form action="<?= BASE_URL ?>tim-kiem" method="GET">
            <div class="form-group">
                <input type="search" name="keyword" class="form-control" placeholder="Tìm kiếm tại đây..." required>
                <button type="submit"><i class="far fa-search"></i></button>
            </div>
        </form>
    </div>