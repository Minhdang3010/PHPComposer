const ProductUI = {
    formatPrice(amount) {
        return new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(amount);
    },

    // 1. Render danh sách lưới (Grid) - Dùng cho trang Shop & Related Product
    renderList(products, containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;
        
        if (!products || products.length === 0) {
            container.innerHTML = '<p>Không có sản phẩm.</p>'; return;
        }

        container.innerHTML = products.map(item => `
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div class="product-item">
                    <div class="product-img">
                        <span class="type new">Mới</span>
                        <a href="javascript:void(0)" onclick="ProductController.loadDetailNoReload(${item.id}, '${item.slug}')">
                            <img src="${APP_URL}public/assets/img/product/${item.thumbnail}" alt="${item.name}">
                        </a>
                        <div class="product-action-wrap">
                            <div class="product-action">
                                <a href="javascript:void(0)" onclick="ProductController.openQuickView(${item.id})"><i class="far fa-eye"></i></a>
                                <a href="#"><i class="far fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title">
                            <a href="javascript:void(0)" onclick="ProductController.loadDetailNoReload(${item.id}, '${item.slug}')">${item.name}</a>
                        </h3>
                        <div class="product-bottom">
                            <div class="product-price"><span>${this.formatPrice(item.price)}</span></div>
                            <button class="product-cart-btn" onclick="CartController.add(${item.id})"><i class="far fa-shopping-bag"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        `).join('');
    },

    // 2. Render danh sách nhỏ (Widget) - Dùng cho 3 cột trang chủ
    renderMiniList(products, containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;

        if (!products || products.length === 0) {
            container.innerHTML = '<p class="py-2">Chưa có sản phẩm nào.</p>';
            return;
        }

        // Map đúng cấu trúc HTML mà ông vừa gửi
        container.innerHTML = products.map(item => {
            // Logic hiển thị giá (có sale hay không)
            let priceHtml = '';
            if (item.sale_price > 0 && item.sale_price < item.price) {
                priceHtml = `
                    <del>${this.formatPrice(item.price)}</del>
                    <span>${this.formatPrice(item.sale_price)}</span>
                `;
            } else {
                priceHtml = `<span>${this.formatPrice(item.price)}</span>`;
            }

            return `
            <div class="product-list-item">
                <div class="product-list-img">
                    <a href="javascript:void(0)" onclick="ProductController.loadDetailNoReload(${item.id}, '${item.slug}')">
                        <img src="${APP_URL}public/assets/img/product/${item.thumbnail}" alt="${item.name}">
                    </a>
                </div>
                <div class="product-list-content">
                    <h4>
                        <a href="javascript:void(0)" onclick="ProductController.loadDetailNoReload(${item.id}, '${item.slug}')">
                            ${item.name}
                        </a>
                    </h4>
                    <div class="product-list-rate">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <div class="product-list-price">
                        ${priceHtml}
                    </div>
                </div>
                <button type="button"
                    class="product-list-btn"
                    onclick="CartController.add(${item.id})"
                    title="Thêm vào giỏ hàng">
                    <i class="far fa-shopping-bag"></i>
                </button>
            </div>
            `;
        }).join('');
    },

    // 3. Render LẠI toàn bộ trang chi tiết (Khi click mà không reload)
    updateDetailPage(product) {
        // Cập nhật ảnh
        const mainImg = document.querySelector('.shop-single-gallery .thumb-img img');
        if (mainImg) mainImg.src = `${APP_URL}public/assets/img/product/${product.thumbnail}`;

        // Cập nhật thông tin text
        document.querySelectorAll('.shop-single-title').forEach(el => el.innerText = product.name);
        document.querySelectorAll('.shop-single-price .amount').forEach(el => el.innerText = this.formatPrice(product.price));
        
        // Cập nhật mô tả ngắn & dài
        const shortDesc = document.querySelector('.shop-single-desc');
        const longDesc = document.querySelector('#description .desc-content p'); // Tab mô tả
        if (shortDesc) shortDesc.innerText = product.description ? product.description.substring(0, 150) + '...' : '';
        if (longDesc) longDesc.innerText = product.description;

        // Cập nhật Breadcrumb (Thanh điều hướng)
        const breadcrumbActive = document.querySelector('.breadcrumb-menu li.active');
        if (breadcrumbActive) breadcrumbActive.innerText = product.name;

        // Scroll lên đầu trang cho người dùng thấy
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
};