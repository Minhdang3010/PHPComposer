<?php
namespace App\Models;

use Core\BaseModel;
use PDO;

class Setting extends BaseModel {
    protected $table = 'settings';

    // Hàm lấy giá trị cấu hình theo key (Ví dụ: getByKey('home_onsale_limit'))
    public function getConfig($key) {
        $query = "SELECT config_value FROM " . $this->table . " WHERE config_key = :key LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':key', $key);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // Nếu tìm thấy thì trả về giá trị, không thì trả về null
        return $result ? $result['config_value'] : null;
    }
}