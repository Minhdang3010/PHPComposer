/**
 * TẦNG API: Chuyên gọi request lên Server
 * Lưu ý: Đảm bảo biến APP_URL đã được khai báo ở Header/Footer (VD: const APP_URL = "http://localhost/PHPComposer/";)
 */
const ProductAPI = {
    // 1. Lấy tất cả sản phẩm
    async fetchAll(params = {}) {
        try {
            // Chuyển object params thành chuỗi query string
            // VD: brand_id=1&keyword=abc
            const queryString = new URLSearchParams(params).toString();
            
            const res = await fetch(`${APP_URL}api/product?${queryString}`); 
            if (!res.ok) throw new Error("Lỗi khi tải danh sách sản phẩm");
            return await res.json();
        } catch (error) {
            console.error(error);
            return [];
        }
    },

    // 2. Lấy sản phẩm theo danh mục
    async fetchByCategory(categoryId) {
        try {
            const res = await fetch(`${APP_URL}api/product/category/${categoryId}`);
            if (!res.ok) throw new Error("Lỗi khi tải sản phẩm theo danh mục");
            return await res.json();
        } catch (error) {
            console.error(error);
            return [];
        }
    },

    // 3. Lấy sản phẩm bán chạy (Hot)
    async fetchHot() {
        try {
            const res = await fetch(`${APP_URL}api/product/hot`);
            if (!res.ok) throw new Error("Lỗi khi tải sản phẩm HOT");
            return await res.json();
        } catch (error) {
            console.error(error);
            return [];
        }
    },
    // 4. Lấy SP Giảm giá
    async fetchOnSale() {
        // Gọi API onsale vừa viết
        const res = await fetch(`${APP_URL}api/product/onsale`);
        return await res.json();
    },
    // 5. Lấy SP Đánh giá cao
    async fetchTopRated() {
        // Gọi API toprated vừa viết
        const res = await fetch(`${APP_URL}api/product/toprated`);
        return await res.json();
    },

    // 6. Lấy chi tiết sản phẩm (Dùng cho Quick View)
    async fetchDetail(id) {
        try {
            const res = await fetch(`${APP_URL}api/product/show/${id}`);
            if (!res.ok) throw new Error("Lỗi khi tải chi tiết sản phẩm");
            return await res.json();
        } catch (error) {
            console.error(error);
            return null;
        }
    }
};