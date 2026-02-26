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
        this.filterState.keyword =
          document.getElementById("keyword-input").value;
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
        categoryLinks.forEach((l) =>
          l.parentElement.classList.remove("active"),
        );
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
      container.innerHTML =
        '<div class="col-12 text-center py-5"><div class="spinner-border text-primary"></div></div>';
    }
    // Gọi API lấy data
    const products = await ProductAPI.fetchAll(this.filterState);
    // Nhờ thằng UI vẽ ra
    if (typeof ProductUI !== "undefined") {
      ProductUI.renderList(products, "shop-product-list");
    }
  },

  // =====================================================================
  // 3. KHỞI TẠO TRANG CHỦ (Load 3 cột sản phẩm bằng API)
  // =====================================================================
  initHomePage: async function () {
    console.log("Khởi tạo Trang Chủ: Đang tải 3 cột sản phẩm...");

    if (typeof ProductAPI !== "undefined" && typeof ProductUI !== "undefined") {
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

    if (product && !product.error && typeof ProductUI !== "undefined") {
      // Nhờ UI thay đổi nội dung trên màn hình hiện tại
      ProductUI.updateDetailPage(product);

      // Chiêu trò JS: Đổi URL trên thanh địa chỉ mà không làm f5 trang web
      // Giống như việc ông đổi biển số xe khi đang chạy vậy
      window.history.pushState(
        { productId: id },
        "",
        `${APP_URL}chi-tiet/${slug}`,
      );
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
    const btn = document.querySelector(
      `[data-action="add-to-wishlist"][data-id="${id}"] i`,
    );
    if (btn) {
      btn.classList.remove("far"); // Bỏ icon rỗng
      btn.classList.add("fas", "text-danger"); // Thêm icon đặc màu đỏ
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
    if (typeof ProductUI !== "undefined") {
      ProductUI.renderList(products, "shop-product-list");
    }

    // TÍNH NĂNG NÂNG CAO: Cập nhật URL trình duyệt mà KHÔNG reload trang
    // Giúp người dùng copy link gửi cho bạn bè vẫn giữ nguyên bộ lọc
    const cleanState = Object.fromEntries(
      Object.entries(this.filterState).filter(([_, v]) => v !== ""),
    );
    const queryString = new URLSearchParams(cleanState).toString();
    const newUrl = queryString
      ? `${APP_URL}product?${queryString}`
      : `${APP_URL}product`;
    window.history.pushState({ path: newUrl }, "", newUrl);
  },
  // =====================================================================
  // 6. KHỞI TẠO TRANG CHI TIẾT SẢN PHẨM
  // =====================================================================
  initDetailPage: async function () {
    const productIdInput = document.querySelector('input[name="product_id"]');
    if (!productIdInput) return; // Nếu không có input này -> Không phải trang chi tiết -> Dừng

    // Gọi chức năng đổi ảnh gallery khởi động
    if (typeof ProductController.initGallery === "function") {
      ProductController.initGallery();
    }

    const productId = productIdInput.value;
    const variants = await ProductAPI.fetchVariants(productId);

    // Xử lý đổi biến thể (Radio Buttons)
    const variantRadios = document.querySelectorAll(
      'input[name="choose_variant"]',
    );
    if (variantRadios.length > 0 && variants.length > 0) {
      variantRadios.forEach((radio) => {
        radio.addEventListener("change", (e) => {
          const selectedId = e.target.value;
          const variant = variants.find((v) => v.id == selectedId);
          ProductUI.updateVariantInfo(variant);
        });
      });

      // Kích hoạt mặc định biến thể đang được checked đầu tiên
      const firstChecked = document.querySelector(
        'input[name="choose_variant"]:checked',
      );
      if (firstChecked) {
        const firstVariant = variants.find((v) => v.id == firstChecked.value);
        ProductUI.updateVariantInfo(firstVariant);
      }
    }

    // ==========================================
    // TÍNH NĂNG 1: Nút Tăng/Giảm số lượng
    // ==========================================
    const minusBtn = document.querySelector(".minus-btn");
    const plusBtn = document.querySelector(".plus-btn");
    const qtyInput = document.getElementById("buy-quantity");

    if (minusBtn && plusBtn && qtyInput) {
      minusBtn.addEventListener("click", () => {
        let currentVal = parseInt(qtyInput.value) || 1;
        if (currentVal > 1) qtyInput.value = currentVal - 1;
      });
      plusBtn.addEventListener("click", () => {
        let currentVal = parseInt(qtyInput.value) || 1;
        qtyInput.value = currentVal + 1;
      });
    }

    // ==========================================
    // TÍNH NĂNG 2: Xử lý nút Thêm giỏ hàng
    // ==========================================
    const btnAddCart = document.getElementById("btn-add-cart");
    if (btnAddCart) {
      btnAddCart.addEventListener("click", async (e) => {
        e.preventDefault();
        const variantId = document.getElementById("selected-variant-id").value;
        const qty = document.getElementById("buy-quantity").value;

        if (!variantId) return alert("Vui lòng chọn phiên bản trước!");

        // Đổi nút thành trạng thái Loading
        const originalText = btnAddCart.innerHTML;
        btnAddCart.innerHTML =
          '<i class="fas fa-spinner fa-spin"></i> Đang thêm...';
        btnAddCart.disabled = true;

        try {
          const res = await CartAPI.addToCart(variantId, parseInt(qty));
          if (res.status === "success") {
            alert("Đã thêm vào giỏ hàng thành công!");
            // Cập nhật số lượng trên icon giỏ hàng ở Header
            if (typeof CartController !== "undefined")
              CartController.refreshCart();
          } else {
            alert(res.message || "Có lỗi xảy ra");
          }
        } catch (err) {
          alert("Lỗi kết nối Server!");
        }

        // Trả nút về bình thường
        btnAddCart.innerHTML = originalText;
        btnAddCart.disabled = false;
      });
    }

    // ==========================================
    // TÍNH NĂNG 3: Xử lý nút Mua Ngay
    // ==========================================
    const btnBuyNow = document.getElementById("btn-buy-now");
    if (btnBuyNow) {
      btnBuyNow.addEventListener("click", async (e) => {
        e.preventDefault();
        const variantId = document.getElementById("selected-variant-id").value;
        const qty = document.getElementById("buy-quantity").value;

        if (!variantId) return alert("Vui lòng chọn phiên bản trước!");

        btnBuyNow.innerText = "Đang xử lý...";
        btnBuyNow.disabled = true;

        const res = await CartAPI.addToCart(variantId, parseInt(qty));
        if (res.status === "success") {
          window.location.href = APP_URL + "thanh-toan"; // Chuyển thẳng tới trang Checkout
        } else {
          alert(res.message || "Có lỗi xảy ra");
          btnBuyNow.innerText = "Mua Ngay";
          btnBuyNow.disabled = false;
        }
      });
    }
  },
  // =====================================================================
  // 7. KHỞI TẠO THƯ VIỆN TƯƠNG TÁC ẢNH CHI TIẾT
  // =====================================================================
  initGallery: function () {
    const thumbnails = document.querySelectorAll(".thumb-item");
    thumbnails.forEach((thumb) => {
      thumb.addEventListener("click", (e) => {
        const newImageSrc = thumb.getAttribute("data-image");
        // Giao cho UI làm hiệu ứng hiển thị
        ProductUI.changeMainImage(newImageSrc, thumb);
      });
    });
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
  // Khởi tạo trang chi tiết
  ProductController.initDetailPage();

  ProductController.initGlobalEvents();
  ProductController.initHistoryListener();
});
