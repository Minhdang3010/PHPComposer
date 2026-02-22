<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Chi tiết sản phẩm</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li><a href="<?= BASE_URL ?>cua-hang">Cửa hàng</a></li>
                    <li class="active"><?= htmlspecialchars($product['name']) ?></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-single py-90">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-6 col-xxl-5">
                    <div class="shop-single-gallery">
                        <div class="flexslider-thumbnails">
                            <ul class="slides">
                                <li data-thumb="<?= BASE_URL ?>public/assets/img/product/<?= $product['thumbnail'] ?>">
                                    <div class="thumb-img">
                                        <img src="<?= BASE_URL ?>public/assets/img/product/<?= $product['thumbnail'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                                        <a href="<?= BASE_URL ?>public/assets/img/product/<?= $product['thumbnail'] ?>" class="popup-img"><i class="far fa-search-plus"></i></a>
                                    </div>
                                </li>

                                <?php if (!empty($gallery)): ?>
                                    <?php foreach ($gallery as $img): ?>
                                        <li data-thumb="<?= BASE_URL ?>public/assets/img/product/<?= $img['image_url'] ?>">
                                            <div class="thumb-img">
                                                <img src="<?= BASE_URL ?>public/assets/img/product/<?= $img['image_url'] ?>" alt="Gallery Image">
                                                <a href="<?= BASE_URL ?>public/assets/img/product/<?= $img['image_url'] ?>" class="popup-img"><i class="far fa-search-plus"></i></a>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-6 col-xxl-6">
                    <div class="shop-single-info">
                        <h4 class="shop-single-title"><?= htmlspecialchars($product['name']) ?></h4>

                        <div class="shop-single-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <span class="rating-count"> (<?= $product['view_count'] ?> lượt xem)</span>
                        </div>

                        <div class="shop-single-price">
                            <?php if ($product['sale_price'] && $product['sale_price'] < $product['price']): ?>
                                <del>$<?= number_format($product['price'], 2) ?></del>
                                <span class="amount">$<?= number_format($product['sale_price'], 2) ?></span>
                                <span class="discount-percentage">Giảm giá</span>
                            <?php else: ?>
                                <span class="amount">$<?= number_format($product['price'], 2) ?></span>
                            <?php endif; ?>
                        </div>

                        <p class="mb-3">
                            <?= !empty($product['description']) ? nl2br(htmlspecialchars(substr(strip_tags($product['description']), 0, 150))) . '...' : 'Đang cập nhật mô tả...' ?>
                        </p>

                        <form action="<?= BASE_URL ?>cart/add" method="POST">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">

                            <div class="shop-single-cs">
                                <div class="row">
                                    <div class="col-md-3 col-lg-4 col-xl-3">
                                        <div class="shop-single-size">
                                            <h6>Số lượng</h6>
                                            <div class="shop-cart-qty">
                                                <button type="button" class="minus-btn"><i class="fal fa-minus"></i></button>
                                                <input class="quantity" name="quantity" type="text" value="1" readonly>
                                                <button type="button" class="plus-btn"><i class="fal fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="shop-single-action">
                                <div class="row align-items-center">
                                    <div class="col-md-6 col-lg-12 col-xl-6">
                                        <div class="shop-single-btn">
                                            <button type="button"
                                                class="product-list-btn"
                                                onclick="addToCart(<?= $product['id'] ?>)"
                                                data-bs-placement="left"
                                                data-tooltip="tooltip"
                                                title="Thêm vào giỏ hàng">
                                                <i class="far fa-shopping-bag"></i>
                                            </button>
                                            <a href="#" class="theme-btn theme-btn2" title="Thêm vào yêu thích"><span class="far fa-heart"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="shop-single-sortinfo">
                            <ul>
                                <li>Thương hiệu: <span><?= $product['brand_name'] ?? 'Đang cập nhật' ?></span></li>
                                <li>Danh mục: <span><a href="<?= BASE_URL ?>danh-muc/<?= $product['category_id'] // Hoặc slug category nếu có 
                                                                                        ?>"><?= $product['category_name'] ?? 'Chung' ?></a></span></li>
                                <li>Tình trạng: <span class="stock">Còn hàng</span></li>
                                <li>SKU: <span>SKU-<?= $product['id'] ?></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="shop-single-details">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-tab1" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab">Mô tả sản phẩm</button>
                        <button class="nav-link" id="nav-tab2" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab">Thông số kỹ thuật</button>
                        <button class="nav-link" id="nav-tab3" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab">Đánh giá</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="tab1" role="tabpanel">
                        <div class="shop-single-desc">
                            <p><?= !empty($product['description']) ? $product['description'] : 'Chưa có mô tả chi tiết cho sản phẩm này.' ?></p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab2" role="tabpanel">
                        <div class="shop-single-additional">
                            <p>Thông số kỹ thuật đang được cập nhật...</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab3" role="tabpanel">
                        <div class="shop-single-review">
                            <p>Chưa có đánh giá nào.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-heading-inline">
                        <h2 class="site-title">Sản phẩm liên quan</h2>
                    </div>
                </div>
            </div>
            <div class="row g-4">
                <?php if (!empty($relatedProducts)): ?>
                    <?php foreach ($relatedProducts as $item): ?>
                        <?php if ($item['id'] == $product['id']) continue; ?>

                        <div class="col-md-6 col-lg-3">
                            <div class="product-item">
                                <div class="product-img">
                                    <a href="<?= BASE_URL ?>chi-tiet/<?= $item['slug'] ?>">
                                        <img src="<?= BASE_URL ?>public/assets/img/product/<?= $item['thumbnail'] ?>" alt="<?= htmlspecialchars($item['name']) ?>">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title">
                                        <a href="<?= BASE_URL ?>chi-tiet/<?= $item['slug'] ?>"><?= htmlspecialchars($item['name']) ?></a>
                                    </h3>
                                    <div class="product-bottom">
                                        <div class="product-price">
                                            <span>$<?= number_format($item['price'], 2) ?></span>
                                        </div>
                                        <button type="button"
                                            class="product-list-btn"
                                            onclick="addToCart(<?= $product['id'] ?>)"
                                            data-bs-placement="left"
                                            data-tooltip="tooltip"
                                            title="Thêm vào giỏ hàng">
                                            <i class="far fa-shopping-bag"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p>Không có sản phẩm liên quan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</main>
<?php require_once "../app/Views/layout/footer.php"; ?>