<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Lỗi 404</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Lỗi 404</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="error-area py-100">
        <div class="container">
            <div class="col-md-6 mx-auto">
                <div class="error-wrapper">
                    <div class="error-img">
                        <img src="<?= BASE_URL ?>public/assets/img/error/01.png" alt="Lỗi 404">
                    </div>
                    <h2>Ôi không... Không tìm thấy trang!</h2>
                    <p>Trang bạn đang tìm kiếm có thể không tồn tại, đã bị xóa hoặc đường dẫn bị thay đổi.</p>
                    <a href="<?= BASE_URL ?>" class="theme-btn">Quay lại trang chủ <i class="far fa-home"></i></a>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>