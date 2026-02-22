<?php

namespace App\Controllers\Api;

use Core\Controller;
use App\Models\CartSession;

class ApiOrderController extends Controller
{
    /**
     * API: Xử lý đặt hàng
     * URL: api/order/place
     * Method: POST
     */
    public function place()
    {
        // 1. Chỉ nhận dữ liệu JSON
        header('Content-Type: application/json');

        // 2. Kiểm tra trạng thái đăng nhập
        if (empty($_SESSION['user_id'])) {
            $this->responseJson([
                'status' => 'error', 
                'message' => 'Vui lòng đăng nhập để thực hiện thanh toán!'
            ], 401);
        }

        // 3. Lấy dữ liệu từ Fetch gửi lên
        $input = json_decode(file_get_contents("php://input"), true);

        // 4. Validate dữ liệu đầu vào cơ bản
        if (empty($input['address_id'])) {
            $this->responseJson([
                'status' => 'error', 
                'message' => 'Bạn chưa chọn địa chỉ nhận hàng!'
            ]);
        }

        // 5. Kiểm tra giỏ hàng trong Session
        $cartSession = new CartSession();
        $cartData = $cartSession->getContent();

        if (empty($cartData)) {
            $this->responseJson([
                'status' => 'error', 
                'message' => 'Giỏ hàng của bạn đang trống, không thể đặt hàng!'
            ]);
        }

        try {
            // 6. Gọi Model Order xử lý nghiệp vụ lưu Database
            // Lưu ý: Model này sẽ lo việc trừ tồn kho và trừ lượt dùng Voucher
            $orderModel = $this->model('Order');
            
            $orderCode = $orderModel->placeOrder(
                $_SESSION['user_id'],
                $input['address_id'],
                $cartData,
                $input['note'] ?? ''
            );

            if ($orderCode) {
                // 7. THÀNH CÔNG: Dọn dẹp dữ liệu tạm sau khi đã vào Database
                $cartSession->clear(); // Xóa giỏ hàng
                unset($_SESSION['voucher']); // Xóa mã giảm giá đã áp dụng

                $this->responseJson([
                    'status' => 'success',
                    'message' => 'Đặt hàng thành công! Cảm ơn bạn đã mua sắm.',
                    'order_id' => $orderCode
                ]);
            } else {
                // 8. THẤT BẠI: Lỗi phát sinh từ tầng Model (Ví dụ: DB lỗi)
                $this->responseJson([
                    'status' => 'error', 
                    'message' => 'Hệ thống không thể tạo đơn hàng lúc này. Vui lòng thử lại sau!'
                ]);
            }
        } catch (\Exception $e) {
            // 9. Xử lý ngoại lệ (Exception)
            $this->responseJson([
                'status' => 'error', 
                'message' => 'Lỗi Server: ' . $e->getMessage()
            ], 500);
        }
    }
}