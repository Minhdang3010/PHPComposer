<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <!-- hero section -->
    <div class="hero-section hs-1">
        <div class="hero-single" style="background-image: url(<?= BASE_URL ?>public/assets/img/hero/bg.png);">
            <div class="container position-relative">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="hero-content">
                            <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Chỉ từ $15.99</h6>
                            <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                Khám phá xu hướng mới cho <span>phong cách</span> mỗi ngày.
                            </h1>
                            <p data-animation="fadeInLeft" data-delay=".75s">
                                Có rất nhiều biến thể của các đoạn văn bản sẵn có, nhưng phần lớn đã được thay đổi
                                dưới một hình thức nào đó để phù hợp hơn với lối sống hiện đại của bạn.
                            </p>
                            <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                <a href="<?= BASE_URL ?>gioi-thieu" class="theme-btn">Tìm Hiểu Thêm<i class="fas fa-arrow-right"></i></a>
                                <a href="<?= BASE_URL ?>cua-hang" class="theme-btn theme-btn2">Mua Ngay<i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="hero-right">
                            <div class="hero-img">
                                <img src="<?= BASE_URL ?>public/assets/img/hero/hero-1.png" alt="">
                            </div>
                            <div class="hero-img-info">
                                <div class="icon">
                                    <img src="<?= BASE_URL ?>public/assets/img/icon/delivery.svg" alt="">
                                </div>
                                <h6>Giao hàng trong vòng 30 phút</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero section end -->


    <!-- search-product -->
    <div class="search-product">
        <div class="container">
            <div class="col-lg-12 col-xl-9">
                <div class="search-form">
                    <h5>Tìm kiếm sản phẩm</h5>
                    <form action="<?= BASE_URL ?>tim-kiem">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <select class="select" name="category">
                                        <option value="">Tất cả danh mục</option>
                                        <option value="1">Ưu đãi cực hot hôm nay</option>
                                        <option value="2">Tai nghe & Loa</option>
                                        <option value="3">Laptop & Máy tính</option>
                                        <option value="4">Thực phẩm & Chợ</option>
                                        <option value="5">Âm nhạc</option>
                                        <option value="6">Nhà cửa & Nội thất</option>
                                        <option value="7">Đồ chơi & Trò chơi</option>
                                        <option value="8">Quà tặng</option>
                                        <option value="9">Mẹ & Bé</option>
                                        <option value="10">Thể thao & Ngoài trời</option>
                                        <option value="11">Sức khỏe & Làm đẹp</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="form-group">
                                    <select class="select" name="brand">
                                        <option value="">Tất cả thương hiệu</option>
                                        <option value="1">Thương hiệu Một</option>
                                        <option value="2">Thương hiệu Hai</option>
                                        <option value="3">Thương hiệu Ba</option>
                                        <option value="4">Thương hiệu Bốn</option>
                                        <option value="5">Thương hiệu Năm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="keyword" placeholder="Nhập từ khóa...">
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <button type="submit" class="theme-btn"><span class="far fa-search"></span>Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- search-product -->


    <!-- category area -->
    <div class="category-area pt-80 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                    <div class="site-heading-inline">
                        <h2 class="site-title">Danh mục nổi bật</h2>
                        <a href="<?= BASE_URL ?>danh-muc">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="category-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/fashion.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Balo, túi chống sốc</h4>
                                <p>30 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/electronics.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Laptop & Máy tính</h4>
                                <p>25 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/grocery.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Linh kiện & Thiết bị</h4>
                                <p>15 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/music.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Tai nghe & Loa</h4>
                                <p>05 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/furniture.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Bàn ghế Gaming</h4>
                                <p>30 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/toy.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Máy chơi game</h4>
                                <p>12 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/gift.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Quà tặng</h4>
                                <p>08 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/baby-mom.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Mẹ & Bé</h4>
                                <p>14 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/beauty.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Sức khỏe & Làm đẹp</h4>
                                <p>24 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/sports.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Thể thao & Ngoài trời</h4>
                                <p>09 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/garden.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Nhà cửa & Sân vườn</h4>
                                <p>16 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="category-item">
                    <a href="<?= BASE_URL ?>cua-hang">
                        <div class="category-info">
                            <div class="icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/automotive.svg" alt="">
                            </div>
                            <div class="content">
                                <h4>Ô tô & Xe máy</h4>
                                <p>19 Sản phẩm</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- category area end-->


    <!-- small banner -->
    <div class="small-banner pb-100">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="row g-4">
                <?php if (!empty($firstSmall)): ?>

                    <?php foreach ($firstSmall as $banner): ?>
                        <?php if ($banner): ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="banner-item">
                                    <img src="<?= BASE_URL ?>public/assets/img/banner/<?= $banner['image'] ?>" alt="<?= htmlspecialchars($banner['title']) ?>">

                                    <div class="banner-content">
                                        <p><?= htmlspecialchars($banner['title']) ?></p>
                                        <h3><?= $banner['subtitle'] ?></h3>
                                        <a href="<?= BASE_URL . $banner['link'] ?>"><?= htmlspecialchars($banner['button_text']) ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>

                <?php else: ?>
                    <p>Hiện chưa có khuyến mãi nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- small banner end -->


    <!-- trending item -->
    <div class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                    <div class="site-heading-inline">
                        <h2 class="site-title">Sản phẩm xu hướng</h2>
                        <a href="<?= BASE_URL ?>cua-hang">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="product-wrap wow fadeInUp" data-wow-delay=".25s">
                <div class="product-slider owl-carousel owl-theme">
                    <?php if (!empty($trendingProducts)): ?>
                        <?php foreach ($trendingProducts as $item): ?>
                            <div class="product-item">
                                <div class="product-img">
                                    <?php if ($item['sale_price'] > 0 && $item['sale_price'] < $item['price']): ?>
                                        <span class="type discount">Sale</span>
                                    <?php else: ?>
                                        <span class="type new">Mới</span>
                                    <?php endif; ?>

                                    <a href="<?= BASE_URL ?>chi-tiet/<?= $item['slug'] ?>" data-action="view-detail" data-id="<?= $item['id'] ?>" data-slug="<?= $item['slug'] ?>">
                                        <img src="<?= BASE_URL ?>public/assets/img/product/<?= $item['thumbnail'] ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                    </a>

                                    <div class="product-action-wrap">
                                        <div class="product-action">
                                            <a href="<?= BASE_URL ?>chi-tiet/<?= $item['slug'] ?>" data-action="view-detail" data-id="<?= $item['id'] ?>" data-slug="<?= $item['slug'] ?>" data-tooltip="tooltip" title="Xem nhanh">
                                                <i class="far fa-eye"></i>
                                            </a>

                                            <a href="javascript:void(0)" data-action="add-to-wishlist" data-id="<?= $item['id'] ?>" data-tooltip="tooltip" title="Yêu thích">
                                                <i class="far fa-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title">
                                        <a href="<?= BASE_URL ?>chi-tiet/<?= $item['slug'] ?>" data-action="view-detail" data-id="<?= $item['id'] ?>" data-slug="<?= $item['slug'] ?>">
                                            <?= htmlspecialchars($item['name']) ?>
                                        </a>
                                    </h3>
                                    <div class="product-rate">
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                    </div>
                                    <div class="product-bottom">
                                        <div class="product-price">
                                            <?php if ($item['sale_price'] > 0 && $item['sale_price'] < $item['price']): ?>
                                                <del>$<?= number_format($item['price'], 2) ?></del>
                                                <span>$<?= number_format($item['sale_price'], 2) ?></span>
                                            <?php else: ?>
                                                <span>$<?= number_format($item['price'], 2) ?></span>
                                            <?php endif; ?>
                                        </div>
                                        <button type="button" class="product-cart-btn" data-action="add-to-cart" data-id="<?= $item['id'] ?>" title="Thêm vào giỏ hàng">
                                            <i class="far fa-shopping-bag"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Chưa có sản phẩm xu hướng.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- trending item end -->


    <!-- feature area -->
    <div class="feature-area pb-100">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="feature-wrap">
                <div class="row g-0">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/delivery-2.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Miễn phí vận chuyển</h4>
                                <p>Cho đơn hàng trên $120</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/refund.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Chính sách hoàn tiền</h4>
                                <p>Đổi trả trong vòng 30 ngày</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/payment.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Thanh toán an toàn</h4>
                                <p>Bảo mật thanh toán 100%</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="feature-item">
                            <div class="feature-icon">
                                <img src="<?= BASE_URL ?>public/assets/img/icon/support.svg" alt="">
                            </div>
                            <div class="feature-content">
                                <h4>Hỗ trợ 24/7</h4>
                                <p>Liên hệ với chúng tôi bất cứ lúc nào</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feature area end -->


    <!-- popular item -->
    <div class="product-area">
        <div class="container">
            <!-- Banner gần box sản phẩm -->
            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="product-banner wow fadeInLeft" data-wow-delay=".25s">
                        <?php if (!empty($secondSmall)): ?>
                            <a href="<?= !empty($secondSmall['link']) ? BASE_URL . $secondSmall['link'] : BASE_URL ?>">
                                <img src="<?= BASE_URL ?>public/assets/img/banner/<?= $secondSmall['image'] ?>"
                                    alt="<?= htmlspecialchars($secondSmall['title'] ?? 'Product Banner') ?>">
                            </a>
                        <?php else: ?>
                            <a href="<?= BASE_URL ?>">
                                <img src="<?= BASE_URL ?>public/assets/img/banner/product-banner.jpg" alt="Default Banner">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-12 wow fadeInDown" data-wow-delay=".25s">

                            <div class="site-heading-inline">
                                <h2 class="site-title">Sản phẩm phổ biến</h2>
                                <a href="<?= BASE_URL ?>cua-hang">Tất cả sản phẩm <i class="fas fa-angle-double-right"></i></a>
                            </div>

                            <div class="item-tab">
                                <ul class="nav nav-pills mt-40 mb-50" id="item-tab" role="tablist">
                                    <?php if (!empty($categories)): ?>
                                        <?php foreach ($categories as $index => $cat): ?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link <?= $index === 0 ? 'active' : '' ?>"
                                                    id="tab-cat-<?= $cat['id'] ?>"
                                                    data-bs-toggle="pill"
                                                    data-bs-target="#content-cat-<?= $cat['id'] ?>"
                                                    type="button" role="tab"
                                                    aria-controls="content-cat-<?= $cat['id'] ?>"
                                                    aria-selected="<?= $index === 0 ? 'true' : 'false' ?>">
                                                    <?= htmlspecialchars($cat['name']) ?>
                                                </button>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content wow fadeInUp" data-wow-delay=".25s" id="item-tabContent">
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $index => $cat): ?>

                                <div class="tab-pane fade <?= $index === 0 ? 'show active' : '' ?>"
                                    id="content-cat-<?= $cat['id'] ?>"
                                    role="tabpanel"
                                    aria-labelledby="tab-cat-<?= $cat['id'] ?>" tabindex="0">

                                    <div class="row g-3">
                                        <?php $catProducts = $productsByCategory[$cat['id']] ?? []; ?>

                                        <?php if (!empty($catProducts)): ?>
                                            <?php foreach ($catProducts as $product): ?>
                                                <div class="col-md-6 col-lg-4 col-xl-3">
                                                    <div class="product-item">
                                                        <div class="product-img">
                                                            <?php
                                                            $price = $product['price'] ?? 0;
                                                            $sale = $product['sale_price'] ?? null;
                                                            ?>
                                                            <?php if ($sale && $sale < $price): ?>
                                                                <span class="type discount">Sale</span>
                                                            <?php else: ?>
                                                                <span class="type new">Mới</span>
                                                            <?php endif; ?>

                                                            <a href="<?= BASE_URL ?>chi-tiet/<?= $product['slug'] ?>" data-action="view-detail" data-id="<?= $product['id'] ?>" data-slug="<?= $product['slug'] ?>">
                                                                <img src="<?= BASE_URL ?>public/assets/img/product/<?= $product['thumbnail'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                                            </a>

                                                            <div class="product-action-wrap">
                                                                <div class="product-action">
                                                                    <a href="<?= BASE_URL ?>chi-tiet/<?= $product['slug'] ?>" data-action="view-detail" data-id="<?= $product['id'] ?>" data-slug="<?= $product['slug'] ?>" data-tooltip="tooltip" title="Xem nhanh">
                                                                        <i class="far fa-eye"></i>
                                                                    </a>
                                                                    <a href="javascript:void(0)" data-action="add-to-wishlist" data-id="<?= $product['id'] ?>" data-tooltip="tooltip" title="Yêu thích">
                                                                        <i class="far fa-heart"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="product-content">
                                                            <h3 class="product-title">
                                                                <a href="<?= BASE_URL ?>chi-tiet/<?= $product['slug'] ?>" data-action="view-detail" data-id="<?= $product['id'] ?>" data-slug="<?= $product['slug'] ?>">
                                                                    <?= htmlspecialchars($product['name']) ?>
                                                                </a>
                                                            </h3>
                                                            <div class="product-rate">
                                                                <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                                            </div>
                                                            <div class="product-bottom">
                                                                <div class="product-price">
                                                                    <?php if ($sale && $sale < $price): ?>
                                                                        <del>$<?= number_format($price, 2) ?></del>
                                                                        <span>$<?= number_format($sale, 2) ?></span>
                                                                    <?php else: ?>
                                                                        <span>$<?= number_format($price, 2) ?></span>
                                                                    <?php endif; ?>
                                                                </div>
                                                                <button type="button" class="product-cart-btn" data-action="add-to-cart" data-id="<?= $product['id'] ?>" title="Thêm vào giỏ hàng">
                                                                    <i class="far fa-shopping-bag"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <div class="col-12">
                                                <p>Chưa có sản phẩm nào trong danh mục này.</p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- popular item end -->


    <!-- big banner -->
    <div class="big-banner pt-100">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="banner-wrap" style="background-image: url(<?= BASE_URL ?>public/assets/img/banner/big-banner.jpg);">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="banner-content">
                            <div class="banner-info">
                                <h6>Bộ sưu tập khổng lồ</h6>
                                <h2>Đại tiệc giảm giá đến <span>40%</span></h2>
                                <p>tại các cửa hàng của chúng tôi</p>
                            </div>
                            <a href="<?= BASE_URL ?>cua-hang" class="theme-btn">Mua ngay<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- big banner end -->


    <!-- brand area -->
    <div class="brand-area py-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-heading-inline">
                        <h2 class="site-title">Thương hiệu phổ biến</h2>
                        <a href="brand.html">Tất cả thương hiệu <i class="fas fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="brand-slider owl-carousel owl-theme">
                <?php if (!empty($brands)): ?>
                    <?php foreach ($brands as $brand): ?>
                        <div class="brand-item">
                            <a href="<?= BASE_URL ?>thuong-hieu/<?= $brand['slug'] ?>">
                                <img src="<?= BASE_URL ?>public/assets/img/brand/<?= $brand['image'] ?>"
                                    alt="<?= htmlspecialchars($brand['name']) ?>">
                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- brand area end -->


    <!-- video area -->
    <div class="video-area">
        <div class="container-fluid px-0">
            <div class="video-content" style="background-image: url(<?= BASE_URL ?>public/assets/img/video/01.jpg);">
                <div class="video-wrapper">
                    <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                        <i class="fas fa-play"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- video area end -->


    <!-- product list -->
    <div class="product-list pl-negative">
        <div class="container wow fadeInUp" data-wow-delay=".25s">
            <div class="row g-4">

                <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="product-list-box">
                        <h2 class="product-list-title">Đang giảm giá</h2>
                        <div id="home-onsale-list">
                            <p class="text-muted small py-3">Đang tải dữ liệu...</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="product-list-box">
                        <h2 class="product-list-title">Bán chạy nhất</h2>
                        <div id="home-bestseller-list">
                            <p class="text-muted small py-3">Đang tải dữ liệu...</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-6 col-xl-4">
                    <div class="product-list-box">
                        <h2 class="product-list-title">Đánh giá cao</h2>
                        <div id="home-toprated-list">
                            <p class="text-muted small py-3">Đang tải dữ liệu...
                        </div>
                    </div>
                </div>

                <!-- product list end -->


                <!-- best seller -->
                <div class="seller-area py-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 wow fadeInDown" data-wow-delay=".25s">
                                <div class="site-heading-inline">
                                    <h2 class="site-title">Cửa hàng hàng đầu</h2>
                                    <a href="vendors.html">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row wow fadeInUp" data-wow-delay=".25s">
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="vendor-store.html"><img src="<?= BASE_URL ?>public/assets/img/seller/01.png" alt=""></a>
                                    </div>
                                    <a href="vendor-store.html" class="seller-title">Fast Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="vendor-store.html"><img src="<?= BASE_URL ?>public/assets/img/seller/02.png" alt=""></a>
                                    </div>
                                    <a href="vendor-store.html" class="seller-title">Borcelle Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="vendor-store.html"><img src="<?= BASE_URL ?>public/assets/img/seller/03.png" alt=""></a>
                                    </div>
                                    <a href="vendor-store.html" class="seller-title">Fradel Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="vendor-store.html"><img src="<?= BASE_URL ?>public/assets/img/seller/04.png" alt=""></a>
                                    </div>
                                    <a href="vendor-store.html" class="seller-title">Liceria Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="vendor-store.html"><img src="<?= BASE_URL ?>public/assets/img/seller/05.png" alt=""></a>
                                    </div>
                                    <a href="vendor-store.html" class="seller-title">Fashion Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="vendor-store.html"><img src="<?= BASE_URL ?>public/assets/img/seller/06.png" alt=""></a>
                                    </div>
                                    <a href="vendor-store.html" class="seller-title">Quick Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="vendor-store.html"><img src="<?= BASE_URL ?>public/assets/img/seller/07.png" alt=""></a>
                                    </div>
                                    <a href="vendor-store.html" class="seller-title">Sebastin Shop</a>
                                </div>
                            </div>
                            <div class="col">
                                <div class="seller-item">
                                    <div class="seller-img">
                                        <a href="vendor-store.html"><img src="<?= BASE_URL ?>public/assets/img/seller/08.png" alt=""></a>
                                    </div>
                                    <a href="vendor-store.html" class="seller-title">Jiorox Shop</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- best seller end -->


                <!-- deal area -->
                <div class="deal-area pt-50 pb-50">
                    <div class="deal-text-shape">Ưu đãi</div>
                    <div class="container">
                        <div class="deal-wrap wow fadeInUp" data-wow-delay=".25s">
                            <div class="deal-slider owl-carousel owl-theme">

                                <div class="deal-item">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="deal-content">
                                                <div class="deal-info">
                                                    <span>Khuyến mãi hàng tuần</span>
                                                    <h1>Ưu đãi tốt nhất tuần này</h1>
                                                    <p>Có rất nhiều biến thể của các đoạn văn bản sẵn có, nhưng phần lớn đã được thay đổi dưới một hình thức nào đó bằng cách thêm vào những yếu tố hài hước hoặc những từ ngữ ngẫu nhiên.</p>
                                                </div>
                                                <div class="deal-countdown">
                                                    <div class="countdown" data-countdown="2027/12/30"></div>
                                                </div>
                                                <a href="<?= BASE_URL ?>cua-hang" class="theme-btn theme-btn2">Mua ngay <i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="deal-img">
                                                <img src="<?= BASE_URL ?>public/assets/img/deal/01.png" alt="">
                                                <div class="deal-discount">
                                                    <span>35%</span>
                                                    <span>Giảm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="deal-item">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="deal-content">
                                                <div class="deal-info">
                                                    <span>Khuyến mãi hàng tuần</span>
                                                    <h1>Ưu đãi tốt nhất tuần này</h1>
                                                    <p>Có rất nhiều biến thể của các đoạn văn bản sẵn có, nhưng phần lớn đã được thay đổi dưới một hình thức nào đó bằng cách thêm vào những yếu tố hài hước hoặc những từ ngữ ngẫu nhiên.</p>
                                                </div>
                                                <div class="deal-countdown">
                                                    <div class="countdown" data-countdown="2027/12/30"></div>
                                                </div>
                                                <a href="<?= BASE_URL ?>cua-hang" class="theme-btn theme-btn2">Mua ngay <i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="deal-img">
                                                <img src="<?= BASE_URL ?>public/assets/img/deal/02.png" alt="">
                                                <div class="deal-discount">
                                                    <span>35%</span>
                                                    <span>Giảm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="deal-item">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <div class="deal-content">
                                                <div class="deal-info">
                                                    <span>Khuyến mãi hàng tuần</span>
                                                    <h1>Ưu đãi tốt nhất tuần này</h1>
                                                    <p>Có rất nhiều biến thể của các đoạn văn bản sẵn có, nhưng phần lớn đã được thay đổi dưới một hình thức nào đó bằng cách thêm vào những yếu tố hài hước hoặc những từ ngữ ngẫu nhiên.</p>
                                                </div>
                                                <div class="deal-countdown">
                                                    <div class="countdown" data-countdown="2027/12/30"></div>
                                                </div>
                                                <a href="<?= BASE_URL ?>cua-hang" class="theme-btn theme-btn2">Mua ngay <i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="deal-img">
                                                <img src="<?= BASE_URL ?>public/assets/img/deal/03.png" alt="">
                                                <div class="deal-discount">
                                                    <span>35%</span>
                                                    <span>Giảm</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- deal area end -->


                <!-- about area -->
                <div class="about-area py-100">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                                    <div class="about-img">
                                        <div class="row">
                                            <div class="col-7">
                                                <img class="img-1" src="<?= BASE_URL ?>public/assets/img/about/01.jpg" alt="">
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img class="img-2" src="<?= BASE_URL ?>public/assets/img/about/02.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="about-experience">
                                        <div class="about-experience-icon">
                                            <img src="<?= BASE_URL ?>public/assets/img/icon/experience.svg" alt="">
                                        </div>
                                        <b>30 Năm <br> Kinh Nghiệm</b>
                                    </div>
                                    <div class="about-shape">
                                        <img src="<?= BASE_URL ?>public/assets/img/shape/05.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                                    <div class="site-heading mb-3">
                                        <span class="site-title-tagline justify-content-start">
                                            <i class="flaticon-drive"></i> Về Chúng Tôi
                                        </span>
                                        <h2 class="site-title">
                                            Thị Trường <span>Mua Sắm Trực Tuyến</span> Lớn Nhất Thế Giới Dành Cho Bạn.
                                        </h2>
                                    </div>
                                    <p>
                                        Chúng tôi đã đồng hành cùng khách hàng trong suốt thời gian qua, mang lại những giá trị cốt lõi và trải nghiệm mua sắm tốt nhất. Với sự phát triển không ngừng của công nghệ, chúng tôi cam kết mang đến sự tiện lợi, tin cậy và chất lượng vượt trội trong từng sản phẩm.
                                    </p>
                                    <div class="about-list">
                                        <ul>
                                            <li><i class="fas fa-check-double"></i> Trải nghiệm vận chuyển nhanh chóng</li>
                                            <li><i class="fas fa-check-double"></i> Thiết kế hiện đại với mức giá hợp lý</li>
                                            <li><i class="fas fa-check-double"></i> Giá cả cạnh tranh & Dễ dàng mua sắm</li>
                                            <li><i class="fas fa-check-double"></i> Chúng tôi tạo ra các sản phẩm tuyệt vời</li>
                                        </ul>
                                    </div>
                                    <a href="<?= BASE_URL ?>lien-he" class="theme-btn mt-4">Khám Phá Thêm<i
                                            class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- about area end -->


                <!-- gallery-area -->
                <div class="gallery-area pb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                                <div class="site-heading text-center">
                                    <span class="site-title-tagline">Thư viện ảnh</span>
                                    <h2 class="site-title">Hãy cùng khám phá <span>Bộ sưu tập ảnh</span> của chúng tôi</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4 popup-gallery">
                            <div class="col-md-4 col-lg-3">
                                <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/gallery/02.jpg" alt="">
                                        <a class="popup-img gallery-link" href="<?= BASE_URL ?>public/assets/img/gallery/02.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="gallery-item wow fadeInDown" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/gallery/03.jpg" alt="">
                                        <a class="popup-img gallery-link" href="<?= BASE_URL ?>public/assets/img/gallery/03.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="gallery-item gallery-btn-active wow fadeInDown" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/gallery/01.jpg" alt="">
                                        <a class="popup-img gallery-link" href="<?= BASE_URL ?>public/assets/img/gallery/01.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-6">
                                <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/gallery/06.jpg" alt="">
                                        <a class="popup-img gallery-link" href="<?= BASE_URL ?>public/assets/img/gallery/06.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/gallery/04.jpg" alt="">
                                        <a class="popup-img gallery-link" href="<?= BASE_URL ?>public/assets/img/gallery/04.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-3">
                                <div class="gallery-item wow fadeInUp" data-wow-delay=".25s">
                                    <div class="gallery-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/gallery/05.jpg" alt="">
                                        <a class="popup-img gallery-link" href="<?= BASE_URL ?>public/assets/img/gallery/05.jpg"><i
                                                class="fal fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- gallery-area end -->


                <!-- choose-area -->
                <div class="choose-area bg py-100">
                    <div class="container">
                        <div class="row g-4 align-items-center wow fadeInDown" data-wow-delay=".25s">
                            <div class="col-lg-4">
                                <span class="site-title-tagline">Tại sao chọn chúng tôi</span>
                                <h2 class="site-title">Chúng tôi cung cấp sản phẩm chất lượng cao cho bạn</h2>
                            </div>
                            <div class="col-lg-4">
                                <p>Có rất nhiều biến thể của các đoạn văn bản sẵn có, nhưng phần lớn đã được thay đổi dưới một hình thức nào đó bằng cách thêm vào các yếu tố hài hước hoặc các từ ngữ ngẫu nhiên để tăng tính thuyết phục.</p>
                            </div>
                            <div class="col-lg-4">
                                <div class="choose-img">
                                    <img src="<?= BASE_URL ?>public/assets/img/choose/01.jpg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="choose-content wow fadeInUp" data-wow-delay=".25s">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="choose-item">
                                        <div class="choose-icon">
                                            <img src="<?= BASE_URL ?>public/assets/img/icon/warranty.svg" alt="">
                                        </div>
                                        <div class="choose-info">
                                            <h4>Sản phẩm chính hãng</h4>
                                            <p>Một sự thật đã được khẳng định từ lâu là người đọc sẽ bị xao nhãng bởi nội dung của một trang khi nhìn vào bố cục trình bày của nó.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="choose-item">
                                        <div class="choose-icon">
                                            <img src="<?= BASE_URL ?>public/assets/img/icon/price.svg" alt="">
                                        </div>
                                        <div class="choose-info">
                                            <h4>Giá cả phải chăng</h4>
                                            <p>Một sự thật đã được khẳng định từ lâu là người đọc sẽ bị xao nhãng bởi nội dung của một trang khi nhìn vào bố cục trình bày của nó.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="choose-item">
                                        <div class="choose-icon">
                                            <img src="<?= BASE_URL ?>public/assets/img/icon/delivery.svg" alt="">
                                        </div>
                                        <div class="choose-info">
                                            <h4>Miễn phí vận chuyển</h4>
                                            <p>Một sự thật đã được khẳng định từ lâu là người đọc sẽ bị xao nhãng bởi nội dung của một trang khi nhìn vào bố cục trình bày của nó.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- choose-area end-->


                <!-- testimonial area -->
                <div class="testimonial-area ts-bg py-80">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                                <div class="site-heading text-center">
                                    <span class="site-title-tagline">Đánh giá từ khách hàng</span>
                                    <h2 class="site-title text-white">Khách hàng nói gì <span>về chúng tôi</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-slider owl-carousel owl-theme wow fadeInUp" data-wow-delay=".25s">

                            <div class="testimonial-item">
                                <div class="testimonial-author">
                                    <div class="testimonial-author-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/testimonial/01.jpg" alt="">
                                    </div>
                                    <div class="testimonial-author-info">
                                        <h4>Sylvia H Green</h4>
                                        <p>Khách hàng</p>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <p>
                                        Tôi rất ấn tượng với chất lượng sản phẩm và dịch vụ chăm sóc khách hàng tại đây. Mọi thứ đều được chuẩn bị rất chỉn chu, giao hàng nhanh chóng và sản phẩm đúng như mong đợi.
                                    </p>
                                </div>
                                <div class="testimonial-rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-quote-icon"><img src="<?= BASE_URL ?>public/assets/img/icon/quote.svg" alt=""></div>
                            </div>

                            <div class="testimonial-item">
                                <div class="testimonial-author">
                                    <div class="testimonial-author-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/testimonial/02.jpg" alt="">
                                    </div>
                                    <div class="testimonial-author-info">
                                        <h4>Gordo Novak</h4>
                                        <p>Khách hàng</p>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <p>
                                        Trải nghiệm mua sắm tuyệt vời! Giao diện web dễ sử dụng, thanh toán an toàn và nhân viên hỗ trợ rất nhiệt tình khi tôi có thắc mắc về đơn hàng. Sẽ còn quay lại ủng hộ dài lâu.
                                    </p>
                                </div>
                                <div class="testimonial-rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-quote-icon"><img src="<?= BASE_URL ?>public/assets/img/icon/quote.svg" alt=""></div>
                            </div>

                            <div class="testimonial-item">
                                <div class="testimonial-author">
                                    <div class="testimonial-author-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/testimonial/03.jpg" alt="">
                                    </div>
                                    <div class="testimonial-author-info">
                                        <h4>Reid E Butt</h4>
                                        <p>Khách hàng</p>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <p>
                                        Sản phẩm có thiết kế hiện đại và mức giá rất phải chăng so với thị trường. Tôi đã giới thiệu cho bạn bè và người thân cùng sử dụng dịch vụ của cửa hàng.
                                    </p>
                                </div>
                                <div class="testimonial-rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-quote-icon"><img src="<?= BASE_URL ?>public/assets/img/icon/quote.svg" alt=""></div>
                            </div>

                            <div class="testimonial-item">
                                <div class="testimonial-author">
                                    <div class="testimonial-author-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/testimonial/04.jpg" alt="">
                                    </div>
                                    <div class="testimonial-author-info">
                                        <h4>Parker Jimenez</h4>
                                        <p>Khách hàng</p>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <p>
                                        Dịch vụ vận chuyển thực sự nhanh chóng, tôi nhận được hàng chỉ sau một thời gian ngắn đặt hàng. Chất lượng đóng gói rất cẩn thận, đảm bảo sản phẩm còn nguyên vẹn khi đến tay.
                                    </p>
                                </div>
                                <div class="testimonial-rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-quote-icon"><img src="<?= BASE_URL ?>public/assets/img/icon/quote.svg" alt=""></div>
                            </div>

                            <div class="testimonial-item">
                                <div class="testimonial-author">
                                    <div class="testimonial-author-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/testimonial/05.jpg" alt="">
                                    </div>
                                    <div class="testimonial-author-info">
                                        <h4>Heruli Nez</h4>
                                        <p>Khách hàng</p>
                                    </div>
                                </div>
                                <div class="testimonial-quote">
                                    <p>
                                        Đây là địa chỉ mua sắm tin cậy của tôi mỗi khi cần tìm kiếm các sản phẩm điện tử mới nhất. Chính sách bảo hành và đổi trả rõ ràng khiến tôi hoàn toàn yên tâm khi mua hàng.
                                    </p>
                                </div>
                                <div class="testimonial-rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                </div>
                                <div class="testimonial-quote-icon"><img src="<?= BASE_URL ?>public/assets/img/icon/quote.svg" alt=""></div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- testimonial area end -->


                <!-- blog area -->
                <div class="blog-area2 py-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 mx-auto wow fadeInDown" data-wow-delay=".25s">
                                <div class="site-heading text-center">
                                    <span class="site-title-tagline">Tin tức & Blog</span>
                                    <h2 class="site-title">Tin tức & <span>Blog</span> mới nhất của chúng tôi</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                    <span class="blog-date"><i class="far fa-calendar-alt"></i> 12 Tháng 8, 2025</span>
                                    <div class="blog-item-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/blog/01.jpg" alt="Thumb">
                                    </div>
                                    <div class="blog-item-info">
                                        <h4 class="blog-title">
                                            <a href="blog-single-sidebar.html">Có rất nhiều biến thể của các đoạn văn bản sẵn có mà đa số đã thay đổi.</a>
                                        </h4>
                                        <p>Hiện nay có rất nhiều biến thể sẵn có, nhưng phần lớn đã chịu sự thay đổi bằng cách thêm vào các từ ngữ ngẫu nhiên.</p>
                                        <div class="blog-item-meta">
                                            <ul>
                                                <li><a href="<?= BASE_URL ?>"><i class="far fa-user-circle"></i> Bởi Alicia Davis</a></li>
                                                <li><a href="<?= BASE_URL ?>"><i class="far fa-comments"></i> 2.5k Bình luận</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="blog-item wow fadeInDown" data-wow-delay=".25s">
                                    <span class="blog-date"><i class="far fa-calendar-alt"></i> 15 Tháng 8, 2025</span>
                                    <div class="blog-item-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/blog/02.jpg" alt="Thumb">
                                    </div>
                                    <div class="blog-item-info">
                                        <h4 class="blog-title">
                                            <a href="blog-single-sidebar.html">Trái với quan niệm thông thường, văn bản không chỉ đơn thuần là ngẫu nhiên.</a>
                                        </h4>
                                        <p>Hiện nay có rất nhiều biến thể sẵn có, nhưng phần lớn đã chịu sự thay đổi bằng cách thêm vào các từ ngữ ngẫu nhiên.</p>
                                        <div class="blog-item-meta">
                                            <ul>
                                                <li><a href="<?= BASE_URL ?>"><i class="far fa-user-circle"></i> Bởi Alicia Davis</a></li>
                                                <li><a href="<?= BASE_URL ?>"><i class="far fa-comments"></i> 3.1k Bình luận</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-4">
                                <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                                    <span class="blog-date"><i class="far fa-calendar-alt"></i> 18 Tháng 8, 2025</span>
                                    <div class="blog-item-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/blog/03.jpg" alt="Thumb">
                                    </div>
                                    <div class="blog-item-info">
                                        <h4 class="blog-title">
                                            <a href="blog-single-sidebar.html">Nếu bạn định sử dụng một đoạn văn bản, hãy chắc chắn không có gì ở giữa.</a>
                                        </h4>
                                        <p>Hiện nay có rất nhiều biến thể sẵn có, nhưng phần lớn đã chịu sự thay đổi bằng cách thêm vào các từ ngữ ngẫu nhiên.</p>
                                        <div class="blog-item-meta">
                                            <ul>
                                                <li><a href="<?= BASE_URL ?>"><i class="far fa-user-circle"></i> Bởi Alicia Davis</a></li>
                                                <li><a href="<?= BASE_URL ?>"><i class="far fa-comments"></i> 1.6k Bình luận</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- blog area end -->


                <!-- newsletter area -->
                <div class="newsletter-area pb-100">
                    <div class="container wow fadeInUp" data-wow-delay=".25s">
                        <div class="newsletter-wrap">
                            <div class="row">
                                <div class="col-lg-6 mx-auto">
                                    <div class="newsletter-content">
                                        <h3>Nhận ngay mã giảm giá <span>20%</span></h3>
                                        <p>Bằng cách đăng ký nhận bản tin của chúng tôi</p>
                                        <div class="subscribe-form">
                                            <form action="<?= BASE_URL ?>">
                                                <input type="email" class="form-control" placeholder="Địa chỉ Email của bạn">
                                                <button class="theme-btn" type="submit">
                                                    Đăng ký <i class="far fa-paper-plane"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- newsletter area end -->


                <!-- instagram-area -->
                <div class="instagram-area pb-100">
                    <div class="container wow fadeInUp" data-wow-delay=".25s">
                        <div class="row">
                            <div class="col-lg-6 mx-auto">
                                <div class="site-heading text-center">
                                    <h2 class="site-title">Instagram <span>@mocart</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="instagram-slider owl-carousel owl-theme">
                            <div class="instagram-item">
                                <div class="instagram-img">
                                    <img src="<?= BASE_URL ?>public/assets/img/instagram/01.jpg" alt="Thumb">
                                    <a href="<?= BASE_URL ?>"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <div class="instagram-img">
                                    <img src="<?= BASE_URL ?>public/assets/img/instagram/02.jpg" alt="Thumb">
                                    <a href="<?= BASE_URL ?>"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <div class="instagram-img">
                                    <img src="<?= BASE_URL ?>public/assets/img/instagram/03.jpg" alt="Thumb">
                                    <a href="<?= BASE_URL ?>"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <div class="instagram-img">
                                    <img src="<?= BASE_URL ?>public/assets/img/instagram/04.jpg" alt="Thumb">
                                    <a href="<?= BASE_URL ?>"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <div class="instagram-img">
                                    <img src="<?= BASE_URL ?>public/assets/img/instagram/05.jpg" alt="Thumb">
                                    <a href="<?= BASE_URL ?>"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <div class="instagram-img">
                                    <img src="<?= BASE_URL ?>public/assets/img/instagram/06.jpg" alt="Thumb">
                                    <a href="<?= BASE_URL ?>"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="instagram-item">
                                <div class="instagram-img">
                                    <img src="<?= BASE_URL ?>public/assets/img/instagram/07.jpg" alt="Thumb">
                                    <a href="<?= BASE_URL ?>"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- instagram-area end -->

</main>
<?php require_once "../app/Views/layout/footer.php"; ?>