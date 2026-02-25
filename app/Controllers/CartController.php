<?php

namespace App\Controllers;

use Core\Controller;
use App\Models\CartSession;

class CartController extends Controller
{
    public function index()
    {
        $this->view("cart/shop-cart", ['title' => 'Giỏ hàng của bạn']);
    }

    public function checkout()
    {
        if (empty($_SESSION['user_id'])) {
            header("Location: " . BASE_URL . "dang-nhap");
            exit;
        }
        $cart = new CartSession();
        if (empty($cart->getContent())) {
            header("Location: " . BASE_URL . "cart");
            exit;
        }
        $this->view("cart/shop-checkout", ['title' => 'Thanh toán đơn hàng']);
    }
    public function complete()
    {
        // Lấy mã đơn hàng từ URL, nếu không có thì để trống
        $orderCode = $_GET['code'] ?? 'N/A';

        // Truyền dữ liệu vào view thông qua mảng dữ liệu
        $this->view("cart/shop-checkout-complete", [
            'title' => 'Hoàn tất thanh toán',
            'orderCode' => $orderCode
        ]);
    }
    // Cập nhật hàm wishlist trong app/Controllers/CartController.php
    public function wishlist() {
        // 1. Chặn cổ bắt đăng nhập
        if (empty($_SESSION['user_id'])) {
            $_SESSION['error'] = "Vui lòng đăng nhập để xem danh sách yêu thích.";
            header("Location: " . BASE_URL . "dang-nhap");
            exit;
        }

        // 2. Nhờ Bếp trưởng lấy dữ liệu
        $userId = $_SESSION['user_id'];
        $wishlistModel = $this->model('Wishlist');
        $items = $wishlistModel->getUserWishlist($userId);

        // 3. Đưa cho phục vụ (View) mang ra bàn
        $this->view("cart/wishlist", [
            'title' => 'Sản phẩm yêu thích',
            'wishlistItems' => $items
        ]);
    }
}
