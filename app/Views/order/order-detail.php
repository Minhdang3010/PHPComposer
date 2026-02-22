<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Danh Sách Đơn Hàng</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Danh sách đơn hàng</li>
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
                                        <li><a class="active" href="<?= BASE_URL ?>order/list">Danh sách đơn hàng</a></li>
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
                                        <li><a href="<?= BASE_URL ?>account/address">Danh sách địa chỉ</a></li>
                                        <li><a href="<?= BASE_URL ?>account/address-add">Thêm địa chỉ</a></li>
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
                                <div class="user-card">
                                    <div class="user-card-header">
                                        <h4 class="user-card-title">Danh sách đơn hàng</h4>
                                        <div class="user-card-header-right">
                                            <div class="user-card-filter">
                                                <select class="select">
                                                    <option value="">Tất cả</option>
                                                    <option value="1">Chờ xử lý</option>
                                                    <option value="2">Đang xử lý</option>
                                                    <option value="3">Hoàn thành</option>
                                                    <option value="4">Đã hủy</option>
                                                </select>
                                            </div>
                                            <div class="user-card-search">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" placeholder="Tìm kiếm đơn hàng...">
                                                    <i class="far fa-search"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-borderless text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Mã đơn</th>
                                                    <th>Ngày mua</th>
                                                    <th>Tổng tiền</th>
                                                    <th>Trạng thái</th>
                                                    <th>Hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><span class="table-list-code">#35VR5K54</span></td>
                                                    <td>21 Tháng 1, 2025</td>
                                                    <td>$3,650</td>
                                                    <td><span class="badge badge-info">Chờ xử lý</span></td>
                                                    <td>
                                                        <div class="user-action-dropdown dropdown">
                                                            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="far fa-ellipsis"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="<?= BASE_URL ?>order/detail/1"><i class="far fa-eye"></i> Chi tiết</a></li>
                                                                <li><a class="dropdown-item" href="#"><i class="far fa-xmark-circle"></i> Hủy đơn</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="table-list-code">#35VR5K55</span></td>
                                                    <td>21 Tháng 1, 2025</td>
                                                    <td>$3,650</td>
                                                    <td><span class="badge badge-primary">Đang xử lý</span></td>
                                                    <td>
                                                        <div class="user-action-dropdown dropdown">
                                                            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="far fa-ellipsis"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="<?= BASE_URL ?>order/detail/2"><i class="far fa-eye"></i> Chi tiết</a></li>
                                                                <li><a class="dropdown-item" href="<?= BASE_URL ?>order/track"><i class="far fa-truck"></i> Theo dõi</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="table-list-code">#35VR5K56</span></td>
                                                    <td>21 Tháng 1, 2025</td>
                                                    <td>$3,650</td>
                                                    <td><span class="badge badge-success">Hoàn thành</span></td>
                                                    <td>
                                                        <div class="user-action-dropdown dropdown">
                                                            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="far fa-ellipsis"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="<?= BASE_URL ?>order/detail/3"><i class="far fa-eye"></i> Chi tiết</a></li>
                                                                <li><a class="dropdown-item" href="<?= BASE_URL ?>order/invoice/3"><i class="far fa-file-invoice"></i> Hóa đơn</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><span class="table-list-code">#35VR5K57</span></td>
                                                    <td>21 Tháng 1, 2025</td>
                                                    <td>$3,650</td>
                                                    <td><span class="badge badge-danger">Đã hủy</span></td>
                                                    <td>
                                                        <div class="user-action-dropdown dropdown">
                                                            <button class="btn btn-sm btn-outline-secondary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                <i class="far fa-ellipsis"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li><a class="dropdown-item" href="<?= BASE_URL ?>order/detail/4"><i class="far fa-eye"></i> Chi tiết</a></li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="pagination-area mt-4 mb-3">
                                        <div aria-label="Page navigation example">
                                            <ul class="pagination">
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                                    </a>
                                                </li>
                                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                                                    </a>
                                                </li>
                                            </ul>
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