<?php
namespace App\Models;

use Core\BaseModel;
use PDO;

class Category extends BaseModel {
    protected $table = 'categories';

    // Không cần viết lại __construct, all, find vì đã kế thừa từ BaseModel
    
    // Hàm tìm danh mục theo Slug
    public function getBySlug($slug) {
        $query = "SELECT * FROM " . $this->table . " WHERE slug = :slug AND status = 1 LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':slug', $slug);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
?>