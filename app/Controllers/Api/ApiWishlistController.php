<?php

namespace App\Controllers\Api;

use Core\Controller;

class ApiWishlistController extends Controller
{
    private $wishlistModel;

    public function __construct()
    {
        // Gọi Model Wishlist (Tự động nạp qua hàm model của Core\Controller)
        $this->wishlistModel = $this->model("Wishlist");
    }

    /**
     * API: Bật / Tắt Yêu Thích (Toggle)
     * Đường dẫn: POST /api/wishlist/toggle
     */
    public function toggle()
    {
        // 1. Nhận cục dữ liệu JSON từ JS API gửi lên
        $input = json_decode(file_get_contents("php://input"), true);
        $productId = $input['product_id'] ?? null;

        // 2. Kiểm tra xem khách hàng đã đăng nhập chưa (Validate)
        // Trong hệ thống của ông, khi đăng nhập sẽ lưu $_SESSION['user_id']
        if (empty($_SESSION['user_id'])) {
            $this->responseJson([
                'status' => 'error', 
                'message' => 'Vui lòng đăng nhập để sử dụng tính năng này!'
            ], 401);
        }

        $userId = $_SESSION['user_id'];

        if (!$productId) {
            $this->responseJson(['status' => 'error', 'message' => 'Thiếu ID sản phẩm!'], 400);
        }

        // 3. Xử lý nghiệp vụ (Hỏi Bếp Trưởng xem món này có trong Wishlist chưa)
        $isExists = $this->wishlistModel->checkExists($userId, $productId);

        if ($isExists) {
            // Nếu có rồi thì Xóa (Bỏ tim)
            $this->wishlistModel->removeWishlist($userId, $productId);
            $this->responseJson(['status' => 'removed', 'message' => 'Đã bỏ khỏi danh sách yêu thích!']);
        } else {
            // Nếu chưa có thì Thêm (Thả tim)
            $this->wishlistModel->addWishlist($userId, $productId);
            $this->responseJson(['status' => 'added', 'message' => 'Đã thêm vào danh sách yêu thích!']);
        }
    }
}