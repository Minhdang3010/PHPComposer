<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Thêm Địa Chỉ Mới</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Thêm địa chỉ</li>
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
                                <a href="#user-menu2" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user-menu2" class="collapsed">
                                    <i class="far fa-shopping-bag"></i> Đơn hàng <i class="far fa-angle-down user-menu-angle"></i>
                                </a>
                                <div class="collapse" id="user-menu2">
                                    <ul class="user-menu-list">
                                        <li><a href="<?= BASE_URL ?>order/list">Danh sách đơn hàng</a></li>
                                        <li><a href="<?= BASE_URL ?>order/track">Theo dõi đơn hàng</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="<?= BASE_URL ?>cart/wishlist"><i class="far fa-heart"></i> Yêu thích</a></li>
                            <li class="user-menu">
                                <a class="active" href="#user-menu3" data-bs-toggle="collapse" aria-expanded="true" aria-controls="user-menu3">
                                    <i class="far fa-location-dot"></i> Địa chỉ <i class="far fa-angle-down user-menu-angle"></i>
                                </a>
                                <div class="collapse show" id="user-menu3">
                                    <ul class="user-menu-list">
                                        <li><a href="<?= BASE_URL ?>account/addressList">Danh sách địa chỉ</a></li>
                                        <li><a class="active" href="<?= BASE_URL ?>account/storeAddress">Thêm địa chỉ</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a href="<?= BASE_URL ?>account/setting"><i class="far fa-gear"></i> Cài đặt</a></li>
                            <li><a href="<?= BASE_URL ?>auth/logout"><i class="far fa-sign-out"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="user-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-card">
                                    <div class="user-card-header">
                                        <h4 class="user-card-title">Thêm địa chỉ mới</h4>
                                        <div class="user-card-header-right">
                                            <a href="<?= BASE_URL ?>account/addressList" class="theme-btn"><span class="fas fa-arrow-left"></span> Danh sách địa chỉ</a>
                                        </div>
                                    </div>
                                    <div class="user-form">
                                        <form action="<?= BASE_URL ?>account/storeAddress" method="POST">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tên</label>
                                                        <input type="text" class="form-control" placeholder="Nhập tên">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Họ</label>
                                                        <input type="text" class="form-control" placeholder="Nhập họ">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control" placeholder="Địa chỉ Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Số điện thoại</label>
                                                        <input type="text" class="form-control" placeholder="Số điện thoại">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Địa chỉ</label>
                                                        <input type="text" class="form-control" placeholder="Địa chỉ đầy đủ của bạn">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="theme-btn"><span class="far fa-save"></span> Lưu địa chỉ</button>
                                        </form>
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
