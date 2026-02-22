<?php
namespace App\Controllers;
use Core\Controller;

class OrderController extends Controller
{
    private $orderModel;
    
    public function __construct(){
        // Sau này sẽ cần Model Order để lấy lịch sử đơn hàng
        // $this->orderModel = $this->model("Order"); 
    }

    public function list()
    {
        $this->view("order/order-list", ['title' => 'Đơn hàng của tôi']);
    }

    public function detail($id = null)
    {
        $data = [];
        // $data['order'] = $this->orderModel->find($id);
        $this->view("order/order-detail", $data);
    }

    public function track()
    {
        $this->view("order/order-track", ['title' => 'Theo dõi đơn hàng']);
    }

    public function invoice($id = null)
    {
        // Riêng trang Invoice thường in ấn nên có thể không cần Header/Footer chung
        // Bạn có thể require trực tiếp hoặc dùng view() nhưng trong file view phải tự lo layout
        $this->view("order/invoice", []); 
    }
}