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
    public function index()
    {
        $allSmalls = $this->bannerModel->getByPosition('small', 10);
        // Kiểm tra tồn tại để tránh lỗi undefined index
        $data['firstSmall']  = [
            $allSmalls[1] ?? null, 
            $allSmalls[2] ?? null, 
            $allSmalls[3] ?? null
        ];
        $data['secondSmall'] = $allSmalls[0] ?? null;
        $data['brands']      = $this->brandModel->all();

        // Thêm title cho view
        $data['title'] = "Trang chủ - Siêu Thị Mocart";

        // --- LOAD VIEW ---
        // Sử dụng $this->view() của Core\Controller
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
?>