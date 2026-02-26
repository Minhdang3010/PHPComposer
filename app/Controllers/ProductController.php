<?php

namespace App\Controllers;

use Core\Controller;

class ProductController extends Controller
{
    private $productModel;
    private $brandModel;
    private $categoryModel;

    public function __construct()
    {
        // Khởi tạo Model tự động (đã có kết nối DB bên trong)
        $this->productModel = $this->model("Product");
        $this->brandModel   = $this->model("Brand");
        $this->categoryModel = $this->model("Category");
    }

    // Trang danh sách sản phẩm: index.php?url=product
    public function index()
    {
        // 1. Lấy dữ liệu Sidebar (Thương hiệu & Danh mục)
        $data['brands'] = $this->brandModel->all();
        $data['categories'] = $this->categoryModel->all(); // Nếu view cần danh mục

        // 2. Kiểm tra lọc theo Brand trên URL (GET method)
        if (isset($_GET['brand_id']) && !empty($_GET['brand_id'])) {
            $brand_id = intval($_GET['brand_id']);
            $data['products'] = $this->productModel->getProductsByBrand($brand_id);
        } else {
            // Lấy tất cả (kèm lọc nếu Model có hỗ trợ params)
            $data['products'] = $this->productModel->getFilteredProducts();
        }

        // 3. Tiêu đề trang
        $data['title'] = "Cửa hàng - Siêu Thị Mocart";

        // 4. Gọi View
        $this->view("product/shop-grid", $data);
    }

    // Chi tiết sản phẩm: index.php?url=product/show/1
    public function show($slug) // Tham số nhận vào bây giờ là slug
    {
        // 1. Gọi hàm tìm theo Slug vừa viết ở Model
        $product = $this->productModel->getProductDetailBySlug($slug);

        if (!$product) {
            header("Location: " . BASE_URL . "home/error404");
            exit;
        }

        // Lấy ID thật để query các bảng phụ (vì các bảng kia vẫn lưu product_id)
        $realProductId = $product['id'];

        // 2. Lấy ảnh gallery (Vẫn dùng ID để tìm ảnh, vì bảng ảnh lưu product_id)
        $gallery = $this->productModel->getProductGallery($realProductId);

        // 3. Lấy sản phẩm liên quan
        $relatedProducts = $this->productModel->getProductsByCategory($product['category_id'], 4);
        //  4. Lấy biến thể sản phẩm (nếu có)
        $variants = $this->productModel->getProductVariants($realProductId);
        $data = [
            'product' => $product,
            'gallery' => $gallery,
            'relatedProducts' => $relatedProducts,
            'variants' => $variants,
            'title' => $product['name'] . ' - Mocart'
        ];

        $this->view("product/shop-single", $data);
    }

    // Tìm kiếm: index.php?url=product/search&keyword=abc
    public function search()
    {
        $keyword = $_GET['keyword'] ?? '';
        $data['products'] = $this->productModel->getFilteredProducts($keyword);
        $data['title'] = "Tìm kiếm: " . $keyword;

        $this->view("product/shop-search", $data);
    }

    // Trang danh mục: index.php?url=danh-muc/slug
    public function category($slug = null) // Đổi tên biến $id thành $slug cho đúng bản chất
    {
        if ($slug === null) {
            // TRƯỜNG HỢP 1: Không có slug -> Xem danh sách tất cả danh mục
            $data['categories'] = $this->categoryModel->all();
            $data['title'] = "Tất cả danh mục sản phẩm";
            $this->view("product/category", $data);
        } else {
            // TRƯỜNG HỢP 2: Có slug (VD: tai-nghe-loa) -> Xem sản phẩm

            // 1. Tìm thông tin Danh mục dựa vào Slug
            // (Phải đảm bảo Model Category đã có hàm getBySlug)
            $category = $this->categoryModel->getBySlug($slug);

            // 2. Nếu không tìm thấy danh mục -> Lỗi 404
            if (!$category) {
                header("Location: " . BASE_URL . "home/error404");
                exit;
            }

            // 3. Lấy sản phẩm dựa vào ID của danh mục vừa tìm được
            $data['products'] = $this->productModel->getProductsByCategory($category['id']);

            // 4. Các dữ liệu phụ cho View
            $data['categories'] = $this->categoryModel->all();
            $data['brands']     = $this->brandModel->all();

            // 5. Title động theo tên danh mục
            $data['title']      = $category['name'];

            // Gọi View
            $this->view("product/shop-grid", $data);
        }
    }
    // Trang danh sách sản phẩm theo Thương hiệu
    // URL: domain/thuong-hieu/apple
    public function brand($slug = null)
    {
        // 1. Kiểm tra slug
        if ($slug == null) {
            header("Location: " . BASE_URL . "cua-hang");
            exit;
        }

        // 2. Tìm thương hiệu theo Slug (Gọi hàm vừa viết ở bước 2)
        $brand = $this->brandModel->getBySlug($slug);

        // Nếu không tìm thấy thương hiệu -> Lỗi 404
        if (!$brand) {
            header("Location: " . BASE_URL . "home/error404");
            exit;
        }

        // 3. Lấy sản phẩm theo ID của thương hiệu vừa tìm được
        // (Vẫn dùng hàm cũ getProductsByBrand vì nó lọc theo brand_id trong bảng products)
        $data['products'] = $this->productModel->getProductsByBrand($brand['id']);

        // 4. Các dữ liệu phụ cho Sidebar
        $data['brands'] = $this->brandModel->all();
        $data['categories'] = $this->categoryModel->all();

        // 5. Title động theo tên thương hiệu
        $data['title'] = "Thương hiệu: " . $brand['name'];

        // 6. Tái sử dụng view shop-grid
        $this->view("product/shop-grid", $data);
    }
}
