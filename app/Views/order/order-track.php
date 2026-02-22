<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Theo dõi đơn hàng</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Theo dõi đơn hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="user-area bg-2 py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar-top">
                            <div class="sidebar-profile-img">
                                <img src="<?= BASE_URL ?>public/assets/img/account/03.jpg" alt="">
                                <button type="button" class="profile-img-btn"><i class="far fa-camera"></i></button>
                                <input type="file" class="profile-img-file">
                            </div>
                            <h5>Đỗ Môn Chủ</h5>
                            <p>domonchu@example.com</p>
                        </div>
                        <ul class="sidebar-list">
                            <li><a href="<?= BASE_URL ?>account/dashboard"><i class="far fa-gauge-high"></i> Bảng điều khiển</a></li>

                            <li><a href="<?= BASE_URL ?>account/profile"><i class="far fa-user"></i> Hồ sơ của tôi</a></li>

                            <li class="user-menu">
                                <a class="active" href="#user-menu2" data-bs-toggle="collapse" aria-expanded="true" aria-controls="user-menu2">
                                    <i class="far fa-shopping-bag"></i> Đơn hàng <i class="far fa-angle-down user-menu-angle"></i>
                                </a>
                                <div class="collapse show" id="user-menu2">
                                    <ul class="user-menu-list">
                                        <li><a href="<?= BASE_URL ?>order/list">Danh sách đơn hàng</a></li>
                                        <li><a class="active" href="<?= BASE_URL ?>order/track">Theo dõi đơn hàng</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li><a href="<?= BASE_URL ?>cart/wishlist"><i class="far fa-heart"></i> Yêu thích</a></li>

                            <li class="user-menu">
                                <a href="#user-menu3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user-menu3" class="collapsed">
                                    <i class="far fa-location-dot"></i> Địa chỉ <i class="far fa-angle-down user-menu-angle"></i>
                                </a>
                                <div class="collapse" id="user-menu3">
                                    <ul class="user-menu-list">
                                        <li><a href="<?= BASE_URL ?>account/address">Danh sách địa chỉ</a></li>
                                        <li><a href="<?= BASE_URL ?>account/addressAdd">Thêm địa chỉ</a></li>
                                    </ul>
                                </div>
                            </li>

                            <li><a href="<?= BASE_URL ?>account/notification"><i class="far fa-bell"></i> Thông báo <span class="badge badge-danger">02</span></a></li>
                            <li><a href="<?= BASE_URL ?>account/setting"><i class="far fa-gear"></i> Cài đặt</a></li>
                            <li><a href="<?= BASE_URL ?>auth/logout"><i class="far fa-sign-out"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="user-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-card user-track-order">
                                    <h4 class="user-card-title">Theo dõi đơn hàng của tôi</h4>
                                    <div class="track-order-content">
                                        <h5>Mã đơn hàng theo dõi: <span>#35VR5K54</span></h5>
                                        <div class="track-order-info">
                                            <a href="#"><span>Vận chuyển qua:</span> Giao hàng nhanh</a>
                                            <a href="#"><span>Trạng thái:</span> Đang kiểm tra chất lượng</a>
                                            <a href="#"><span>Ngày dự kiến:</span> 27 Tháng 1, 2025</a>
                                        </div>
                                        <div class="track-order-step">
                                            <div class="step-item completed">
                                                <div class="step-icon">
                                                    <i class="fal fa-shopping-cart"></i>
                                                </div>
                                                <h6>Đã xác nhận đơn hàng</h6>
                                            </div>
                                            <div class="step-item completed">
                                                <div class="step-icon">
                                                    <i class="fal fa-cog"></i>
                                                </div>
                                                <h6>Đang xử lý đơn hàng</h6>
                                            </div>
                                            <div class="step-item completed">
                                                <div class="step-icon">
                                                    <i class="fal fa-check-circle"></i>
                                                </div>
                                                <h6>Kiểm tra chất lượng</h6>
                                            </div>
                                            <div class="step-item">
                                                <div class="step-icon">
                                                    <i class="fal fa-truck-fast"></i>
                                                </div>
                                                <h6>Đang vận chuyển</h6>
                                            </div>
                                            <div class="step-item">
                                                <div class="step-icon">
                                                    <i class="fal fa-home"></i>
                                                </div>
                                                <h6>Đã giao hàng</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>