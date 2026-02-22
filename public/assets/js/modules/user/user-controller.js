const UserController = {
    async init() {
        if (document.getElementById("address-list-container")) {
            await this.refreshAddressList();
        }
    },

    async refreshAddressList() {
        const addresses = await UserAPI.fetchAddresses();
        UserUI.renderAddressList(addresses, "address-list-container");
    },

    async submitAddress() {
        // Logic thu thập data và gọi API lưu địa chỉ
        const data = {
            id: document.getElementById("modal_addr_id").value,
            name: document.getElementById("modal_name").value,
            phone: document.getElementById("modal_phone").value,
            address: document.getElementById("modal_address").value,
        };
        // ... gọi UserAPI.saveAddress(data) ...
    },

    async submitAddressForm() {
        const data = {
            id: document.getElementById("modal_addr_id").value,
            name: document.getElementById("modal_name").value,
            phone: document.getElementById("modal_phone").value,
            address: document.getElementById("modal_address").value,
        };
        
        const res = await UserAPI.saveAddress(data);
        if (res.status === 'success') {
            bootstrap.Modal.getInstance(document.getElementById("addressModal")).hide();
            await this.refreshAddressList();
        } else {
            alert(res.message);
        }
    }
};

document.addEventListener("DOMContentLoaded", () => {
    const btnSaveAddress = document.getElementById("btn-save-address");
    if (btnSaveAddress) {
        btnSaveAddress.addEventListener("click", () => {
            UserController.submitAddress(); // Gọi logic lưu địa chỉ
        });
    }
});

// Khởi chạy khi trang load
document.addEventListener("DOMContentLoaded", () => UserController.init());