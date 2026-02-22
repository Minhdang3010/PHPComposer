<?php
namespace App\Models;

use Core\BaseModel;
use App\Models\OrderDetail;
use PDO;

class Order extends BaseModel {
    protected $table = 'orders';

    public function placeOrder($userId, $addressId, $cartItems, $note = '') {
        // 1. Lấy thông tin địa chỉ chi tiết từ bảng user_addresses
        $queryAddr = "SELECT * FROM user_addresses WHERE id = :id AND user_id = :uid LIMIT 1";
        $stmtAddr = $this->conn->prepare($queryAddr);
        $stmtAddr->execute([':id' => $addressId, ':uid' => $userId]);
        $address = $stmtAddr->fetch(PDO::FETCH_ASSOC);

        if (!$address) return false;

        // 2. Tính toán tiền nong (Bao gồm cả Voucher nếu có)
        $subtotal = 0;
        foreach ($cartItems as $item) {
            $subtotal += $item['price'] * $item['quantity'];
        }
        
        $discount = 0;
        $couponCode = null;
        if (isset($_SESSION['voucher'])) {
            $v = $_SESSION['voucher'];
            $couponCode = $v['code'];
            $discount = ($v['type'] == 1) ? ($subtotal * $v['value'] / 100) : $v['value'];
        }

        // 3. Chuẩn bị mảng Order (Phải khớp chính xác tên cột trong SQL)
        $dataOrder = [
            'user_id'         => $userId,
            'order_code'      => 'DH' . rand(1000, 9999),
            'subtotal'        => $subtotal,
            'discount_amount' => $discount,
            'total_price'     => $subtotal - $discount,
            'coupon_code'     => $couponCode,
            'receiver_name'   => $address['full_name'], // Chuyển từ address_id sang thông tin thật
            'receiver_phone'  => $address['phone'],
            'address_line'    => $address['address_line'],
            'note'            => $note,
            'status'          => 0
        ];

        if (!$this->create($dataOrder)) return false;
        $orderId = $this->conn->lastInsertId(); 

        // 4. Lưu chi tiết sản phẩm
        $orderDetailModel = new OrderDetail();
        foreach ($cartItems as $item) {
            $orderDetailModel->create([
                'order_id'      => $orderId,
                'variant_id'    => $item['id'],
                'product_name'  => $item['name'],
                'sku'           => 'SKU-' . $item['id'], 
                'quantity'      => $item['quantity'],
                'price_at_time' => $item['price'] 
            ]);

            // THÊM: Logic trừ tồn kho 
            $this->conn->prepare("UPDATE product_variants SET quantity = quantity - :qty WHERE id = :id")
                       ->execute([':qty' => $item['quantity'], ':id' => $item['id']]);
        }

        return $dataOrder['order_code'];
    }
}