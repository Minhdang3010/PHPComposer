const ProductController = {
  // State lưu trữ bộ lọc
  filterState: {
    keyword: "",
    category_id: "",
    brand_id: "",
    sort: "newest",
  },

  // --- HÀM KHỞI TẠO (QUAN TRỌNG NHẤT) ---
  initShopPage: async function () {
    console.log("Shop Page Init - Event Listeners attaching...");

    // 1. Lắng nghe sự kiện TÌM KIẾM (Submit Form)
    const searchForm = document.getElementById("form-search");
    if (searchForm) {
      searchForm.addEventListener("submit", (e) => {
        e.preventDefault(); // Chặn reload trang
        const keyword = document.getElementById("keyword-input").value;
        this.filterState.keyword = keyword;
        this.loadProducts(); // Gọi hàm load lại
      });
    }

    // 2. Lắng nghe sự kiện CLICK DANH MỤC
    // Tìm tất cả thẻ a có class .js-category-link
    const categoryLinks = document.querySelectorAll(".js-category-link");
    categoryLinks.forEach((link) => {
      link.addEventListener("click", (e) => {
        e.preventDefault(); // Chặn thẻ a nhảy link #

        // Lấy ID từ attribute data-id
        const id = link.getAttribute("data-id");

        // Cập nhật state và load lại
        this.filterState.category_id = id;
        this.loadProducts();

        // (Optional) UI: Highlight danh mục đang chọn
        categoryLinks.forEach((l) =>
          l.parentElement.classList.remove("active"),
        ); // Xóa active cũ (nếu CSS có hỗ trợ)
        link.parentElement.classList.add("active"); // Thêm active mới
      });
    });

    // 3. Lắng nghe sự kiện CHECKBOX THƯƠNG HIỆU
    const brandCheckboxes = document.querySelectorAll(".js-brand-checkbox");
    brandCheckboxes.forEach((checkbox) => {
      checkbox.addEventListener("change", (e) => {
        // Logic xử lý chỉ chọn 1 brand (hoặc nhiều brand tùy bạn)
        // Ở đây demo cách chọn đơn giản: Lấy brand vừa bấm

        if (checkbox.checked) {
          // Nếu bấm chọn -> gán ID
          this.filterState.brand_id = checkbox.value;

          // (Optional) Bỏ chọn các cái khác để giống radio button (nếu muốn)
          brandCheckboxes.forEach((box) => {
            if (box !== checkbox) box.checked = false;
          });
        } else {
          // Nếu bỏ chọn -> rỗng
          this.filterState.brand_id = "";
        }

        this.loadProducts();
      });
    });

    // 4. Lắng nghe sự kiện SORT (Select change)
    const sortSelect = document.getElementById("sort-select");
    if (sortSelect) {
      sortSelect.addEventListener("change", (e) => {
        this.filterState.sort = e.target.value;
        this.loadProducts();
      });
    }

    // Load lần đầu khi vào trang
    await this.loadProducts();
  },

  // --- HÀM LOAD DỮ LIỆU ---
  loadProducts: async function () {
    // Hiển thị loading spinner
    const container = document.getElementById("shop-product-list");
    if (container)
      container.innerHTML =
        '<div class="col-12 text-center py-5"><div class="spinner-border text-primary" role="status"></div></div>';

    // Gọi API
    const products = await ProductAPI.fetchAll(this.filterState);

    // Render kết quả
    ProductUI.renderList(products, "shop-product-list");
  },

  // --- CÁC HÀM KHÁC GIỮ NGUYÊN ---
  initHomePage: async function () {
    /*...*/
  },
  loadDetailNoReload: async function (id, slug) {
    /*...*/
  },
  initHistoryListener: function () {
    /*...*/
  },
};

// Auto run
document.addEventListener("DOMContentLoaded", () => {
  if (document.getElementById("shop-product-list")) {
    ProductController.initShopPage();
  }

  // Lắng nghe sự kiện Back/Forward trình duyệt
  ProductController.initHistoryListener();
});
