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
                    <div class="custom-gallery">
                        <div class="main-image-wrap mb-3 text-center">
                            <img id="main-product-image" src="<?= BASE_URL ?>public/assets/img/product/<?= $product['thumbnail'] ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                        </div>

                        <div class="thumbnail-list d-flex justify-content-center gap-2 flex-wrap">
                            <div class="thumb-item active" data-image="<?= BASE_URL ?>public/assets/img/product/<?= $product['thumbnail'] ?>">
                                <img src="<?= BASE_URL ?>public/assets/img/product/<?= $product['thumbnail'] ?>" alt="">
                            </div>

                            <?php if (!empty($gallery)): ?>
                                <?php foreach ($gallery as $img): ?>
                                    <div class="thumb-item" data-image="<?= BASE_URL ?>public/assets/img/product/<?= $img['image_url'] ?>">
                                        <img src="<?= BASE_URL ?>public/assets/img/product/<?= $img['image_url'] ?>" alt="">
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <style>
                        .main-image-wrap {
                            border: 1px solid #e0e0e0;
                            border-radius: 12px;
                            padding: 20px;
                            background: #fff;
                        }

                        .main-image-wrap img {
                            width: 100%;
                            height: 400px;
                            object-fit: contain;
                            transition: opacity 0.2s ease;
                        }

                        .thumb-item {
                            width: 70px;
                            height: 70px;
                            border: 1px solid #e0e0e0;
                            border-radius: 8px;
                            padding: 5px;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            background: #fff;
                            transition: all 0.2s ease;
                        }

                        .thumb-item img {
                            max-width: 100%;
                            max-height: 100%;
                            object-fit: contain;
                        }

                        .thumb-item.active {
                            border: 2px solid #dc3545;
                        }

                        .thumb-item:hover {
                            border-color: #dc3545;
                        }
                    </style>
                </div>

                <div class="col-md-12 col-lg-6 col-xxl-6">
                    <div class="shop-single-info">
                        <h4 class="shop-single-title"><?= htmlspecialchars($product['name']) ?></h4>

                        <div class="shop-single-rating">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <span class="rating-count"> (<?= $product['view_count'] ?> lượt xem)</span>
                        </div>

                        <div class="shop-single-price" id="display-price">
                            <div class="spinner-border spinner-border-sm text-primary"></div> Đang tải giá...
                        </div>

                        <p class="mb-3">
                            <?= !empty($product['description']) ? nl2br(htmlspecialchars(substr(strip_tags($product['description']), 0, 150))) . '...' : 'Đang cập nhật mô tả...' ?>
                        </p>

                        <form id="form-add-to-cart">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <input type="hidden" name="variant_id" id="selected-variant-id" value="">

                            <?php if (!empty($variants)): ?>
                                <div class="shop-single-variants mb-4">
                                    <h6 class="mb-3">Chọn phiên bản:</h6>
                                    <div class="variant-list" id="variant-selector">
                                        <?php foreach ($variants as $index => $v): ?>
                                            <?php
                                            $name = trim(($v['color_name'] ?? '') . ' ' . ($v['size_name'] ?? ''));
                                            if (empty($name)) $name = "Mặc định";
                                            ?>
                                            <label class="variant-item">
                                                <input type="radio" name="choose_variant" value="<?= $v['id'] ?>" class="d-none" <?= $index === 0 ? 'checked' : '' ?>>
                                                <span class="variant-btn"><?= htmlspecialchars($name) ?></span>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>
                                </div>

                                <style>
                                    .variant-list {
                                        display: flex;
                                        flex-wrap: wrap;
                                        gap: 10px;
                                    }

                                    .variant-item {
                                        cursor: pointer;
                                        margin: 0;
                                    }

                                    .variant-btn {
                                        display: inline-block;
                                        padding: 8px 16px;
                                        border: 2px solid #e0e0e0;
                                        border-radius: 6px;
                                        background: #fff;
                                        transition: all 0.2s ease;
                                        font-size: 14px;
                                        font-weight: 500;
                                        color: #555;
                                        user-select: none;
                                    }

                                    .variant-item:hover .variant-btn {
                                        border-color: #0d6efd;
                                        color: #0d6efd;
                                    }

                                    .variant-item input:checked+.variant-btn {
                                        background: #0d6efd;
                                        color: #fff;
                                        border-color: #0d6efd;
                                        box-shadow: 0 4px 10px rgba(13, 110, 253, 0.25);
                                    }
                                </style>
                            <?php endif; ?>

                            <div class="shop-single-cs">
                                <div class="row">
                                    <div class="col-md-3 col-lg-4 col-xl-3">
                                        <div class="shop-single-size">
                                            <h6>Số lượng</h6>
                                            <div class="shop-cart-qty">
                                                <button type="button" class="minus-btn"><i class="fal fa-minus"></i></button>
                                                <input class="quantity" id="buy-quantity" name="quantity" type="text" value="1" readonly>
                                                <button type="button" class="plus-btn"><i class="fal fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="shop-single-action">
                                <div class="row align-items-center">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <div class="shop-single-btn d-flex gap-2">
                                            <button type="button" class="theme-btn" id="btn-add-cart">
                                                <i class="far fa-shopping-bag"></i> Thêm giỏ hàng
                                            </button>

                                            <button type="button" class="theme-btn theme-btn2" id="btn-buy-now">
                                                Mua ngay
                                            </button>

                                            <a href="javascript:void(0)" class="theme-btn theme-btn2" data-action="add-to-wishlist" data-id="<?= $product['id'] ?>" title="Thêm vào yêu thích">
                                                <span class="far fa-heart"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="shop-single-sortinfo">
                            <ul>
                                <li>Thương hiệu: <span><?= $product['brand_name'] ?? 'Đang cập nhật' ?></span></li>
                                <li>Danh mục: <span><a href="<?= BASE_URL ?>danh-muc/<?= $product['category_id'] ?>"><?= $product['category_name'] ?? 'Chung' ?></a></span></li>
                                <li>Tình trạng: <span class="stock" id="display-stock">Đang tải...</span></li>
                                <li>SKU: <span id="display-sku">Đang tải...</span></li>
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
                        <div class="shop-single-desc" id="description">
                            <div class="desc-content">
                                <p><?= !empty($product['description']) ? $product['description'] : 'Chưa có mô tả chi tiết cho sản phẩm này.' ?></p>
                            </div>
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
                                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
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
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p class="text-muted">Không có sản phẩm liên quan.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

</main>
<?php require_once "../app/Views/layout/footer.php"; ?>