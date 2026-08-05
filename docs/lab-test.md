# Lab Test Cases - Phiếu 09

| STT | Phương thức | URL | Mô tả | Expected Status |
|:---:|:---|:---|:---|:---:|
| 1 | POST | `/lab/products` | Tạo sản phẩm hợp lệ | 201 |
| 2 | POST | `/lab/products` | Tạo sản phẩm thiếu `category_id` | 422 |
| 3 | GET | `/lab/products` | Lấy danh sách sản phẩm | 200 |
| 4 | PUT | `/lab/products/{id}` | Cập nhật giá sản phẩm | 200 |
| 5 | DELETE | `/lab/products/{id}` | Xóa sản phẩm | 200 |
| 6 | DELETE | `/lab/categories/{id}` | Xóa danh mục còn sản phẩm | 422 |
| 7 | DELETE | `/lab/categories/{id}` | Xóa danh mục trống | 200 |
