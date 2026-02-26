<?php
namespace App\Models;

class CartSession
{
    // Lấy toàn bộ sản phẩm trong giỏ
    public function getContent()
    {
        return isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
    }

    // Thêm Biến thể vào giỏ hàng
    public function addVariant($variant, $quantity = 1)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $id = $variant['id']; // Đây là ID của bảng product_variants

        // 1. Logic nối tên: (VD: Macbook Air M2 (Space Gray - 13 inch))
        $attr = [];
        if (!empty($variant['color_name'])) $attr[] = $variant['color_name'];
        if (!empty($variant['size_name'])) $attr[] = $variant['size_name'];
        $attrString = implode(' - ', $attr);
        $displayName = $variant['product_name'] . ($attrString ? " ($attrString)" : "");

        // 2. Logic lấy giá: Ưu tiên giá Sale của biến thể đó
        $price = ($variant['sale_price'] > 0 && $variant['sale_price'] < $variant['price']) 
                 ? $variant['sale_price'] : $variant['price'];

        // 3. Logic lấy ảnh: Ưu tiên ảnh của Biến thể, nếu không có lấy ảnh Product
        $image = !empty($variant['image']) ? $variant['image'] : $variant['product_image'];

        // 4. Đẩy vào Session
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$id] = [
                'id'         => $id,
                'product_id' => $variant['product_id'],
                'name'       => $displayName,
                'price'      => (float)$price,
                'image'      => $image,
                'quantity'   => (int)$quantity
            ];
        }
    }

    // Cập nhật số lượng
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

    // Xóa khỏi giỏ
    public function remove($id)
    {
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }

    // Xóa sạch giỏ hàng (Dùng khi checkout xong)
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