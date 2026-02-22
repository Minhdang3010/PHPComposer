/**
 * TẦNG ĐIỀU PHỐI - XỬ LÝ THANH TOÁN
 * 1 Nhận sự kiện (click, submit…)
    2 Lấy dữ liệu cần thiết
      3 Gọi API
        4 Quyết định hiển thị cái gì
 */
const OrderController = {
    async processCheckout() {
        // 1. Lấy địa chỉ
        const selectedAddress = document.querySelector('input[name="address_id"]:checked');
        if (!selectedAddress) return alert("Vui lòng chọn địa chỉ nhận hàng!");

        const note = document.getElementById("order_note")?.value || "";

        // confirm: Trả về true/false, nếu false thì return luôn
        if (!confirm("Xác nhận đặt hàng?")) return;

        // 2. Chặn nút bấm (FIX LỖI Ở ĐÂY: Gọi thẳng ID thay vì tìm theo onclick)
        const btn = document.getElementById("btn-place-order");
        if(btn) {
            btn.innerText = "Đang xử lý..."; 
            btn.disabled = true;
        }

        try {
            // 3. Gọi API đặt hàng
            const result = await OrderAPI.placeOrder({
                address_id: selectedAddress.value,
                note: note,
            });

            if (result.status === "success") {
                alert("Đặt hàng thành công!");
                window.location.href = `${APP_URL}hoan-tat-don-hang?code=${result.order_id}`;
            } else {
                alert(result.message);
                // Mở lại nút nếu lỗi
                if(btn) {
                    btn.innerText = "Hoàn tất đặt hàng";
                    btn.disabled = false;
                }
            }
        } catch (e) {
            console.error(e); // Log lỗi ra console để debug
            alert("Lỗi kết nối server!");
            if(btn) btn.disabled = false;
        }
    }
};

// Đăng ký sự kiện (Giống như đăng ký Route trong PHP)
document.addEventListener("DOMContentLoaded", () => {
    const btnPlaceOrder = document.getElementById("btn-place-order");
    if (btnPlaceOrder) {
        btnPlaceOrder.addEventListener("click", (e) => {
            e.preventDefault(); // Chặn hành động submit form mặc định nếu nút nằm trong form
            OrderController.processCheckout();
        });
    }
});