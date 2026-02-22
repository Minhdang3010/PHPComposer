<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Giỏ Hàng</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-cart py-100">
        <div class="container">
            <div class="shop-cart-wrap">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart-body">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="shop-cart-footer">
                            <div class="row">
                                <div class="col-md-7 col-lg-6">
                                    <div class="shop-cart-coupon">
                                        <p class="mb-2 fw-bold">Mã giảm giá</p>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="cart_coupon_code" placeholder="Chọn hoặc nhập mã" readonly>
                                            <button class="theme-btn" type="button" data-bs-toggle="modal" data-bs-target="#voucherModal">
                                                <i class="fas fa-ticket-alt"></i> Chọn Mã
                                            </button>
                                        </div>
                                        <small id="cart_coupon_msg" class="text-success mt-1 fw-bold"></small>
                                    </div>
                                </div>
                                <div class="col-md-5 col-lg-6">
                                    <div class="shop-cart-btn text-md-end">
                                        <a href="<?= BASE_URL ?>product" class="theme-btn"><span class="fas fa-arrow-left"></span> Tiếp tục mua sắm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="shop-cart-summary">
                            <h5>Tổng Giỏ Hàng</h5>
                            <ul>
                                <li><strong>Tạm tính:</strong> <span id="cart_subtotal"></span></li>
                                <li><strong>Giảm giá:</strong> <span id="cart_discount" class="text-success">-$0.00</span></li>
                                <li class="shop-cart-total">
                                    <strong>Tổng cộng:</strong>
                                    <span id="cart_total">$0.00</span>
                                </li>
                            </ul>
                            <div class="text-end mt-40">
                                <a href="<?= BASE_URL ?>cart/checkout" class="theme-btn">Thanh toán ngay <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="voucherModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title">Kho Voucher MOCART</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body bg-light">
                    <div id="voucher-list-container">
                        <div class="text-center p-3">
                            <div class="spinner-border spinner-border-sm"></div> Đang tải...
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="button" id="btn-apply-voucher-cart" class="theme-btn">Áp dụng</button>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once "../app/Views/layout/footer.php"; ?>