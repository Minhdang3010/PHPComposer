<?php
// 1. Cấu hình URL & Đường dẫn
define('BASE_URL', 'http://localhost/PHPComposer/');
define('ROOT_PATH', __DIR__ . '/../');

// 2. Cấu hình Múi giờ
date_default_timezone_set('Asia/Ho_Chi_Minh');

// 3. Cấu hình Database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');            // Mật khẩu (để trống nếu dùng XAMPP/Laragon mặc định)
define('DB_NAME', 'mocart_pro_v2'); // Tên cơ sở dữ liệu
?>