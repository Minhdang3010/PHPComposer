<?php
namespace App\Controllers\Api;

use Core\Controller;

class ApiUserController extends Controller {
    
    // Lấy danh sách địa chỉ của user đang đăng nhập
    public function addresses() {
        if (empty($_SESSION['user_id'])) {
            $this->responseJson([], 401); // Unauthorized
        }
        
        $userModel = $this->model('User');
        $list = $userModel->getAddresses($_SESSION['user_id']);
        $this->responseJson($list);
    }

    // Thêm mới hoặc cập nhật địa chỉ
    public function save() {
        $input = json_decode(file_get_contents("php://input"), true);
        if (empty($_SESSION['user_id'])) {
            $this->responseJson(['status' => 'error', 'message' => 'Vui lòng đăng nhập'], 401);
        }

        $userModel = $this->model('User');
        $success = $userModel->saveAddress($_SESSION['user_id'], $input);
        
        $this->responseJson([
            'status' => $success ? 'success' : 'error',
            'message' => $success ? 'Đã lưu địa chỉ!' : 'Lỗi hệ thống'
        ]);
    }
}