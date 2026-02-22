<?php
namespace App\Controllers\Api;

use Core\Controller;
use App\Models\CartSession;

class ApiVoucherController extends Controller {
    
    /**
     * Lấy danh sách mã giảm giá khả dụng
     * URL: api/voucher/list
     */
    public function list() {
        $couponModel = $this->model('Coupon');
        $vouchers = $couponModel->getAvailableList();
        $this->responseJson($vouchers);
    }

    /**
     * Áp dụng mã giảm giá vào Session
     * URL: api/voucher/apply
     */
    public function apply() {
        $input = json_decode(file_get_contents("php://input"), true);
        $code = $input['code'] ?? '';

        // 1. Kiểm tra mã hợp lệ từ Model
        $couponModel = $this->model('Coupon');
        $coupon = $couponModel->getValidCoupon($code);

        if (!$coupon) {
            $this->responseJson(['status' => 'error', 'message' => 'Mã giảm giá không tồn tại, hết hạn hoặc hết lượt!']);
        }

        // 2. Kiểm tra điều kiện đơn hàng tối thiểu
        $cart = new CartSession();
        if ($cart->getSubtotal() < $coupon['min_order_value']) {
            $this->responseJson([
                'status' => 'error',
                'message' => 'Đơn hàng chưa đủ giá trị tối thiểu ($' . number_format($coupon['min_order_value']) . ') để dùng mã này.'
            ]);
        }

        // 3. Lưu vào Session và báo thành công
        $_SESSION['voucher'] = $coupon;
        $this->responseJson([
            'status' => 'success',
            'message' => 'Áp dụng mã ' . $code . ' thành công!'
        ]);
    }
}