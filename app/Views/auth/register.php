<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Đăng ký</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Đăng ký</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="login-area py-100">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="<?= BASE_URL ?>public/assets/img/logo/logo.png" alt="">
                        <p>Tạo tài khoản Mocart miễn phí</p>
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="far fa-exclamation-triangle"></i> 
            <?= $_SESSION['error']; ?>
            <?php unset($_SESSION['error']); // Quan trọng: Xóa ngay sau khi hiện để F5 không bị hiện lại ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['success'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="far fa-check-circle"></i> 
            <?= $_SESSION['success']; ?>
            <?php unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
                    <!-- Form đăng ký -->
                    <form action="<?= BASE_URL ?>handle-register" method="POST">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập họ tên của bạn" required>
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email của bạn" required>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu của bạn" required>
                        </div>
                        <div class="form-check form-group">
                            <input class="form-check-input" type="checkbox" value="" id="agree" required>
                            <label class="form-check-label" for="agree">
                                Tôi đồng ý với <a href="#">Điều khoản dịch vụ.</a>
                            </label>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-paper-plane"></i> Đăng ký</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Bạn đã có tài khoản? <a href="<?= BASE_URL ?>auth/login">Đăng nhập ngay.</a></p>
                        <div class="social-login">
                            <span class="social-divider">hoặc</span>
                            <p>Tiếp tục với mạng xã hội</p>
                            <div class="social-login-list">
                                <a href="#" class="fb-auth"><i class="fab fa-facebook-f"></i> Facebook</a>
                                <a href="#" class="gl-auth"><i class="fab fa-google"></i> Google</a>
                                <a href="#" class="tw-auth"><i class="fab fa-x-twitter"></i> Twitter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>