<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Cài Đặt</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Cài đặt</li>
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
                                <a href="#user-menu3" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user-menu3" class="collapsed">
                                    <i class="far fa-location-dot"></i> Địa chỉ <i class="far fa-angle-down user-menu-angle"></i>
                                </a>
                                <div class="collapse" id="user-menu3">
                                    <ul class="user-menu-list">
                                        <li><a href="<?= BASE_URL ?>account/addressList">Danh sách địa chỉ</a></li>
                                        <li><a href="<?= BASE_URL ?>account/addressAdd">Thêm địa chỉ</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li><a class="active" href="<?= BASE_URL ?>account/setting"><i class="far fa-gear"></i> Cài đặt</a></li>
                            <li><a href="<?= BASE_URL ?>auth/logout"><i class="far fa-sign-out"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="user-wrapper">
                        <div class="user-card user-setting">
                            <h4 class="user-card-title">Cài đặt tài khoản</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="mb-3">Cài đặt riêng tư</h6>
                                    <div class="privacy-setting">
                                        <form action="<?= BASE_URL ?>account/updateSettings" method="POST">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="1" type="checkbox" role="switch" id="privacy-setting-1" checked>
                                                <label class="form-check-label" for="privacy-setting-1">Bật tin nhắn</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="2" type="checkbox" role="switch" id="privacy-setting-2">
                                                <label class="form-check-label" for="privacy-setting-2">Nhận thông báo qua Email</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="3" type="checkbox" role="switch" id="privacy-setting-3" checked>
                                                <label class="form-check-label" for="privacy-setting-3">Ẩn số điện thoại công khai</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="4" type="checkbox" role="switch" id="privacy-setting-4">
                                                <label class="form-check-label" for="privacy-setting-4">Tôi muốn nhận tin nhắn quảng cáo</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="5" type="checkbox" role="switch" id="privacy-setting-5" checked>
                                                <label class="form-check-label" for="privacy-setting-5">Đặt hồ sơ ở chế độ riêng tư</label>
                                            </div>
                                            <div class="my-4">
                                                <button type="submit" class="theme-btn"><span class="far fa-gear"></span> Cập nhật cài đặt</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="mb-3">Xóa tài khoản</h6>
                                    <div class="user-form">
                                        <form action="<?= BASE_URL ?>account/deleteAccount" method="POST" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tài khoản này vĩnh viễn không? Hành động này không thể hoàn tác!');">
                                            <div class="form-group">
                                                <select class="select mb-4">
                                                    <option value="">Chọn lý do</option>
                                                    <option value="1">Tôi không muốn sử dụng nữa</option>
                                                    <option value="2">Tôi có tài khoản khác</option>
                                                    <option value="3">Lý do khác</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" cols="30" rows="4" placeholder="Mô tả lý do của bạn..."></textarea>
                                            </div>
                                            <button type="submit" class="theme-btn"><span class="far fa-trash-can"></span> Xóa tài khoản</button>
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
