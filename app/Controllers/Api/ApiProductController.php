<?php

namespace App\Controllers\Api;

use Core\Controller;

class ApiProductController extends Controller
{
    private $productModel;

    public function __construct()
    {
        // Khởi tạo model Product
        $this->productModel = $this->model("Product");
    }
    // 1. Lấy tất cả sản phẩm
    public function index()
    {
        // Lấy tất cả tham số từ URL
        $keyword = $_GET['keyword'] ?? null;

        // Chuẩn bị mảng filters
        $filters = [
            'category_id' => $_GET['category_id'] ?? null,
            'brand_id'    => $_GET['brand_id'] ?? null,
            'min_price'   => $_GET['min_price'] ?? null,
            'max_price'   => $_GET['max_price'] ?? null,
            'sort'        => $_GET['sort'] ?? 'newest' // Mặc định mới nhất
        ];
        $products = $this->productModel->getFilteredProducts($keyword, $filters);
        $this->responseJson($products);
    }
    // 2. Lấy sản phẩm theo ID Danh mục
    public function category($id = null)
    {
        if (!$id) {
            $this->responseJson(['status' => 'error', 'message' => 'Thiếu ID danh mục'], 400);
        }
        $products = $this->productModel->getProductsByCategory($id);
        $this->responseJson($products);
    }
    // 3. Lấy sản phẩm Bán chạy (Hot)
    public function hot()
    {
        $products = $this->productModel->getBestSellerProducts(3);
        $this->responseJson($products);
    }
    // 4. Chi tiết sản phẩm
    public function show($id = null)
    {
        if (!$id) {
            $this->responseJson(['status' => 'error', 'message' => 'Thiếu ID sản phẩm'], 400);
        }
        $product = $this->productModel->findWithPrice($id);
        if ($product) {
            $gallery = $this->productModel->getProductGallery($id);
            $product['gallery'] = $gallery;
            $this->responseJson($product);
        } else {
            $this->responseJson(['status' => 'error', 'message' => 'Không tìm thấy sản phẩm'], 404);
        }
    }
    // 5. API: Sản phẩm đang giảm giá (Cho cột 1 trang chủ)
    public function onsale()
    {
        $products = $this->productModel->getOnSaleProducts(3); // Fix lại gọi đúng hàm
        $this->responseJson($products);
    }
    // 6. API: Sản phẩm đánh giá cao (Cho cột 3 trang chủ)
    public function toprated()
    {
        $products = $this->productModel->getTopRatedProducts(3);
        $this->responseJson($products);
    }
    // 7.  API: Lấy sản phẩm xu hướng
    public function trending()
    {
        $products = $this->productModel->getTrendingProducts(8);
        $this->responseJson($products);
    }
    // 8. API: Lấy danh sách biến thể của sản phẩm
    public function variants($id = null)
    {
        if (!$id) {
            $this->responseJson(['status' => 'error', 'message' => 'Thiếu ID sản phẩm'], 400);
        }
        
        $variants = $this->productModel->getProductVariants($id);
        
        // THÊM ĐOẠN NÀY: Lặp qua từng biến thể để gắn thêm mảng "gallery" cho nó
        foreach ($variants as $key => $v) {
            $variants[$key]['gallery'] = $this->productModel->getImagesByVariant($v['id']);
        }

        $this->responseJson($variants);
    }
}
