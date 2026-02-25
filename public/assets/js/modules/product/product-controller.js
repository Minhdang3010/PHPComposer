const ProductController = {
    // =====================================================================
    // 1. STATE: Nơi lưu trữ trạng thái bộ lọc của trang Cửa Hàng
    // =====================================================================
    filterState: {
        keyword: "",
        category_id: "",
        brand_id: "",
        sort: "newest",
    },

    // =====================================================================
    // 2. KHỞI TẠO TRANG CỬA HÀNG (Lọc, Tìm kiếm, Phân loại)
    // =====================================================================
    initShopPage: async function () {
        console.log("Khởi tạo Trang Cửa Hàng...");

        // 2.1. Lắng nghe TÌM KIẾM (Submit Form)
        const searchForm = document.getElementById("form-search");
        if (searchForm) {
            searchForm.addEventListener("submit", (e) => {
                e.preventDefault();
                this.filterState.keyword = document.getElementById("keyword-input").value;
                this.loadProducts();
            });
        }

        // 2.2. Lắng nghe CLICK DANH MỤC
        const categoryLinks = document.querySelectorAll(".js-category-link");
        categoryLinks.forEach((link) => {
            link.addEventListener("click", (e) => {
                e.preventDefault();
                this.filterState.category_id = link.getAttribute("data-id");
                this.loadProducts();

                // Highlight danh mục đang chọn
                categoryLinks.forEach((l) => l.parentElement.classList.remove("active"));
                link.parentElement.classList.add("active");
            });
        });

        // 2.3. Lắng nghe CHECKBOX THƯƠNG HIỆU
        const brandCheckboxes = document.querySelectorAll(".js-brand-checkbox");
        brandCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener("change", (e) => {
                if (checkbox.checked) {
                    this.filterState.brand_id = checkbox.value;
                    // Bỏ chọn các brand khác (Chỉ chọn 1)
                    brandCheckboxes.forEach((box) => {
                        if (box !== checkbox) box.checked = false;
                    });
                } else {
                    this.filterState.brand_id = "";
                }
                this.loadProducts();
            });
        });

        // 2.4. Lắng nghe SẮP XẾP (Select change)
        const sortSelect = document.getElementById("sort-select");
        if (sortSelect) {
            sortSelect.addEventListener("change", (e) => {
                this.filterState.sort = e.target.value;
                this.loadProducts();
            });
        }

        // Load data lần đầu khi vừa vào trang
        await this.loadProducts();
    },

    // Hàm gọi API và nhờ UI vẽ HTML cho trang Cửa hàng
    loadProducts: async function () {
        const container = document.getElementById("shop-product-list");
        if (container) {
            container.innerHTML = '<div class="col-12 text-center py-5"><div class="spinner-border text-primary"></div></div>';
        }
        // Gọi API lấy data
        const products = await ProductAPI.fetchAll(this.filterState);
        // Nhờ thằng UI vẽ ra
        if (typeof ProductUI !== 'undefined') {
            ProductUI.renderList(products, "shop-product-list");
        }
    },

    // =====================================================================
    // 3. KHỞI TẠO TRANG CHỦ (Load 3 cột sản phẩm bằng API)
    // =====================================================================
    initHomePage: async function () {
        console.log("Khởi tạo Trang Chủ: Đang tải 3 cột sản phẩm...");

        if (typeof ProductAPI !== 'undefined' && typeof ProductUI !== 'undefined') {
            // 3.1. Lấy và vẽ Sản phẩm giảm giá
            const onSaleProducts = await ProductAPI.fetchOnSale();
            ProductUI.renderMiniList(onSaleProducts, "home-onsale-list");

            // 3.2. Lấy và vẽ Sản phẩm bán chạy
            const hotProducts = await ProductAPI.fetchHot();
            ProductUI.renderMiniList(hotProducts, "home-bestseller-list");

            // 3.3. Lấy và vẽ Sản phẩm đánh giá cao
            const topRatedProducts = await ProductAPI.fetchTopRated();
            ProductUI.renderMiniList(topRatedProducts, "home-toprated-list");
        }
    },

    // =====================================================================
    // 4. LƯỚI GÁC CỔNG SỰ KIỆN TOÀN CỤC (EVENT DELEGATION)
    // =====================================================================
    initGlobalEvents: function () {
        document.body.addEventListener("click", (e) => {
            
            // 4.1. Sự kiện Xem Chi Tiết
            const btnDetail = e.target.closest('[data-action="view-detail"]');
            if (btnDetail) {
                e.preventDefault();
                // Ép trình duyệt bay thẳng tới trang chi tiết
                window.location.href = btnDetail.getAttribute("href");
                return;
            }

            // 4.2. Sự kiện Thêm Yêu Thích
            const btnWishlist = e.target.closest('[data-action="add-to-wishlist"]');
            if (btnWishlist) {
                e.preventDefault();
                const id = btnWishlist.getAttribute("data-id");
                this.addToWishlist(id);
            }
        });
    },

    // =====================================================================
    // 5. CÁC HÀM XỬ LÝ NGHIỆP VỤ LẺ
    // =====================================================================

    // Xem chi tiết không cần load lại trang (Dùng PushState)
    loadDetailNoReload: async function (id, slug) {
        console.log("Đang tải chi tiết SP:", slug);
        
        // Nhờ API đi lấy thông tin chi tiết
        const product = await ProductAPI.fetchDetail(id);
        
        if (product && !product.error && typeof ProductUI !== 'undefined') {
            // Nhờ UI thay đổi nội dung trên màn hình hiện tại
            ProductUI.updateDetailPage(product);
            
            // Chiêu trò JS: Đổi URL trên thanh địa chỉ mà không làm f5 trang web
            // Giống như việc ông đổi biển số xe khi đang chạy vậy
            window.history.pushState({ productId: id }, "", `${APP_URL}chi-tiet/${slug}`);
        } else {
            // Nếu lỗi API, thì fallback (dự phòng) bằng cách chuyển trang bình thường
            window.location.href = `${APP_URL}chi-tiet/${slug}`;
        }
    },

    // Thêm vào danh sách yêu thích
    addToWishlist: async function (id) {
        console.log("Đang gọi API thêm Yêu thích cho SP ID:", id);
        
        // Tương lai ông sẽ gọi API chỗ này:
        // const res = await ProductAPI.addToWishlist(id);
        
        // Hiện tại xử lý giao diện cho đẹp:
        alert("Đã thêm sản phẩm ID " + id + " vào danh sách yêu thích!");
        
        // Tìm cái icon trái tim vừa bấm và tô màu đỏ cho nó
        const btn = document.querySelector(`[data-action="add-to-wishlist"][data-id="${id}"] i`);
        if (btn) {
            btn.classList.remove('far'); // Bỏ icon rỗng
            btn.classList.add('fas', 'text-danger'); // Thêm icon đặc màu đỏ
        }
    },

    // Lắng nghe sự kiện người dùng bấm phím Back/Forward của trình duyệt
    initHistoryListener: function () {
        window.addEventListener("popstate", (e) => {
            // Khi user bấm phím Back trên trình duyệt, để an toàn ta load lại trang
            window.location.reload();
        });
    },

    // Hàm gọi API và nhờ UI vẽ HTML cho trang Cửa hàng
    loadProducts: async function () {
        const container = document.getElementById("shop-product-list");
        if (container) {
            // Hiệu ứng loading nhấp nháy cho xịn
            container.innerHTML = `
                <div class="col-12 text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Đang tải...</span>
                    </div>
                </div>`;
        }

        // Gọi API lấy data
        const products = await ProductAPI.fetchAll(this.filterState);
        
        // Nhờ thằng UI vẽ ra
        if (typeof ProductUI !== 'undefined') {
            ProductUI.renderList(products, "shop-product-list");
        }

        // TÍNH NĂNG NÂNG CAO: Cập nhật URL trình duyệt mà KHÔNG reload trang
        // Giúp người dùng copy link gửi cho bạn bè vẫn giữ nguyên bộ lọc
        const cleanState = Object.fromEntries(
            Object.entries(this.filterState).filter(([_, v]) => v !== "")
        );
        const queryString = new URLSearchParams(cleanState).toString();
        const newUrl = queryString ? `${APP_URL}product?${queryString}` : `${APP_URL}product`;
        window.history.pushState({ path: newUrl }, "", newUrl);
    },
};

// =====================================================================
// KHỞI ĐỘNG (AUTO RUN KHI DOM TẢI XONG)
// =====================================================================
document.addEventListener("DOMContentLoaded", () => {
    
    // Nếu trang hiện tại có cái hộp chứa danh sách Cửa hàng -> Khởi tạo Shop
    if (document.getElementById("shop-product-list")) {
        ProductController.initShopPage();
    }

    // Nếu trang hiện tại có cái hộp của Trang chủ -> Khởi tạo Trang chủ
    if (document.getElementById("home-onsale-list")) {
        ProductController.initHomePage();
    }

    // LƯỚI GÁC CỔNG VÀ NÚT BACK (Lúc nào cũng phải chạy)
    ProductController.initGlobalEvents();
    ProductController.initHistoryListener();
});