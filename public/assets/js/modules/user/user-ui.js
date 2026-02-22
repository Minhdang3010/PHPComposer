// public/assets/js/modules/user/user-ui.js
const UserUI = {
    renderAddressList(addresses, containerId) {
        const container = document.getElementById(containerId);
        if (!container) return;

        if (addresses.length === 0) {
            container.innerHTML = '<div class="alert alert-info">Bạn chưa có địa chỉ nào.</div>';
            return;
        }

        container.innerHTML = addresses.map((addr, idx) => `
            <div class="address-item border rounded p-3 mb-3 position-relative">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="address_id" 
                           id="addr_${addr.id}" value="${addr.id}" ${idx === 0 ? 'checked' : ''}>
                    <label class="form-check-label ms-2" for="addr_${addr.id}">
                        <strong>${addr.full_name}</strong> | ${addr.phone} <br>
                        <small class="text-muted">${addr.address_line}</small>
                    </label>
                </div>
                <button class="btn btn-sm btn-link position-absolute top-0 end-0 m-2 btn-edit-address" 
                        data-id="${addr.id}">Sửa</button>
            </div>
        `).join("");
    }
};