<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'description' => 'Gadgets, devices and hardware'],
            ['name' => 'Fashion', 'description' => 'Clothing, shoes and accessories'],
            ['name' => 'Home & Kitchen', 'description' => 'Furniture, decor and appliances'],
            ['name' => 'Sports & Outdoors', 'description' => 'Fitnes gear and outdoor equipment'],
            ['name' => 'Books', 'description' => 'Physical books and e-books'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
