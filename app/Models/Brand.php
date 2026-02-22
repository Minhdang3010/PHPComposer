<?php

namespace App\Models;

use Core\BaseModel;
use PDO;

class Brand extends BaseModel
{
    protected $table = 'brands';

    // Không cần viết lại __construct, all, find vì đã kế thừa từ BaseModel

    public function getBySlug($slug)
    {
        $sql = "SELECT * FROM {$this->table} WHERE slug = :slug AND status = 1 LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':slug', $slug);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
}
