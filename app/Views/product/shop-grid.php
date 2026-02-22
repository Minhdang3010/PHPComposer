<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">
    <div class="site-breadcrumb">
        </div>

    <div class="shop-area bg-2 py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        
                        <div class="shop-widget">
                            <div class="shop-search-form">
                                <h4 class="shop-widget-title">Tìm kiếm</h4>
                                <form id="form-search"> 
                                    <div class="form-group">
                                        <input type="text" id="keyword-input" class="form-control" placeholder="Nhập từ khóa...">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="shop-widget">
                            <h4 class="shop-widget-title">Danh mục</h4>
                            <ul class="shop-category-list">
                                <li>
                                    <a href="#" class="js-category-link" data-id="">
                                        Tất cả danh mục
                                    </a>
                                </li>
                                <?php if (!empty($categories)): ?>
                                    <?php foreach ($categories as $cat): ?>
                                        <li>
                                            <a href="#" class="js-category-link" data-id="<?= $cat['id'] ?>">
                                                <?= htmlspecialchars($cat['name']) ?>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="shop-widget">
                            <h4 class="shop-widget-title">Thương hiệu</h4>
                            <ul class="shop-checkbox-list">
                                <?php if (!empty($brands)): ?>
                                    <?php foreach ($brands as $brand): ?>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input js-brand-checkbox" 
                                                       type="checkbox" 
                                                       value="<?= $brand['id'] ?>" 
                                                       id="brand<?= $brand['id'] ?>">
                                                
                                                <label class="form-check-label" for="brand<?= $brand['id'] ?>">
                                                    <?= htmlspecialchars($brand['name']) ?>
                                                </label>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                     <div class="col-md-12">
                        <div class="shop-sort">
                            <div class="shop-sort-box">
                                <div class="shop-sorty-label">Sắp xếp:</div>
                                <select class="select" id="sort-select">
                                    <option value="newest">Mới nhất</option>
                                    <option value="price_asc">Giá thấp đến cao</option>
                                    <option value="price_desc">Giá cao đến thấp</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="shop-item-wrap item-4">
                        <div class="row g-4" id="shop-product-list">
                            <p class="text-center mt-5">Đang tải sản phẩm...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>