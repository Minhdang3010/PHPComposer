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
    /**
     * Lấy danh sách sản phẩm yêu thích của 1 user
     */
    public function getUserWishlist($userId) {
        // Nối bảng wishlist với bảng products và product_variants để lấy chi tiết SP
        $query = "SELECT p.*, w.id as wishlist_id, 
                         MIN(v.price) as price, 
                         MIN(v.sale_price) as sale_price 
                  FROM {$this->table} w
                  INNER JOIN products p ON w.product_id = p.id
                  LEFT JOIN product_variants v ON p.id = v.product_id
                  WHERE w.user_id = :user_id AND p.status = 1
                  GROUP BY p.id
                  ORDER BY w.id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}