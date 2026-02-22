<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Danh mục sản phẩm</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Danh mục</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="category-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline">Danh mục của chúng tôi</span>
                        <h2 class="site-title">Khám phá <span>Danh mục phổ biến</span></h2>
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $cat): ?>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="category-item">
                                <a href="<?= BASE_URL ?>danh-muc/<?= $cat['slug'] ?>">
                                    <div class="category-info">
                                        <div class="icon">
                                            <?php 
                                                $iconImg = !empty($cat['icon']) ? $cat['icon'] : 'fashion.svg'; 
                                            ?>
                                            <img src="<?= BASE_URL ?>public/assets/img/icon/<?= $iconImg ?>" alt="<?= htmlspecialchars($cat['name']) ?>">
                                        </div>
                                        <div class="content">
                                            <h4><?= htmlspecialchars($cat['name']) ?></h4>
                                            
                                            </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p class="text-center">Chưa có danh mục nào được cập nhật.</p>
                    </div>
                <?php endif; ?>
                </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>