<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Danh Sách Địa Chỉ</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Danh sách địa chỉ</li>
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
                                        <li><a class="active" href="<?= BASE_URL ?>account/addressList">Danh sách địa chỉ</a></li>
                                        <li><a href="<?= BASE_URL ?>account/addressAdd">Thêm địa chỉ</a></li>
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
                                        <h4 class="user-card-title">Danh sách địa chỉ</h4>
                                        <div class="user-card-header-right">
                                            <a href="<?= BASE_URL ?>account/addressAdd" class="theme-btn"><span class="far fa-plus-circle"></span> Thêm địa chỉ</a>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Tên</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Email</th>
                                                    <th>Điện thoại</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="table-list-code">Đỗ Minh Đăng</span></td>
                                                    <td>FPT Polytechnic, TP.HCM</td>
                                                    <td>dominhdang3010@gmail.com</td>
                                                    <td>(+84) 0376 630 401</td>
                                                    <td>
                                                        <a href="<?= BASE_URL ?>account/addressEdit/1" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Sửa"><i class="far fa-pen"></i></a>
                                                        <a href="<?= BASE_URL ?>account/addressDelete/1" class="btn btn-outline-danger btn-sm rounded-2" data-tooltip="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa địa chỉ này?');"><i class="far fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="table-list-code">Môn Chủ</span></td>
                                                    <td>Quang Trung, TP.HCM</td>
                                                    <td>domonchu@example.com</td>
                                                    <td>(+84) 123 456 789</td>
                                                    <td>
                                                        <a href="<?= BASE_URL ?>account/addressEdit/2" class="btn btn-outline-secondary btn-sm rounded-2" data-tooltip="tooltip" title="Sửa"><i class="far fa-pen"></i></a>
                                                        <a href="<?= BASE_URL ?>account/addressDelete/1" class="btn btn-outline-danger btn-sm rounded-2" data-tooltip="tooltip" title="Xóa" onclick="return confirm('Bạn có chắc muốn xóa địa chỉ này?');"><i class="far fa-trash-can"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
