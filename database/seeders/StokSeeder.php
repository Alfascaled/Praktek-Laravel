<?php

namespace Database\Seeders;

use App\Models\Stok;
use App\Models\Product;
use App\Models\Toko;
use Illuminate\Database\Seeder;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all products and tokos
        $products = Product::all();
        $tokos = Toko::where('aktif', true)->get();

        if ($products->isEmpty() || $tokos->isEmpty()) {
            $this->command->info('Tidak ada produk atau toko. Jalankan ProductSeeder dan TokoSeeder terlebih dahulu.');
            return;
        }

        // Create stock for each product in each active toko
        foreach ($products as $product) {
            foreach ($tokos as $toko) {
                Stok::create([
                    'product_id' => $product->id,
                    'toko_id' => $toko->id,
                    'jumlah' => rand(5, 100),
                    'stok_minimum' => rand(5, 15),
                    'keterangan' => 'Stok awal untuk ' . $product->name . ' di ' . $toko->nama,
                ]);
            }
        }

        // Create some low stock examples
        $firstProduct = $products->first();
        $firstToko = $tokos->first();
        
        if ($firstProduct && $firstToko) {
            $stok = Stok::where('product_id', $firstProduct->id)
                ->where('toko_id', $firstToko->id)
                ->first();
            
            if ($stok) {
                $stok->update([
                    'jumlah' => 3,
                    'stok_minimum' => 10,
                    'keterangan' => 'Contoh stok rendah - perlu restok segera!',
                ]);
            }
        }
    }
}
