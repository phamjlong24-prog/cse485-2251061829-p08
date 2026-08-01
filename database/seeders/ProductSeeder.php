<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $banPhim = Category::where('name', 'Ban phim')->first()->id;
        $chuot   = Category::where('name', 'Chuot')->first()->id;
        $manHinh = Category::where('name', 'Man hinh')->first()->id;

        // 8 SKU CORE — thay đúng dữ liệu CANONICAL-DATA nếu lớp bạn có bảng riêng
        $core = [
            ['category_id' => $banPhim, 'sku' => 'BP-001', 'name' => 'Ban phim co A', 'price' => 500000, 'qty' => 10],
            ['category_id' => $banPhim, 'sku' => 'BP-002', 'name' => 'Ban phim co B', 'price' => 750000, 'qty' => 8],
            ['category_id' => $banPhim, 'sku' => 'BP-003', 'name' => 'Ban phim mem C', 'price' => 300000, 'qty' => 15],
            ['category_id' => $chuot,   'sku' => 'CH-001', 'name' => 'Chuot khong day A', 'price' => 250000, 'qty' => 20],
            ['category_id' => $chuot,   'sku' => 'CH-002', 'name' => 'Chuot gaming B', 'price' => 600000, 'qty' => 12],
            ['category_id' => $chuot,   'sku' => 'CH-003', 'name' => 'Chuot van phong C', 'price' => 150000, 'qty' => 25],
            ['category_id' => $manHinh, 'sku' => 'MH-001', 'name' => 'Man hinh 24 inch', 'price' => 3200000, 'qty' => 5],
            ['category_id' => $manHinh, 'sku' => 'MH-002', 'name' => 'Man hinh 27 inch', 'price' => 4500000, 'qty' => 4],
        ];

        foreach ($core as $p) {
            Product::create($p);
        }

        // 20 sản phẩm Faker
        $categoryIds = [$banPhim, $chuot, $manHinh];

        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'sku'         => 'FK-' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'name'        => fake()->words(3, true),
                'price'       => fake()->numberBetween(100000, 9000000),
                'qty'         => fake()->numberBetween(1, 15),
                'description' => fake()->sentence(),
            ]);
        }
    }
}