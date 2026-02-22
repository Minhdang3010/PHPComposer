/**
 * TẦNG API - CHUYÊN BIỆT CHO ĐƠN HÀNG
 */
const OrderAPI = {
    // Gọi đến ApiOrderController -> hàm place()
    async placeOrder(orderData) {
        const res = await fetch(`${APP_URL}api/order/place`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(orderData),
        });
        return await res.json();
    },

    // Sau này có làm thêm lấy lịch sử đơn hàng thì nhét vào đây luôn
    async fetchHistory() {
        const res = await fetch(`${APP_URL}api/order/history`);
        return await res.json();
    }
};