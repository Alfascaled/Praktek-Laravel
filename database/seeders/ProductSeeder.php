<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Laptop ASUS ROG',
                'price' => 15000000,
                'description' => 'Laptop gaming performa tinggi dengan RTX 4060',
            ],
            [
                'name' => 'iPhone 15 Pro',
                'price' => 19500000,
                'description' => 'Smartphone Apple terbaru dengan chip A17 Pro',
            ],
            [
                'name' => 'Samsung Galaxy S24 Ultra',
                'price' => 18000000,
                'description' => 'Flagship Samsung dengan S-Pen dan kamera 200MP',
            ],
            [
                'name' => 'Sony WH-1000XM5',
                'price' => 4500000,
                'description' => 'Headphone wireless dengan noise cancelling terbaik',
            ],
            [
                'name' => 'iPad Pro M2 12.9"',
                'price' => 17000000,
                'description' => 'Tablet Apple dengan chip M2 dan layar Liquid Retina XDR',
            ],
            [
                'name' => 'Nintendo Switch OLED',
                'price' => 5500000,
                'description' => 'Konsol gaming portable dengan layar OLED 7 inci',
            ],
            [
                'name' => 'Mechanical Keyboard Keychron K8',
                'price' => 1500000,
                'description' => 'Keyboard mechanical wireless dengan hot-swappable switch',
            ],
            [
                'name' => 'Logitech MX Master 3S',
                'price' => 1600000,
                'description' => 'Mouse wireless premium untuk produktivitas',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
