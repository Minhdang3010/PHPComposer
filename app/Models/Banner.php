<?php
namespace App\Models;

use Core\BaseModel;
use PDO;

class Banner extends BaseModel {
    // Định nghĩa tên bảng để BaseModel biết đường mà query
    protected $table = 'banners';

    // Hàm riêng để lấy banner theo vị trí (hero, small, big)
    public function getByPosition($position, $limit = 3) {
        $query = "SELECT * FROM {$this->table} 
                  WHERE position = :position AND status = 1 
                  ORDER BY id DESC LIMIT :limit";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':position', $position);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>