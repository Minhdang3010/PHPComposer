/**
 * TẦNG UI - CHUYÊN LO VIỆC HIỂN THỊ TRẠNG THÁI ĐƠN HÀNG
 */
const OrderUI = {
    // 1. Hiệu ứng Loading cho nút đặt hàng
    setLoading(isLoading) {
        // Tìm nút bấm thông qua ID thay vì thuộc tính onclick cũ
        const btn = document.getElementById("btn-place-order");
        if (!btn) return;

        if (isLoading) {
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ĐANG XỬ LÝ...';
        } else {
            btn.disabled = false;
            // Trả lại nội dung nguyên bản của nút
            btn.innerText = 'Hoàn tất đặt hàng';
        }
    },


    // 2. Thông báo lỗi
    showError(message) {
        alert("❌ Lỗi đặt hàng: " + message);
    },

    // 3. Thông báo thành công và chuyển hướng
    showSuccess(orderId) {
        alert("🎉 Chúc mừng! Đặt hàng thành công. Mã đơn của bạn là: " + orderId);
        // Chuyển hướng về trang hoàn tất
        window.location.href = `${APP_URL}hoan-tat-don-hang`;
    }
};