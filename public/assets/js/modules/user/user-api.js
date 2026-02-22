const UserAPI = {
    async fetchAddresses() {
        const res = await fetch(`${APP_URL}api/user/addresses`);
        return await res.json();
    },
    async saveAddress(data) {
        const res = await fetch(`${APP_URL}api/user/save`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(data),
        });
        return await res.json();
    }
};