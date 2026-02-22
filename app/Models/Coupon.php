<?php
namespace App\Models;

use Core\BaseModel;
use PDO;

class Coupon extends BaseModel {
    protected $table = 'coupons';

    /**
     * Tìm mã giảm giá hợp lệ theo Code
     * Kiểm tra: Đúng mã, Trạng thái hoạt động, Còn hạn dùng, Còn lượt dùng
     */
    public function getValidCoupon($code) {
        $query = "SELECT * FROM {$this->table} 
                  WHERE code = :code 
                  AND status = 1 
                  AND (expires_at > NOW() OR expires_at IS NULL)
                  AND used_count < usage_limit
                  LIMIT 1";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':code' => $code]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Lấy danh sách mã giảm giá còn khả dụng để hiển thị ở trang Checkout
     */
    public function getAvailableList() {
        $query = "SELECT *, 
                  (used_count / usage_limit * 100) as usage_percent 
                  FROM {$this->table} 
                  WHERE status = 1 
                  AND (expires_at > NOW() OR expires_at IS NULL)
                  AND used_count < usage_limit";
                  
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}