<?php

namespace Core;

class App
{
    protected $controller = "Home"; // Mặc định cho Client
    protected $action = "index";
    protected $params = [];
    protected $folder = ""; // Thư mục con (Rỗng, Admin\ hoặc Api\)

    function __construct()
    {
        // 1. XỬ LÝ ALIAS TRƯỚC
        $arr = $this->UrlProcess();

        // 2. PHÂN LUỒNG THƯ MỤC
        if (isset($arr[0])) {
            $prefix = strtolower($arr[0]);
            
            if ($prefix === 'admin') {
                $this->folder = "Admin\\";
                $this->controller = "Dashboard"; 
                unset($arr[0]);
                $arr = array_values($arr);
            } elseif ($prefix === 'api') {
                $this->folder = "Api\\";
                // CHỈNH SỬA: Mặc định cho API là ApiHome thay vì Home
                $this->controller = "ApiHome"; 
                unset($arr[0]);
                $arr = array_values($arr);
            }
        }

        // 3. KIỂM TRA CONTROLLER (Bổ sung logic thêm tiền tố "Api")
        if (isset($arr[0]) && $arr[0] != "") {
            $controllerName = ucfirst($arr[0]);
            $physicalSubFolder = str_replace("\\", "/", $this->folder);
            
            // CHỈNH SỬA: Nếu ở trong folder Api, ta thêm tiền tố "Api" vào tên file
            $filePrefix = ($this->folder === "Api\\") ? "Api" : "";
            $checkPath = "../app/Controllers/" . $physicalSubFolder . $filePrefix . $controllerName . "Controller.php";

            if (file_exists($checkPath)) {
                // Lưu tên Controller bao gồm cả tiền tố (VD: ApiProduct)
                $this->controller = $filePrefix . $controllerName;
                unset($arr[0]);
            }
        }

        // 4. NẠP FILE VÀ KHỞI TẠO ĐỐI TƯỢNG
        $physicalSubFolder = str_replace("\\", "/", $this->folder);
        $fileToLoad = "../app/Controllers/" . $physicalSubFolder . $this->controller . "Controller.php";
        
        if (file_exists($fileToLoad)) {
            require_once $fileToLoad;
        } else {
            die("Lỗi: Không tìm thấy Controller tại " . $fileToLoad);
        }

        // Class Name đầy đủ: \App\Controllers\Api\ApiProductController
        $controllerClass = "\\App\\Controllers\\" . $this->folder . $this->controller . "Controller";

        if (class_exists($controllerClass)) {
            $this->controller = new $controllerClass;
        } else {
            die("Lỗi: Không tìm thấy class $controllerClass.");
        }

        // 5. XỬ LÝ ACTION
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // 6. XỬ LÝ PARAMS
        $this->params = $arr ? array_values($arr) : [];

        // 7. THỰC THI
        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    function UrlProcess()
    {
        if (isset($_GET["url"])) {
            $url = trim($_GET["url"], "/");
            $urlArray = explode("/", filter_var($url, FILTER_SANITIZE_URL));

            require "../app/Config/routes.php";

            if (isset($urlArray[0]) && isset($routes[$urlArray[0]])) {
                $realRoute = $routes[$urlArray[0]];
                $urlArray[0] = $realRoute;
            }

            $newUrl = implode("/", $urlArray);
            return explode("/", $newUrl);
        }
        return [];
    }
}