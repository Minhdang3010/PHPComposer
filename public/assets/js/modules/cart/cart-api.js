/**
 * TẦNG API - CHUYÊN LO VIỆC GIAO TIẾP SERVER
 */
const CartAPI = {
    async fetchCartInfo() {
        const res = await fetch(`${APP_URL}api/cart/info`);
        return await res.json();
    },

    async updateQuantity(id, delta) {
        const res = await fetch(`${APP_URL}api/cart/update`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id, delta }),
        });
        return await res.json();
    },

    async removeFromCart(id) {
        const res = await fetch(`${APP_URL}api/cart/remove`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id }),
        });
        return await res.json();
    },

    async saveAddress(data) {
        const res = await fetch(`${APP_URL}api/user/save`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        });
        return await res.json();
    },

    async addToCart(id, quantity) {
        const res = await fetch(`${APP_URL}api/cart/add`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ id, quantity }),
        });
        return await res.json();
    },
    
    async applyVoucher(code) {
        const res = await fetch(`${APP_URL}api/voucher/apply`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ code }),
        });
        return await res.json();
    },

    async fetchVouchers() {
        const res = await fetch(`${APP_URL}api/voucher/list`);
        return await res.json();
    },

    // Các hàm khác trỏ về ApiUserController hoặc ApiOrderController tùy bạn tách
    async fetchAddresses() {
        const res = await fetch(`${APP_URL}api/user/addresses`); // Đổi nếu đã tách ApiUserController
        return await res.json();
    }
};