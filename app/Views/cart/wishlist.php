<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Sản phẩm yêu thích</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Sản phẩm yêu thích</li>
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

                            <li><a class="active" href="<?= BASE_URL ?>cart/wishlist"><i class="far fa-heart"></i> Yêu thích</a></li>

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
                                    <h4 class="user-card-title">Danh sách yêu thích</h4>
                                    <div class="row mt-20">
                                        <div class="col-md-6 col-lg-4">
                                            <div class="product-item">
                                                <div class="product-img">
                                                    <span class="type new">Mới</span>
                                                    <a href="<?= BASE_URL ?>product/show/1"><img src="<?= BASE_URL ?>public/assets/img/product/e1.png" alt=""></a>
                                                    <div class="product-action-wrap">
                                                        <div class="product-action">
                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#quickview" data-tooltip="tooltip" title="Xem nhanh"><i class="far fa-eye"></i></a>
                                                            <a href="#" data-tooltip="tooltip" title="Xóa khỏi yêu thích"><i class="far fa-xmark"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h3 class="product-title"><a href="<?= BASE_URL ?>product/show/1">Tai nghe Apple Blue</a></h3>
                                                    <div class="product-rate">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="far fa-star"></i>
                                                    </div>
                                                    <div class="product-bottom">
                                                        <div class="product-price">
                                                            <span>$100.00</span>
                                                        </div>
                                                        <button type="button" class="product-cart-btn" data-bs-placement="left" data-tooltip="tooltip" title="Thêm vào giỏ">
                                                            <i class="far fa-shopping-bag"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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