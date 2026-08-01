<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Ban phim', 'description' => 'Danh muc ban phim co / mem'],
            ['name' => 'Chuot',    'description' => 'Danh muc chuot may tinh'],
            ['name' => 'Man hinh', 'description' => 'Danh muc man hinh'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}