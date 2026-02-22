<?php

namespace Core;

class Controller
{
    public function model($model)
    {
        // 1. Tạo tên đầy đủ có Namespace
        // Ví dụ: truyền vào "Setting" -> thành "App\Models\Setting"
        $modelClass = "\\App\\Models\\" . $model;

        // 2. Kiểm tra class có tồn tại không (để tránh lỗi Fatal)
        if (class_exists($modelClass)) {
            return new $modelClass(); // Tự động chạy __construct của BaseModel
        } else {
            // Nếu không tìm thấy thì báo lỗi rõ ràng thay vì lỗi hệ thống
            die("Lỗi: Không tìm thấy Model có tên là: " . $modelClass);
        }
    }

    public function view($view, $data = [])
    {
        extract($data);
        $viewPath = "../app/Views/" . $view . ".php";
        if (file_exists($viewPath)) {
            require_once $viewPath;
        } else {
            die("Lỗi: Không tìm thấy View: " . $viewPath);
        }
    }

    // core/Controller.php
    public function responseJson($data, $status = 200)
    {
        header('Content-Type: application/json; charset=utf-8');
        http_response_code($status);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }
}
