<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">
    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Hồ Sơ Của Tôi</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Hồ sơ của tôi</li>
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
                                </div>
                            <h5><?= htmlspecialchars($user['name'] ?? 'Khách') ?></h5>
                            <p><?= htmlspecialchars($user['email'] ?? '') ?></p>
                        </div>
                        <ul class="sidebar-list">
                            <li><a class="active" href="<?= BASE_URL ?>profile"><i class="far fa-user"></i> Hồ sơ của tôi</a></li>
                            <li><a href="<?= BASE_URL ?>account/orders"><i class="far fa-shopping-bag"></i> Đơn mua</a></li>
                            <li><a href="<?= BASE_URL ?>account/address"><i class="far fa-map-marker-alt"></i> Địa chỉ</a></li>
                            <li><a href="<?= BASE_URL ?>logout"><i class="far fa-sign-out"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="user-wrapper">
                        
                        <?php if (isset($_GET['update']) && $_GET['update'] == 'success'): ?>
                            <div class="alert alert-success">Cập nhật thông tin thành công!</div>
                        <?php elseif (isset($_GET['update']) && $_GET['update'] == 'fail'): ?>
                            <div class="alert alert-danger">Có lỗi xảy ra, vui lòng thử lại.</div>
                        <?php endif; ?>

                        <?php if (isset($_GET['password']) && $_GET['password'] == 'success'): ?>
                            <div class="alert alert-success">Đổi mật khẩu thành công!</div>
                        <?php elseif (isset($_GET['error'])): ?>
                            <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
                        <?php endif; ?>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-card">
                                    <h4 class="user-card-title">Thông tin cá nhân</h4>
                                    <form action="<?= BASE_URL ?>update-profile" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Họ và tên</label>
                                                    <input type="text" name="full_name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" readonly style="background-color: #e9ecef;">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Số điện thoại</label>
                                                    <input type="text" name="phone" class="form-control" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" placeholder="Thêm số điện thoại">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Địa chỉ</label>
                                                    <input type="text" name="address" class="form-control" value="<?= htmlspecialchars($user['address'] ?? '') ?>" placeholder="Thêm địa chỉ giao hàng">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="theme-btn"><span class="far fa-user"></span> Lưu thay đổi</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="user-card">
                                    <h4 class="user-card-title">Đổi mật khẩu</h4>
                                    <form action="<?= BASE_URL ?>change-password" method="POST">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mật khẩu hiện tại</label>
                                                    <input type="password" name="current_password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Mật khẩu mới</label>
                                                    <input type="password" name="new_password" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Nhập lại mật khẩu mới</label>
                                                    <input type="password" name="confirm_password" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="theme-btn"><span class="far fa-key"></span> Đổi mật khẩu</button>
                                    </form>
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
