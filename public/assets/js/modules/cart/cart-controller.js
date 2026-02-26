/**
 * TẦNG CONTROLLER - ĐIỀU PHỐI VÀ BẮT SỰ KIỆN (BẢN ĐÃ CẬP NHẬT)
 */
const CartController = {
    // 1. Khởi chạy
    async init() {
        this.registerEvents(); // Đăng ký sự kiện
        
        // Chỉ refresh giỏ hàng nếu đang ở trang có hiển thị giỏ hàng
        await this.refreshCart();
        
        if (document.getElementById("address-list-container")) {
            await this.refreshAddresses();
        }
        
        if (document.getElementById("voucher-list-container")) {
            await this.refreshVouchers();
        }
    },

    // 2. Đăng ký toàn bộ sự kiện (EventListener)
    registerEvents() {
        // --- A. Sự kiện trong Giỏ hàng (Tăng/Giảm/Xóa) ---
        const cartBody = document.getElementById("cart-body");
        if (cartBody) {
            cartBody.addEventListener("click", (e) => {
                const btnQty = e.target.closest(".btn-change-qty");
                if (btnQty) this.updateQty(btnQty.dataset.id, parseInt(btnQty.dataset.delta));

                const btnRemove = e.target.closest(".btn-remove-item");
                if (btnRemove) this.removeItem(btnRemove.dataset.id);
            });
        }

        // --- B. Sự kiện THÊM VÀO GIỎ (Từ bất kỳ đâu trên trang) ---
        document.body.addEventListener("click", (e) => {
            const btnCart = e.target.closest('[data-action="add-to-cart"]');
            if (btnCart) {
                e.preventDefault(); // Chặn nhảy trang
                const productId = btnCart.getAttribute('data-id');
                this.addToCart(productId);
            }
        });

        // --- C. Sự kiện Địa chỉ & Voucher ---
        const addrContainer = document.getElementById("address-list-container");
        if (addrContainer) {
            addrContainer.addEventListener("click", (e) => {
                const btnEdit = e.target.closest(".btn-edit-address");
                if (btnEdit) this.openEditAddress(btnEdit.dataset.id);

                const btnAdd = e.target.closest("#btn-add-new-address");
                if (btnAdd) this.openAddAddress();
            });
        }

        // CHỖ FIX LỖI SỐ 1: Bỏ chữ "-cart" để khớp với ID của nút trong file PHP
        const btnApplyVoucher = document.getElementById("btn-apply-voucher");
        if (btnApplyVoucher) {
            btnApplyVoucher.addEventListener("click", () => this.handleApplyVoucher());
        }

        const btnSaveAddr = document.getElementById("btn-save-address");
        if(btnSaveAddr) {
             btnSaveAddr.addEventListener("click", () => this.submitAddress());
        }

        // --- D. Sự kiện Thanh toán ---
        const btnCheckout = document.getElementById("btn-place-order");
        if (btnCheckout) {
            btnCheckout.addEventListener("click", (e) => {
                e.preventDefault();
                this.processCheckout();
            });
        }
    },

    // 3. Các hàm Logic nghiệp vụ
    async addToCart(id) {
        const result = await CartAPI.addToCart(id);
        if (result.status === "success") {
            alert(result.message);
            await this.refreshCart();
        } else {
            alert(result.message);
        }
    },

    async refreshCart() {
        const result = await CartAPI.fetchCartInfo();
        if(!result || !result.items) return;

        const items = Object.values(result.items);
        CartUI.renderHeaderCount(items.reduce((sum, item) => sum + item.quantity, 0));
        
        // CHỖ FIX LỖI SỐ 2: Tách renderSummary ra khỏi điều kiện cart-body
        if(document.getElementById("cart-body")) {
            CartUI.renderCartTable(items);
        }
        
        // Miễn là trang có khu vực hiển thị Tóm tắt (có #cart_subtotal) là cho render luôn
        if (document.getElementById("cart_subtotal")) {
            CartUI.renderSummary(result);
        }
    },

    async updateQty(id, delta) {
        const result = await CartAPI.updateQuantity(id, delta);
        this.refreshDataAfterUpdate(result);
    },

    async removeItem(id) {
        if (!confirm("Xóa sản phẩm này?")) return;
        const result = await CartAPI.removeFromCart(id);
        this.refreshDataAfterUpdate(result);
    },

    refreshDataAfterUpdate(result) {
        const items = Object.values(result.items);
        if (document.getElementById("cart-body")) CartUI.renderCartTable(items);
        if (document.getElementById("cart_subtotal")) CartUI.renderSummary(result);
        CartUI.renderHeaderCount(items.reduce((s, i) => s + i.quantity, 0));
    },

    async refreshAddresses() {
        const addresses = await CartAPI.fetchAddresses();
        CartUI.renderAddressList(addresses);
    },

    async refreshVouchers() {
        const vouchers = await CartAPI.fetchVouchers();
        CartUI.renderVoucherList(vouchers);
    },

    async handleApplyVoucher() {
        const selected = document.querySelector('input[name="selected_voucher"]:checked');
        if (!selected) return alert("Vui lòng chọn 1 mã giảm giá!");
        
        const result = await CartAPI.applyVoucher(selected.value);
        alert(result.message);
        
        if (result.status === "success") {
            await this.refreshCart(); // Reset lại bảng giá
            const modalEl = document.getElementById("voucherModal");
            const modal = bootstrap.Modal.getInstance(modalEl);
            if (modal) modal.hide();
        }
    },

    async processCheckout() {
        const selectedAddress = document.querySelector('input[name="address_id"]:checked');
        if (!selectedAddress) return alert("Vui lòng chọn địa chỉ nhận hàng!");
        
        if (!confirm("Xác nhận đặt hàng?")) return;

        const btn = document.getElementById("btn-place-order");
        if(btn) { btn.innerText = "Đang xử lý..."; btn.disabled = true; }

        try {
            const result = await CartAPI.placeOrder({
                address_id: selectedAddress.value,
                note: document.getElementById("order_note")?.value || "",
            });

            if (result.status === "success") {
                alert("Đặt hàng thành công!");
                // Sửa nhẹ chỗ này để chuyển đúng trang hoàn tất
                window.location.href = `${APP_URL}hoan-tat-don-hang?code=${result.order_id || ''}`;
            } else {
                alert(result.message);
                if(btn) { btn.innerText = "Hoàn tất đặt hàng"; btn.disabled = false; }
            }
        } catch (e) {
            console.error(e);
            alert("Lỗi kết nối Server!");
            if(btn) btn.disabled = false;
        }
    },

    openAddAddress() {
        document.getElementById("addressModalLabel").innerText = "Thêm địa chỉ mới";
        document.getElementById("quickAddressForm").reset();
        document.getElementById("modal_addr_id").value = "";
        new bootstrap.Modal(document.getElementById("addressModal")).show();
    },

    async openEditAddress(id) {
        const addresses = await CartAPI.fetchAddresses();
        const addr = addresses.find(a => a.id == id);
        if (addr) {
            document.getElementById("addressModalLabel").innerText = "Chỉnh sửa địa chỉ";
            document.getElementById("modal_addr_id").value = addr.id;
            document.getElementById("modal_name").value = addr.full_name;
            document.getElementById("modal_phone").value = addr.phone;
            document.getElementById("modal_address").value = addr.address_line;
            new bootstrap.Modal(document.getElementById("addressModal")).show();
        }
    },
    
    async submitAddress() {
         const data = {
            id: document.getElementById("modal_addr_id").value,
            name: document.getElementById("modal_name").value,
            phone: document.getElementById("modal_phone").value,
            address: document.getElementById("modal_address").value,
        };
        const res = await CartAPI.saveAddress(data);
        if (res.status === "success") {
            const modal = bootstrap.Modal.getInstance(document.getElementById("addressModal"));
            if(modal) modal.hide();
            await this.refreshAddresses();
        } else { 
            alert("Lỗi khi lưu địa chỉ!"); 
        }
    }
};

// Khởi động
document.addEventListener("DOMContentLoaded", () => CartController.init());