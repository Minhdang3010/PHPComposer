<?php

namespace App\Models;

use Core\BaseModel;
use PDO;
use Exception;

class User extends BaseModel
{
    protected $table = 'users';

    /**
     * 1. Lấy thông tin User kèm Phone và Address
     * SỬA: Đổi user_addresses.address thành user_addresses.address_line
     */
    public function checkAccountExists($email)
    {
        // QUAN TRỌNG: Phải Select * để lấy password hash, id, name...
        // Dùng LEFT JOIN để lấy luôn địa chỉ (nếu có) phục vụ cho trang Profile sau này
        $query = "SELECT users.*, user_addresses.phone, user_addresses.address_line as address 
                  FROM users
                  LEFT JOIN user_addresses ON users.id = user_addresses.user_id
                  WHERE users.email = :email 
                  LIMIT 1";

        $statement = $this->conn->prepare($query);
        $statement->bindParam(':email', $email);
        $statement->execute();

        // Trả về Mảng dữ liệu user (Array) hoặc False nếu không thấy
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // ... (Giữ nguyên hàm registerUser cũ của bạn ở đây) ...
    public function registerUser($data)
    {
        try {
            $this->conn->beginTransaction();
            $hashedPassword = password_hash($data['password'], PASSWORD_DEFAULT);

            // Insert Users
            $queryUser = "INSERT INTO users (name, email, password, role, status) VALUES (:name, :email, :password, 0, 1)";
            $stmtUser = $this->conn->prepare($queryUser);
            $stmtUser->execute([
                ':name' => $data['name'],
                ':email' => $data['email'],
                ':password' => $hashedPassword
            ]);
            $userId = $this->conn->lastInsertId();

            // Insert Address (Nếu có data phone/address) - Logic này tùy lúc register có nhập hay ko
            // Nhưng thường register form basic chỉ có email/pass/name nên đoạn này có thể bỏ qua hoặc để trống

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            return false;
        }
    }

    /**
     * 3. Cập nhật Profile (Quan trọng: Sửa tên cột cho khớp DB mới)
     */
    public function updateProfile($userId, $data)
    {
        try {
            $this->conn->beginTransaction();

            // 1. Update bảng users (Tên chính)
            $queryUser = "UPDATE users SET name = :name WHERE id = :id";
            $stmtUser = $this->conn->prepare($queryUser);
            $stmtUser->execute([':name' => $data['name'], ':id' => $userId]);

            // 2. Xử lý bảng user_addresses
            // Check xem user đã có địa chỉ chưa
            $queryCheck = "SELECT id FROM user_addresses WHERE user_id = :user_id";
            $stmtCheck = $this->conn->prepare($queryCheck);
            $stmtCheck->execute([':user_id' => $userId]);
            $exists = $stmtCheck->fetchColumn();

            if ($exists) {
                // UPDATE: Sửa address thành address_line
                // Lưu ý: Ta cũng update luôn full_name trong bảng address cho đồng bộ
                $queryAddr = "UPDATE user_addresses 
                              SET phone = :phone, 
                                  address_line = :address,
                                  full_name = :full_name
                              WHERE user_id = :user_id";
                $stmtAddr = $this->conn->prepare($queryAddr);
                $stmtAddr->execute([
                    ':phone' => $data['phone'],
                    ':address' => $data['address'], // Bên Controller gửi qua key là 'address'
                    ':full_name' => $data['name'],  // Lấy tên từ bảng user đắp qua
                    ':user_id' => $userId
                ]);
            } else {
                // INSERT: Bắt buộc phải có full_name vì DB để NOT NULL
                $queryAddr = "INSERT INTO user_addresses (user_id, full_name, phone, address_line, is_default) 
                              VALUES (:user_id, :full_name, :phone, :address, 1)";
                $stmtAddr = $this->conn->prepare($queryAddr);
                $stmtAddr->execute([
                    ':user_id' => $userId,
                    ':full_name' => $data['name'],
                    ':phone' => $data['phone'],
                    ':address' => $data['address']
                ]);
            }

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            // In lỗi ra để debug nếu cần: echo $e->getMessage(); die();
            return false;
        }
    }
    // 4. Đổi mật khẩu
    public function changePassword($userId, $newPassword)
    {
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password = :password WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':password' => $hashedPassword,
            ':id' => $userId
        ]);
    }

    // 5. Lấy user theo ID (để check mật khẩu cũ)
    public function getUserById($id)
    {
        $query = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getAddresses($userId)
    {
        // Lấy tất cả địa chỉ của user, cái nào mặc định cho lên đầu
        $query = "SELECT * FROM user_addresses WHERE user_id = :uid ORDER BY is_default DESC, id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([':uid' => $userId]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function saveAddress($userId, $data)
    {
        if (!empty($data['id'])) {
            // Cập nhật địa chỉ cũ
            $query = "UPDATE user_addresses SET full_name = :name, phone = :phone, address_line = :addr 
                  WHERE id = :id AND user_id = :uid";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([
                ':name' => $data['name'],
                ':phone' => $data['phone'],
                ':addr' => $data['address'],
                ':id' => $data['id'],
                ':uid' => $userId
            ]);
        }
        // Thêm địa chỉ mới
        $query = "INSERT INTO user_addresses (user_id, full_name, phone, address_line) 
              VALUES (:uid, :name, :phone, :addr)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([
            ':uid' => $userId,
            ':name' => $data['name'],
            ':phone' => $data['phone'],
            ':addr' => $data['address']
        ]);
    }
}
