<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Unit;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $electronics = Category::where('name', 'Electronics')->first()->id;
        $fashion = Category::where('name', 'Fashion')->first()->id;
        $home = Category::where('name', 'Home & Kitchen')->first()->id;

        $pcs = Unit::where('short_name', 'Pcs')->first()->id;

        $products = [
            [
                'name' => 'Apex Smartphone X1',
                'description' => 'The ultimate flagship smartphone with edge-to-edge display and pro camera system.',
                'category_id' => $electronics,
                'unit_id' => $pcs,
                'price' => 79999,
                'stock' => 50,
                'image' => 'products/smartphone.png',
            ],
            [
                'name' => 'Aether Pro Headphones',
                'description' => 'Noise-cancelling wireless headphones with premium leather finish and studio-grade sound.',
                'category_id' => $electronics,
                'unit_id' => $pcs,
                'price' => 24999,
                'stock' => 120,
                'image' => 'products/headphones.png',
            ],
            [
                'name' => 'Zenith Smartwatch V2',
                'description' => 'Elegant smartwatch with advanced health tracking and crystal clear always-on display.',
                'category_id' => $electronics,
                'unit_id' => $pcs,
                'price' => 18999,
                'stock' => 85,
                'image' => 'products/smartwatch.png',
            ],
            [
                'name' => 'Lumix Studio DSLR',
                'description' => 'Professional DSLR camera for high-res photography and 4K cinematography.',
                'category_id' => $electronics,
                'unit_id' => $pcs,
                'price' => 125000,
                'stock' => 15,
                'image' => 'products/camera.png',
            ],
            [
                'name' => 'Nimbus Ultrabook 14',
                'description' => 'Ultra-thin silver laptop with lightning-fast performance for modern professionals.',
                'category_id' => $electronics,
                'unit_id' => $pcs,
                'price' => 95000,
                'stock' => 30,
                'image' => 'products/laptop.png',
            ],
            [
                'name' => 'Atelier Blanc T-Shirt',
                'description' => 'Premium 100% organic cotton white t-shirt, minimalist design and perfect fit.',
                'category_id' => $fashion,
                'unit_id' => $pcs,
                'price' => 1999,
                'stock' => 300,
                'image' => 'products/tshirt.png',
            ],
            [
                'name' => 'Barista Pro Coffee Maker',
                'description' => 'Semi-automatic stainless steel espresso machine for the perfect home barista experience.',
                'category_id' => $home,
                'unit_id' => $pcs,
                'price' => 54999,
                'stock' => 20,
                'image' => 'products/coffeemaker.png',
            ],
            [
                'name' => 'Heritage Leather Wallet',
                'description' => 'Handcrafted brown leather wallet with multiple card slots and classic aesthetics.',
                'category_id' => $fashion,
                'unit_id' => $pcs,
                'price' => 3499,
                'stock' => 150,
                'image' => 'products/wallet.png',
            ],
            [
                'name' => 'Velocity Run Shoes',
                'description' => 'High-performance running shoes with superior cushioning and vibrant blue design.',
                'category_id' => $fashion,
                'unit_id' => $pcs,
                'price' => 8999,
                'stock' => 75,
                'image' => 'products/shoes.png',
            ],
            [
                'name' => 'Oceanic Polarized Shades',
                'description' => 'Stylish oversized sunglasses with polarized lenses for ultimate eye protection.',
                'category_id' => $fashion,
                'unit_id' => $pcs,
                'price' => 4500,
                'stock' => 110,
                'image' => 'products/sunglasses.png',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
