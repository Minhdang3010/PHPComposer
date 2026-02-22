<?php
namespace Core;
use PDO;
use PDOException;

class Database {
    // 1. Lấy thông tin từ file Config (Không còn fix cứng nữa)
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USER;
    private $password = DB_PASS;
    
    public $conn;

    // 2. Hàm kết nối (Giữ nguyên logic, chỉ thay đổi nguồn dữ liệu ở trên)
    public function getConnection() {
        $this->conn = null;
        
        try {
            // Chuỗi kết nối
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8mb4";
            
            // Tùy chọn tối ưu cho PDO
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $this->conn = new PDO($dsn, $this->username, $this->password, $options);
            
        } catch(PDOException $e) {
            echo "Lỗi kết nối Database: " . $e->getMessage();
            die();
        }
        
        return $this->conn;
    }
}
?>