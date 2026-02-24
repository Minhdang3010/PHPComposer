<?php

namespace App\Controllers;

use Core\Controller;

class HomeController extends Controller
{
    // Khai báo các thuộc tính để chứa instance của Model
    private $settingModel;
    private $productModel;
    private $bannerModel;
    private $brandModel;
    private $categoryModel;

    public function __construct()
    {
        // Khởi tạo các Model thông qua hàm model() của Core\Controller
        // Hàm này sẽ tự động require file model và trả về đối tượng model
        // Model mới đã tự động kết nối DB trong __construct của nó (BaseModel)
        $this->settingModel  = $this->model("Setting");
        $this->productModel  = $this->model("Product");
        $this->bannerModel   = $this->model("Banner");
        $this->brandModel    = $this->model("Brand");
        $this->categoryModel = $this->model("Category");
    }

    // Trang chủ: domain/home hoặc domain/
    // Bỏ vào file: app/Controllers/HomeController.php (Thay thế hàm index cũ)
    public function index()
    {
        $allSmalls = $this->bannerModel->getByPosition('small', 10);
        $data['firstSmall']  = [
            $allSmalls[1] ?? null,
            $allSmalls[2] ?? null,
            $allSmalls[3] ?? null
        ];
        $data['secondSmall'] = $allSmalls[0] ?? null;
        $data['brands']      = $this->brandModel->all();

        // FIX: Lấy dữ liệu cho Tab "Sản phẩm phổ biến"
        $data['categories'] = $this->categoryModel->all();
        $data['productsByCategory'] = [];
        if (!empty($data['categories'])) {
            foreach ($data['categories'] as $cat) {
                // Lấy 8 sản phẩm cho mỗi danh mục
                $data['productsByCategory'][$cat['id']] = $this->productModel->getProductsByCategory($cat['id'], 8);
            }
        }

        // FIX: Lấy dữ liệu cho "Sản phẩm xu hướng"
        $data['trendingProducts'] = $this->productModel->getTrendingProducts(8);

        $data['title'] = "Trang chủ - Siêu Thị Mocart";
        $this->view("home/index", $data);
    }

    public function about()
    {
        $this->view("home/about", ['title' => "Giới thiệu"]);
    }

    public function contact()
    {
        $this->view("home/contact", ['title' => "Liên hệ"]);
    }

    public function faq()
    {
        $this->view("home/faq", ['title' => "Câu hỏi thường gặp"]);
    }

    public function returnPolicy()
    {
        $this->view("home/return", ['title' => "Chính sách đổi trả"]);
    }

    public function error404()
    {
        $this->view("home/404", ['title' => "Lỗi 404 - Không tìm thấy trang"]);
    }
}
