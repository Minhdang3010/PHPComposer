/**
 * TẦNG UI - CHUYÊN LO VIỆC VẼ GIAO DIỆN (KHÔNG CÓ ONCLICK)
 */
const CartUI = {
    formatCurrency(number) {
        return new Intl.NumberFormat("en-US", {
            style: "currency",
            currency: "USD",
        }).format(number);
    },

    renderHeaderCount(totalQty) {
        document.querySelectorAll(".cart-count").forEach((el) => (el.innerText = totalQty));
    },

    renderCartTable(items) {
        const cartBody = document.getElementById("cart-body");
        if (!cartBody) return;

        if (items.length === 0) {
            cartBody.innerHTML = `<tr><td colspan="6" class="text-center py-5"><h5>Giỏ hàng đang trống!</h5></td></tr>`;
            return;
        }

        cartBody.innerHTML = items.map((item) => `
            <tr>
                <td><div class="shop-cart-img"><img src="${APP_URL}public/assets/img/product/${item.image}"></div></td>
                <td><h5 class="shop-cart-name">${item.name}</h5></td>
                <td><span>${this.formatCurrency(item.price)}</span></td>
                <td>
                    <div class="shop-cart-qty">
                        <button class="btn-change-qty" data-id="${item.id}" data-delta="-1"><i class="fal fa-minus"></i></button>
                        <input type="text" value="${item.quantity}" readonly disabled>
                        <button class="btn-change-qty" data-id="${item.id}" data-delta="1"><i class="fal fa-plus"></i></button>
                    </div>
                </td>
                <td><span>${this.formatCurrency(item.price * item.quantity)}</span></td>
                <td>
                    <a href="javascript:void(0)" class="btn-remove-item" data-id="${item.id}"><i class="far fa-times"></i></a>
                </td>
            </tr>
        `).join("");
    },

    renderSummary(result) {
        const elSubtotal = document.getElementById("cart_subtotal");
        const elDiscount = document.getElementById("cart_discount");
        const elTotal = document.getElementById("cart_total");
        const elCheckoutList = document.getElementById("checkout-item-list");

        if (elSubtotal) elSubtotal.innerText = this.formatCurrency(result.subtotal || 0);
        
        if (elDiscount) {
            const val = result.discount || 0;
            elDiscount.innerText = val > 0 ? `-${this.formatCurrency(val)}` : this.formatCurrency(0);
        }
        
        if (elTotal) elTotal.innerText = this.formatCurrency(result.total || 0);

        if (elCheckoutList) {
            elCheckoutList.innerHTML = Object.values(result.items).map((item) => `
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="small">${item.quantity}x ${item.name}</span>
                    <span class="small fw-bold">${this.formatCurrency(item.price * item.quantity)}</span>
                </div>
            `).join("");
        }

        // Logic hiển thị Voucher code
        const couponCode = result.coupon_code || "";
        const couponElements = [
            { input: "checkout_coupon_code", msg: "checkout_coupon_msg" },
            { input: "cart_coupon_code", msg: "cart_coupon_msg" },
        ];

        couponElements.forEach((ids) => {
            const inputEl = document.getElementById(ids.input);
            const msgEl = document.getElementById(ids.msg);
            if (inputEl) inputEl.value = couponCode;
            if (msgEl) {
                if (couponCode) {
                    msgEl.innerText = "Đã áp dụng mã: " + couponCode;
                    msgEl.className = "text-success mt-1 fw-bold d-block";
                } else {
                    msgEl.innerText = "";
                    msgEl.className = "d-none";
                }
            }
        });
    },

    renderVoucherList(vouchers) {
        const container = document.getElementById("voucher-list-container");
        if (!container) return;
        
        if (vouchers.length === 0) {
            container.innerHTML = '<div class="text-center p-3 text-muted">Không có mã giảm giá nào.</div>';
            return;
        }
        
        container.innerHTML = vouchers.map((v) => `
            <div class="voucher-item bg-white p-3 rounded mb-3 shadow-sm border position-relative">
                <div class="row align-items-center">
                    <div class="col-3 border-end text-center">
                        <img src="${APP_URL}public/assets/img/icon/${v.is_free_ship == 1 ? "delivery.svg" : "gift.svg"}" width="35">
                    </div>
                    <div class="col-9 ps-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="selected_voucher" id="vc_${v.id}" value="${v.code}">
                            <label class="form-check-label w-100" for="vc_${v.id}">
                                <strong class="text-dark">${v.code}</strong><br>
                                <span class="small text-muted">${v.description}</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        `).join("");
    },

    renderAddressList(addresses) {
        const container = document.getElementById("address-list-container");
        if (!container) return;
        
        const html = addresses.map((addr, idx) => `
            <div class="address-item form-check p-3 border rounded mb-3 bg-white shadow-sm position-relative">
                <input class="form-check-input ms-0" type="radio" name="address_id" id="addr_${addr.id}" value="${addr.id}" ${idx === 0 ? "checked" : ""}>
                <label class="form-check-label ms-4" for="addr_${addr.id}">
                    <strong>${addr.full_name}</strong> | ${addr.phone} <br>
                    <span class="text-muted small">${addr.address_line}</span>
                </label>
                <button type="button" class="btn btn-sm btn-outline-secondary position-absolute top-0 end-0 m-3 btn-edit-address" data-id="${addr.id}">
                    <i class="far fa-pen"></i> Sửa
                </button>
            </div>
        `).join("");

        container.innerHTML = html + `
            <div class="text-start mt-3">
                <button type="button" id="btn-add-new-address" class="btn btn-link p-0 text-primary fw-bold text-decoration-none">
                    <i class="far fa-plus-circle"></i> Thêm địa chỉ mới
                </button>
            </div>`;
    },
};