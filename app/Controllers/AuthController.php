<?php
namespace App\Controllers;

use Core\Controller;

class AuthController extends Controller
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model("User");
    }

    // --- VIEW ---

    public function login()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL);
            exit;
        }
        $this->view("auth/login", ['title' => 'Đăng nhập']);
    }

    public function register()
    {
        if (isset($_SESSION['user_id'])) {
            header("Location: " . BASE_URL);
            exit;
        }
        $this->view("auth/register", ['title' => 'Đăng ký']);
    }

    public function forgotPassword()
    {
        $this->view("auth/forgot-password", ['title' => 'Quên mật khẩu']);
    }

    // --- XỬ LÝ (ACTIONS) ---

    public function handleLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? ''; 
            $password = $_POST['password'] ?? '';

            // Kiểm tra user có tồn tại ko (Hàm này bạn cần đảm bảo có trong User Model)
            // Hoặc dùng: $users = $this->userModel->customQuery("SELECT * FROM users WHERE email = '$email'");
            // Nhưng tốt nhất Model User nên có hàm checkAccountExists($email)
            $user = $this->userModel->checkAccountExists($email); 

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['user_role'] = $user['role'];
                header("Location: " . BASE_URL);
            } else {
                $_SESSION['error'] = "Email hoặc mật khẩu không chính xác!";
                header("Location: " . BASE_URL . "auth/login");
            }
        }
    }

    public function handleRegister()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            if ($this->userModel->checkAccountExists($email)) {
                $_SESSION['error'] = "Email đã tồn tại!";
                header("Location: " . BASE_URL . "auth/register");
                exit;
            }

            // Mã hóa mật khẩu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            $data = [
                'name' => $name,
                'email' => $email,
                'password' => $hashed_password, // Lưu pass đã mã hóa
                'role' => 0, // 0: User, 1: Admin
                'status' => 1
            ];

            if ($this->userModel->create($data)) { // Dùng hàm create của BaseModel
                $_SESSION['success'] = "Đăng ký thành công!";
                header("Location: " . BASE_URL . "auth/login");
            } else {
                $_SESSION['error'] = "Lỗi hệ thống!";
                header("Location: " . BASE_URL . "auth/register");
            }
        }
    }

    public function logout()
    {
       
        // 2. Xóa toàn bộ biến trong $_SESSION
        session_unset();

        // 3. Hủy bỏ session hoàn toàn khỏi hệ thống
        session_destroy();

        // 4. Chuyển hướng về trang chủ
        header("Location: " . BASE_URL);
        exit();
    }
}