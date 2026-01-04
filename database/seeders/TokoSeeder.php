<?php

namespace Database\Seeders;

use App\Models\Toko;
use Illuminate\Database\Seeder;

class TokoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tokos = [
            [
                'nama' => 'Toko Pusat Jakarta',
                'alamat' => 'Jl. Sudirman No. 123, Jakarta Pusat',
                'telepon' => '021-5551234',
                'email' => 'pusat@toko.com',
                'keterangan' => 'Toko utama dan pusat distribusi',
                'aktif' => true,
            ],
            [
                'nama' => 'Toko Cabang Bandung',
                'alamat' => 'Jl. Asia Afrika No. 45, Bandung',
                'telepon' => '022-4201234',
                'email' => 'bandung@toko.com',
                'keterangan' => 'Cabang wilayah Jawa Barat',
                'aktif' => true,
            ],
            [
                'nama' => 'Toko Cabang Surabaya',
                'alamat' => 'Jl. Tunjungan No. 78, Surabaya',
                'telepon' => '031-5321234',
                'email' => 'surabaya@toko.com',
                'keterangan' => 'Cabang wilayah Jawa Timur',
                'aktif' => true,
            ],
            [
                'nama' => 'Toko Cabang Yogyakarta',
                'alamat' => 'Jl. Malioboro No. 56, Yogyakarta',
                'telepon' => '0274-561234',
                'email' => 'jogja@toko.com',
                'keterangan' => 'Cabang wilayah DIY',
                'aktif' => true,
            ],
            [
                'nama' => 'Toko Cabang Semarang (Nonaktif)',
                'alamat' => 'Jl. Pemuda No. 90, Semarang',
                'telepon' => '024-3541234',
                'email' => 'semarang@toko.com',
                'keterangan' => 'Cabang sedang renovasi',
                'aktif' => false,
            ],
        ];

        foreach ($tokos as $toko) {
            Toko::create($toko);
        }
    }
}
