<?php
namespace App\Controllers;

use Core\Controller;

class AccountController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("User");
    }

    // Helper: Kiểm tra đăng nhập
    private function requireLogin() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "auth/login");
            exit;
        }
    }

    public function dashboard()
    {
        $this->requireLogin();
        $this->view("account/dashboard", ['title' => 'Bảng điều khiển']);
    }

    public function profile()
    {
        $this->requireLogin();

        // Lấy ID từ session
        $userId = $_SESSION['user_id'];
        
        // Dùng hàm find() có sẵn của BaseModel
        $user = $this->userModel->find($userId);

        $data = [
            'user' => $user,
            'title' => 'Hồ sơ cá nhân'
        ];

        $this->view("account/profile", $data);
    }

    public function addressList()
    {
        $this->requireLogin();
        $this->view("account/address-list", ['title' => 'Sổ địa chỉ']);
    }

    public function addressAdd()
    {
        $this->requireLogin();
        $this->view("account/address-add", ['title' => 'Thêm địa chỉ']);
    }

    public function setting()
    {
        $this->requireLogin();
        $this->view("account/setting", ['title' => 'Cài đặt tài khoản']);
    }
}