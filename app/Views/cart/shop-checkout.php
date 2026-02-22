<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Thanh Toán</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Thanh toán</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-checkout py-100">
        <div class="container">
            <form action="<?= BASE_URL ?>cart/placeOrder" method="POST" id="checkoutForm">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="shop-checkout-step">
                            <div class="accordion" id="shopCheckout">
                                <div class="accordion-item mb-3 border">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button bg-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#step1">1. Địa chỉ nhận hàng</button>
                                    </h2>
                                    <div id="step1" class="accordion-collapse collapse show">
                                        <div class="accordion-body">
                                            <div id="address-list-container">
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border shadow-sm">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed bg-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#step2">2. Phương thức thanh toán</button>
                                    </h2>
                                    <div id="step2" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <div class="payment-methods">
                                                <div class="form-check p-3 border rounded mb-2">
                                                    <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                                                    <label class="form-check-label d-flex align-items-center" for="cod">
                                                        <img src="<?= BASE_URL ?>public/assets/img/payment/cod-3.svg" width="30" class="me-2"> Thanh toán khi nhận hàng (COD)
                                                    </label>
                                                </div>
                                                <div class="form-check p-3 border rounded mb-2">
                                                    <input class="form-check-input" type="radio" name="payment_method" id="banking" value="banking">
                                                    <label class="form-check-label d-flex align-items-center" for="banking">
                                                        <img src="<?= BASE_URL ?>public/assets/img/payment/visa.svg" width="30" class="me-2"> Thanh toán Online (VNPAY)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="shop-cart-summary sticky-top shadow-sm p-4 bg-white border rounded" style="top: 100px;">
                            <h5 class="mb-3 border-bottom pb-2">Tóm tắt đơn hàng</h5>

                            <div id="checkout-item-list" class="order-review mb-3 border-bottom pb-3" style="max-height: 200px; overflow-y: auto;"></div>

                            <div class="checkout-coupon mb-3">
                                <label class="form-label small fw-bold">Mã giảm giá</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="checkout_coupon_code" placeholder="Chọn mã..." readonly>
                                    <button class="theme-btn py-1 px-3" type="button" data-bs-toggle="modal" data-bs-target="#voucherModal">
                                        <i class="fas fa-ticket-alt"></i>
                                    </button>
                                </div>
                                <small id="checkout_coupon_msg" class="text-success mt-1 fw-bold"></small>
                            </div>

                            <div class="mb-3">
                                <label class="form-label small fw-bold">Ghi chú đơn hàng</label>
                                <textarea id="order_note" class="form-control" rows="2" placeholder="Ví dụ: Giao giờ hành chính..."></textarea>
                            </div>

                            <ul class="list-unstyled mb-0 border-top pt-3">
                                <li class="d-flex justify-content-between mb-2">Tạm tính: <span id="cart_subtotal" class="fw-bold">$0.00</span></li>
                                <li class="d-flex justify-content-between mb-2 text-success">Giảm giá: <span id="cart_discount">-$0.00</span></li>
                                <li class="d-flex justify-content-between h5 mt-3">
                                    <strong>Tổng cộng:</strong> <strong class="text-primary" id="cart_total">$0.00</strong>
                                </li>
                            </ul>

                            <button type="button" id="btn-place-order" class="btn btn-primary w-100">
                                Hoàn tất đặt hàng
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>

<div class="modal fade" id="addressModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title" id="addressModalLabel">Thông tin địa chỉ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <form id="quickAddressForm">
                    <input type="hidden" id="modal_addr_id" name="id" value="">
                    <div class="mb-3">
                        <label class="fw-bold small">Họ tên *</label>
                        <input type="text" class="form-control shadow-none" id="modal_name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold small">Email *</label>
                        <input type="email" class="form-control shadow-none" id="modal_email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold small">Số ĐT *</label>
                        <input type="text" class="form-control shadow-none" id="modal_phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold small">Địa chỉ *</label>
                        <textarea class="form-control shadow-none" id="modal_address" name="address" rows="2" required></textarea>
                    </div>
                </form>
            </div>
            <button type="button" id="btn-save-address" class="theme-btn">Lưu địa chỉ</button>
        </div>
    </div>
</div>

<div class="modal fade" id="voucherModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 shadow">
            <div class="modal-header bg-light">
                <h5 class="modal-title"><i class="fas fa-tags text-primary me-2"></i>Kho Voucher MOCART</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-light">
                <div id="voucher-list-container"></div>
            </div>
            <div class="modal-footer bg-light border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" id="btn-apply-voucher" class="theme-btn">Áp dụng</button>
            </div>
        </div>
    </div>
</div>

<script>
    // 1. Chỉ giữ lại logic Modal Address (vì nó xử lý UI Bootstrap thuần túy)
    const addressModalEl = document.getElementById('addressModal');
    if (addressModalEl) {
        addressModalEl.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget.closest('button') || event.relatedTarget;
            if (button && button.hasAttribute('data-id')) {
                document.getElementById('addressModalLabel').innerText = "Chỉnh sửa địa chỉ";
                document.getElementById('modal_addr_id').value = button.getAttribute('data-id');
                // ... (giữ nguyên logic điền form) ...
                // Lưu ý: Logic này chỉ để điền UI nhanh, logic load dữ liệu chuẩn nằm trong CartApp.openEditAddress
            } else {
                document.getElementById('addressModalLabel').innerText = "Thêm địa chỉ mới";
                document.getElementById('quickAddressForm').reset();
                document.getElementById('modal_addr_id').value = '';
            }
        });
    }

    // 2. XÓA hàm applyVoucher() ở đây.
    // Logic đó đã được chuyển vào CartAPI.applyVoucher và xử lý UI trong CartUI.renderSummary
</script>

<?php require_once "../app/Views/layout/footer.php"; ?>