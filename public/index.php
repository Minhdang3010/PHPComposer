<?php
session_start();
// 1. Nạp file Cấu hình (ĐẦU TIÊN) - Để mọi file sau đều dùng được hằng số
require_once '../app/Config/config.php'; // Không dùng Use vì file config không phải class

// 2. Nạp Autoload của Composer
require_once '../vendor/autoload.php'; // Bắt buộc phải dùng require_once để dùng thư viện của Composer

// 3. Sử dụng Namespace App
use Core\App; 

// 4. Khởi chạy ứng dụng
$myApp = new App();
?>