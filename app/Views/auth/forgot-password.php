<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Quên Mật Khẩu</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Quên mật khẩu</li>
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
                        <p>Đặt lại mật khẩu tài khoản Mocart</p>
                    </div>
                    <form action="<?= BASE_URL ?>auth/forgotPassword" method="POST">
                        <div class="form-group">
                            <label>Địa chỉ Email</label>
                            <input type="email" class="form-control" placeholder="Nhập Email của bạn" required>
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-key"></i> Gửi liên kết đặt lại</button>
                        </div>
                    </form>

                    <div class="login-footer mt-3">
                        <p>Nhớ mật khẩu? <a href="<?= BASE_URL ?>auth/login">Đăng nhập ngay.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>