<?php
$routes = [
    // --- TRANG CHỦ & TĨNH ---
    'home'              => 'home/index',
    'trang-chu'         => 'home/index',
    'gioi-thieu'        => 'home/about',
    'lien-he'           => 'home/contact',
    'chinh-sach'        => 'home/policy', // Nếu có hàm policy
    'cau-hoi-thuong-gap'=> 'home/faq',
    '404'               => 'home/error404',

    // --- SẢN PHẨM (ProductController) ---
    'cua-hang'          => 'product/index',      // Trang danh sách SP
    'san-pham'          => 'product/index',      // Alias khác cho cửa hàng
    'tim-kiem'          => 'product/search',     // Trang tìm kiếm
    'danh-muc'          => 'product/category',   // Trang danh mục (Cần thêm ID phía sau trong code)
    'chi-tiet'          => 'product/show',       // Trang chi tiết (Cần thêm ID)
    'thuong-hieu'       => 'product/brand',
    'tat-ca-danh-muc'   => 'product/allCategories',

    // --- GIỎ HÀNG (CartController) ---
    'gio-hang'          => 'cart/index',
    'thanh-toan'        => 'cart/checkout',
    'hoan-tat-don-hang' => 'cart/complete',      // Trang cảm ơn sau khi mua
    'yeu-thich'         => 'cart/wishlist',      // Sản phẩm yêu thích

    // --- TÀI KHOẢN (AuthController & AccountController) ---
    // Auth
    'dang-nhap'         => 'auth/login',
    'dang-ky'           => 'auth/register',
    'handle-login'      => 'auth/handleLogin',    // Xử lý POST đăng nhập
    'handle-register'   => 'auth/handleRegister', // Xử lý POST đăng ký
    'quen-mat-khau'     => 'auth/forgotPassword',
    'dang-xuat'         => 'auth/logout',
    
    // Account (Yêu cầu đăng nhập)
    'tai-khoan'         => 'account/dashboard',  // Bảng điều khiển
    'ho-so'             => 'account/profile',    // Thông tin cá nhân
    'so-dia-chi'        => 'account/addressList',
    'them-dia-chi'      => 'account/addressAdd',
    'cai-dat-tai-khoan' => 'account/setting',

    // --- ĐƠN HÀNG (OrderController) ---
    'don-hang-cua-toi'  => 'order/list',         // Lịch sử đơn hàng
    'chi-tiet-don-hang' => 'order/detail',       // Xem chi tiết 1 đơn
    'theo-doi-don-hang' => 'order/track',        // Checking vận đơn
    'hoa-don'           => 'order/invoice',      // In hóa đơn
];
?>