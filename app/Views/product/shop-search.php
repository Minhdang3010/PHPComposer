<?php require_once "../app/Views/layout/header.php"; ?>
<main class="main">

    <div class="site-breadcrumb">
        <div class="site-breadcrumb-bg" style="background: url(<?= BASE_URL ?>public/assets/img/breadcrumb/01.jpg)"></div>
        <div class="container">
            <div class="site-breadcrumb-wrap">
                <h4 class="breadcrumb-title">Tìm kiếm sản phẩm</h4>
                <ul class="breadcrumb-menu">
                    <li><a href="<?= BASE_URL ?>"><i class="far fa-home"></i> Trang chủ</a></li>
                    <li class="active">Kết quả tìm kiếm</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="shop-area bg-2 py-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop-sidebar">
                        <div class="shop-widget">
                            <div class="shop-search-form">
                                <h4 class="shop-widget-title">Tìm kiếm mới</h4>
                                <form action="<?= BASE_URL ?>product/search" method="GET">
                                    <div class="form-group">
                                        <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa cần tìm...">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="shop-widget">
                            <h4 class="shop-widget-title">Danh mục</h4>
                            <ul class="shop-category-list">
                                <li><a href="<?= BASE_URL ?>product/category">Điện tử <span>(12)</span></a></li>
                                <li><a href="<?= BASE_URL ?>product/category">Thời trang <span>(25)</span></a></li>
                                <li><a href="<?= BASE_URL ?>product/category">Phụ kiện <span>(18)</span></a></li>
                            </ul>
                        </div>

                        <div class="shop-widget">
                            <h4 class="shop-widget-title">Khoảng giá</h4>
                            <div class="price-range-box">
                                <div class="price-range-input">
                                    <input type="text" id="price-amount" readonly>
                                </div>
                                <div class="price-range"></div>
                            </div>
                        </div>

                        <div class="shop-widget">
                            <h4 class="shop-widget-title">Thương hiệu</h4>
                            <ul class="shop-checkbox-list">
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="brand1">
                                        <label class="form-check-label" for="brand1">Apple<span>(12)</span></label>
                                    </div>
                                </li>
                                <li>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="brand2">
                                        <label class="form-check-label" for="brand2">Samsung<span>(15)</span></label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="col-md-12">
                        <div class="shop-sort">
                            <div class="shop-sort-box">
                                <div class="shop-sorty-label">Sắp xếp:</div>
                                <select class="select">
                                    <option value="1">Mặc định</option>
                                    <option value="2">Giá thấp đến cao</option>
                                    <option value="3">Giá cao đến thấp</option>
                                    <option value="4">Mới nhất</option>
                                </select>
                                <div class="shop-sort-show">Kết quả tìm kiếm cho: <strong>"Airpod"</strong></div>
                            </div>
                        </div>
                    </div>

                    <div class="shop-item-wrap">
                        <div class="row g-4">
                            <div class="col-md-6 col-lg-4">
                                <div class="product-item">
                                    <div class="product-img">
                                        <span class="type">Xu hướng</span>
                                        <a href="<?= BASE_URL ?>product/show/1"><img src="<?= BASE_URL ?>public/assets/img/product/e1.png" alt=""></a>
                                        <div class="product-action-wrap">
                                            <div class="product-action">
                                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#quickview" title="Xem nhanh"><i class="far fa-eye"></i></a>
                                                <a href="<?= BASE_URL ?>cart/wishlist" title="Yêu thích"><i class="far fa-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3 class="product-title"><a href="<?= BASE_URL ?>product/show/1">Apple Blue Airpod</a></h3>
                                        <div class="product-rate">
                                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>
                                        </div>
                                        <div class="product-bottom">
                                            <div class="product-price">
                                                <span>$740.00</span>
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
                        </div>
                    </div>

                    <div class="pagination-area mt-50">
                        <ul class="pagination">
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                            <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                            <li class="page-item">
                                <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                    <span aria-hidden="true"><i class="far fa-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once "../app/Views/layout/footer.php"; ?>