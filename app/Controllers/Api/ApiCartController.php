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

    // Thêm sản phẩm vào giỏ
    public function add() {
        $input = json_decode(file_get_contents("php://input"), true);
        $variant_id = $input['id'] ?? null;
        $quantity = $input['quantity'] ?? 1;

        if (!$variant_id) {
            $this->responseJson(['status' => 'error', 'message' => 'Thiếu ID phiên bản sản phẩm'], 400);
        }

        // Đã dời SQL sang Model Product, gọi cực kỳ gọn gàng
        $variant = $this->model('Product')->getVariantFullInfo($variant_id);

        if (!$variant) {
            $this->responseJson(['status' => 'error', 'message' => 'Sản phẩm không tồn tại hoặc đã bị ẩn'], 404);
        }

        // Gọi Session để lưu
        $cart = new CartSession();
        $cart->addVariant($variant, $quantity); 

        $this->responseJson([
            'status' => 'success', 
            'message' => 'Đã thêm thành công vào giỏ hàng!',
        ]);
    }

    // Cập nhật số lượng
    public function update() {
        $input = json_decode(file_get_contents("php://input"), true);
        $cart = new CartSession();
        $items = $cart->getContent();
        
        if(isset($items[$input['id']])) {
            $cart->update($input['id'], $items[$input['id']]['quantity'] + $input['delta']);
        }
        $this->info();
    }

    // Xóa sản phẩm khỏi giỏ
    public function remove() {
        $input = json_decode(file_get_contents("php://input"), true);
        $cart = new CartSession();
        $cart->remove($input['id']);
        $this->info();
    }
}