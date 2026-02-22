<?php

namespace App\Models;

class CartSession
{
    // Lấy toàn bộ sản phẩm trong giỏ
    public function getContent()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    // Thêm sản phẩm
    public function add($product, $quantity = 1)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $id = $product['id'];

        // 1. Logic lấy giá an toàn: Ưu tiên sale_price, nếu không có lấy price
        $originPrice = isset($product['price']) ? (float)$product['price'] : 0;
        $salePrice = isset($product['sale_price']) ? (float)$product['sale_price'] : 0;

        // Nếu có giá sale và giá sale nhỏ hơn giá gốc thì lấy giá sale
        $finalPrice = ($salePrice > 0 && $salePrice < $originPrice) ? $salePrice : $originPrice;

        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$id] = [
                'id' => $id,
                'name' => $product['name'] ?? 'Sản phẩm không tên',
                'price' => $finalPrice, // Đảm bảo đây là con số cụ thể
                'image' => $product['thumbnail'] ?? ($product['image'] ?? 'default.jpg'),
                'quantity' => (int)$quantity
            ];
        }
    }

    /**
     * HÀM CẬP NHẬT SỐ LƯỢNG
     * Nếu quantity <= 0 thì tự động gọi hàm remove để xóa sản phẩm
     */
    public function update($id, $quantity)
    {
        if (isset($_SESSION['cart'][$id])) {
            if ($quantity <= 0) {
                $this->remove($id);
            } else {
                $_SESSION['cart'][$id]['quantity'] = $quantity;
            }
        }
    }

    /**
     * HÀM XÓA SẢN PHẨM (Mày đang thiếu cái này)
     */
    public function remove($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }

    // Tính tổng tiền giỏ hàng
    public function total()
    {
        $total = 0;
        $items = $this->getContent();
        foreach ($items as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    // Làm trống giỏ hàng (Dùng sau khi thanh toán thành công)
    public function clear()
    {
        unset($_SESSION['cart']);
    }
    // Tính tiền hàng gốc
    public function getSubtotal()
    {
        $total = 0;
        foreach ($this->getContent() as $item) {
            $total += $item['price'] * $item['quantity'];
        }
        return $total;
    }

    // Tính tiền được giảm từ Voucher
    public function getDiscountAmount()
    {
        if (!isset($_SESSION['voucher'])) return 0;
        $v = $_SESSION['voucher'];
        $sub = $this->getSubtotal();
        // Nếu type = 1 là giảm %, ngược lại giảm tiền mặt
        $discount = ($v['type'] == 1) ? ($sub * $v['value'] / 100) : $v['value'];
        return min($discount, $sub);
    }

    // Tổng thanh toán cuối cùng
    public function finalTotal($shipping = 0)
    {
        return $this->getSubtotal() - $this->getDiscountAmount() + $shipping;
    }
}
