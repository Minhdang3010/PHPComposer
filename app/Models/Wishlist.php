<?php

namespace App\Models;

use Core\BaseModel;
use PDO;

class Wishlist extends BaseModel
{
    // Khai báo bảng làm việc chính
    protected $table = 'wishlist';

    /**
     * Hàm kiểm tra xem người dùng đã yêu thích sản phẩm chưa
     */
    public function checkExists($userId, $productId)
    {
        $query = "SELECT * FROM {$this->table} WHERE user_id = :user_id AND product_id = :product_id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':product_id', $productId, PDO::PARAM_INT);
        $stmt->execute();
        
        // Trả về true nếu có dữ liệu, false nếu không
        return $stmt->fetch(PDO::FETCH_ASSOC) ? true : false;
    }

    /**
     * Hàm thêm sản phẩm vào danh sách yêu thích
     */
    public function addWishlist($userId, $productId)
    {
        $query = "INSERT INTO {$this->table} (user_id, product_id) VALUES (:user_id, :product_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':product_id', $productId, PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Hàm xóa sản phẩm khỏi danh sách yêu thích
     */
    public function removeWishlist($userId, $productId)
    {
        $query = "DELETE FROM {$this->table} WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':user_id', $userId, PDO::PARAM_INT);
        $stmt->bindValue(':product_id', $productId, PDO::PARAM_INT);
        return $stmt->execute();
    }
}