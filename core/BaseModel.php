<?php
namespace Core;

use PDO;
use Core\Database; // Khai báo sử dụng class Database

class BaseModel {
    protected $conn;
    protected $table;
    protected $primaryKey = 'id';

    // Bỏ tham số $db truyền vào. Model tự khởi tạo!
    public function __construct() {
        // Tự động tạo instance của Database và lấy kết nối
        $dbFactory = new Database();
        $this->conn = $dbFactory->getConnection();
    }

    // 1. Lấy tất cả (Cơ bản - dùng cho danh mục, thương hiệu)
    public function all() {
        //  Nó chỉ lấy những bản ghi có status = 1 (đang hoạt động) và sắp xếp cái mới nhất lên đầu (DESC).
        $query = "SELECT * FROM {$this->table} WHERE status = 1 ORDER BY {$this->primaryKey} DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Tìm theo ID xem chi tiết 1 sản phẩm hay 1 bài viết.
    public function find($id) {
        // Sử dụng prepare statement với biến :id để đảm bảo an toàn, chống SQL Injection.
        $query = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 3. Xóa
    public function delete($id) {
        $query = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    // 4. Thêm mới (Nhận mảng dữ liệu: ['name'=>'A', 'price'=>10])
    public function create($data) {
        $fields = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        
        $query = "INSERT INTO {$this->table} ({$fields}) VALUES ({$placeholders})";
        $stmt = $this->conn->prepare($query);
        
        foreach($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        return $stmt->execute();
    }

    // 5. Cập nhật
    public function update($id, $data) {
        $fields = "";
        foreach($data as $key => $value) {
            $fields .= "{$key} = :{$key}, ";
        }
        $fields = rtrim($fields, ", ");
        
        $query = "UPDATE {$this->table} SET {$fields} WHERE {$this->primaryKey} = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id);
        foreach($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        
        return $stmt->execute();
    }
}