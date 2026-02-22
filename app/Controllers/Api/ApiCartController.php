<?php
namespace App\Controllers\Api;

use Core\Controller;
use App\Models\CartSession;

class ApiCartController extends Controller {
    // Lấy thông tin giỏ hàng
    public function info() {
        $cart = new CartSession();
        $this->responseJson([
            'items'       => $cart->getContent(),
            'subtotal'    => $cart->getSubtotal(),
            'discount'    => $cart->getDiscountAmount(),
            'total'       => $cart->finalTotal(),
            'coupon_code' => $_SESSION['voucher']['code'] ?? null
        ]);
    }

    // Thêm sản phẩm
    public function add() {
        $input = json_decode(file_get_contents("php://input"), true);
        $product = $this->model('Product')->findWithPrice($input['id'] ?? null);

        if (!$product) $this->responseJson(['status' => 'error', 'message' => 'Sản phẩm không tồn tại'], 404);

        $cart = new CartSession();
        $cart->add($product, $input['quantity'] ?? 1);
        $this->responseJson(['status' => 'success', 'message' => 'Đã thêm vào giỏ hàng!']);
    }

    // Cập nhật số lượng
    public function update() {
        $input = json_decode(file_get_contents("php://input"), true);
        $cart = new CartSession();
        $cart->update($input['id'], $cart->getContent()[$input['id']]['quantity'] + $input['delta']);
        $this->info(); // Trả về data mới ngay lập tức
    }

    // Xóa sản phẩm
    public function remove() {
        $input = json_decode(file_get_contents("php://input"), true);
        $cart = new CartSession();
        $cart->remove($input['id']);
        $this->info();
    }
}