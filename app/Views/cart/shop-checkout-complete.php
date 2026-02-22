<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Hoàn Tất Đơn Hàng</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Hoàn tất</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shop-checkout-complete py-120">
        <div class="container">
            <div class="row">
                <div class="col-md-7 mx-auto">
                    <div class="checkout-complete-content">
                        <div class="checkout-complete-icon"><i class="far fa-check"></i></div>
                        <h3>Cảm ơn bạn đã đặt hàng!</h3>
                        <p>Đơn hàng của bạn đã được đặt và sẽ được xử lý sớm nhất có thể. Vui lòng lưu lại mã đơn hàng của bạn là <b><?= htmlspecialchars($orderCode) ?></b>. Bạn sẽ sớm nhận được email xác nhận đơn hàng.</p>
                        <a href="<?= BASE_URL ?>product" class="theme-btn">Tiếp tục mua sắm <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>