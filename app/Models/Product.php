<?php

namespace App\Models;

use Core\BaseModel;
use PDO;

class Product extends BaseModel
{
    protected $table = 'products';

    // Vẫn giữ lại các thuộc tính nếu ông muốn mapping dữ liệu chặt chẽ (tùy chọn)
    // Nhưng BaseModel chủ yếu làm việc với Array cho nhanh.

    /**
     * Hàm này giữ nguyên tinh túy của Thầy Hộ
     * Đổi tên thành getFilteredProducts cho đỡ nhầm với hàm all() của cha
     */
    public function getFilteredProducts($keyword = null, $filters = [], $limit = null, $offset = null)
    {
        // 1. SELECT rõ ràng: Lấy tất cả cột của bảng products
        //    và lấy thêm giá thấp nhất từ bảng product_variants
        $query = "SELECT products.*, 
                         MIN(product_variants.price) as price, 
                         MIN(product_variants.sale_price) as sale_price 
                  FROM products 
                  INNER JOIN product_variants ON products.id = product_variants.product_id
                  WHERE products.status = 1";

        $params = [];

        // 2. Tìm kiếm từ khóa (Lọc theo tên hoặc mô tả trong bảng products)
        if (!empty($keyword)) {
            $query .= " AND (products.name LIKE :keyword OR products.description LIKE :keyword)";
            $params[':keyword'] = '%' . $keyword . '%';
        }

        // 3. Lọc theo danh mục (Cột category_id nằm trong bảng products)
        if (!empty($filters['category_id'])) {
            $query .= " AND products.category_id = :category_id";
            $params[':category_id'] = $filters['category_id'];
        }

        // 4. Lọc theo khoảng giá (Cột price nằm trong bảng product_variants)
        //    Logic: Nếu có giá sale thì lấy giá sale, không thì lấy giá gốc để so sánh
        if (!empty($filters['min_price']) && $filters['min_price'] > 0) {
            $query .= " AND (COALESCE(product_variants.sale_price, product_variants.price) >= :min_price)";
            $params[':min_price'] = $filters['min_price'];
        }

        if (!empty($filters['max_price']) && $filters['max_price'] > 0) {
            $query .= " AND (COALESCE(product_variants.sale_price, product_variants.price) <= :max_price)";
            $params[':max_price'] = $filters['max_price'];
        }

        // 5. GROUP BY: Gom nhóm theo ID sản phẩm để tránh bị lặp lại do bảng variants có nhiều dòng
        $query .= " GROUP BY products.id";

        // 6. Sắp xếp mặc định: Sản phẩm mới nhất lên đầu
        $query .= " ORDER BY products.created_at DESC";

        // 7. Phân trang (LIMIT và OFFSET)
        if ($limit) {
            $query .= " LIMIT :limit";
            if ($offset) {
                $query .= " OFFSET :offset";
            }
        }

        // Chuẩn bị và thực thi câu lệnh
        $stmt = $this->conn->prepare($query);

        // Gán giá trị vào các tham số (:keyword, :min_price...)
        foreach ($params as $key => $val) {
            $stmt->bindValue($key, $val);
        }

        // Gán tham số cho phân trang (bắt buộc kiểu số nguyên INT)
        if ($limit) {
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            if ($offset) {
                $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            }
        }

        $stmt->execute();

        // Trả về kết quả dưới dạng mảng kết hợp
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByBrand($brand_id)
    {
        // SỬA LỖI ONLY_FULL_GROUP_BY:
        // Thay vì lấy v.price khơi khơi, ta dùng MIN(v.price) as price
        // Ý nghĩa: Nếu 1 sản phẩm có nhiều giá, lấy cái giá rẻ nhất để hiển thị ra ngoài.

        $query = "SELECT p.*, MIN(v.price) as price, MIN(v.sale_price) as sale_price 
                  FROM " . $this->table . " p
                  INNER JOIN product_variants v ON p.id = v.product_id
                  WHERE p.brand_id = :brand_id AND p.status = 1 
                  GROUP BY p.id 
                  ORDER BY p.id DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':brand_id', $brand_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProductsByCategory($category_id, $limit = 8)
    {
        // $limit = 8 ở đây chỉ là số dự phòng nếu bên ngoài quên truyền vào
        // Logic chính vẫn nằm ở Controller
        $query = "SELECT p.*, MIN(v.price) as price, MIN(v.sale_price) as sale_price 
                  FROM " . $this->table . " p
                  INNER JOIN product_variants v ON p.id = v.product_id
                  WHERE p.category_id = :category_id AND p.status = 1 
                  GROUP BY p.id 
                  ORDER BY p.id DESC
                  LIMIT :limit";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // THÊM MỚI 1: Lấy sản phẩm GIẢM GIÁ (Dùng bảng settings)
    public function getOnSaleProducts($limit = 3)
    {
        $query = "SELECT p.*, MIN(v.price) as price, MIN(v.sale_price) as sale_price 
                  FROM " . $this->table . " p
                  INNER JOIN product_variants v ON p.id = v.product_id
                  WHERE v.sale_price IS NOT NULL 
                  AND v.sale_price < v.price 
                  AND p.status = 1
                  GROUP BY p.id 
                  LIMIT :limit";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // THÊM MỚI 2: Lấy sản phẩm BÁN CHẠY (Dùng cột sold_count mới thêm vào DB)
    public function getBestSellerProducts($limit = 3)
    {
        $query = "SELECT p.*, MIN(v.price) as price, MIN(v.sale_price) as sale_price 
                  FROM " . $this->table . " p
                  INNER JOIN product_variants v ON p.id = v.product_id
                  WHERE p.status = 1
                  GROUP BY p.id 
                  ORDER BY p.sold_count DESC, p.id DESC 
                  LIMIT :limit";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // THÊM MỚI 3: Lấy sản phẩm ĐÁNH GIÁ CAO
    public function getTopRatedProducts($limit = 3)
    {
        // Giả sử bảng product_reviews đã có dữ liệu hoặc dùng logic view_count tạm
        $query = "SELECT p.*, MIN(v.price) as price, MIN(v.sale_price) as sale_price, 
                  IFNULL(AVG(r.rating), 0) as avg_rating
                  FROM " . $this->table . " p
                  INNER JOIN product_variants v ON p.id = v.product_id
                  LEFT JOIN product_reviews r ON p.id = r.product_id AND r.status = 1
                  WHERE p.status = 1
                  GROUP BY p.id 
                  ORDER BY avg_rating DESC, p.id DESC 
                  LIMIT :limit";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // Hàm lấy chi tiết sản phẩm bằng SLUG (Thay cho ID)
    public function getProductDetailBySlug($slug)
    {
        $query = "SELECT p.*, 
                         b.name as brand_name, 
                         c.name as category_name,
                         MIN(v.price) as price, 
                         MIN(v.sale_price) as sale_price
                  FROM " . $this->table . " p
                  LEFT JOIN brands b ON p.brand_id = b.id
                  LEFT JOIN categories c ON p.category_id = c.id
                  INNER JOIN product_variants v ON p.id = v.product_id
                  WHERE p.slug = :slug  -- Đổi điều kiện tìm theo slug
                  GROUP BY p.id
                  LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':slug', $slug); // Gán tham số slug
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function getProductGallery($product_id)
    {
        // Query bảng product_images để lấy ảnh
        $query = "SELECT * FROM product_images WHERE product_id = :product_id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':product_id', $product_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findWithPrice($id)
    {
        $query = "SELECT p.*, 
                     MIN(v.price) as price, 
                     MIN(v.sale_price) as sale_price 
              FROM products p
              INNER JOIN product_variants v ON p.id = v.product_id
              WHERE p.id = :id AND p.status = 1
              GROUP BY p.id 
              LIMIT 1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindValue(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    // Lấy những sản phẩm theo lượt xem
    public function getTrendingProducts($limit = 8)
    {
        $query = "SELECT p.*, 
                     MIN(v.price) as price, 
                     MIN(v.sale_price) as sale_price 
              FROM products p 
              INNER JOIN product_variants v ON p.id = v.product_id 
              WHERE p.status = 1 
              GROUP BY p.id 
              ORDER BY p.view_count DESC, p.sold_count DESC 
              LIMIT $limit"; // Fix tên cột tại đây

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
