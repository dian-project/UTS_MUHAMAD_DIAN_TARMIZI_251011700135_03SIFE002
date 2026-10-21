<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FurnitureSeeder extends Seeder
{
    public function run(): void
    {
        $furnitures = [
            [
                'name' => 'Sofa Minimalis',
                'category' => 'Sofa',
                'material' => 'Kain dan Kayu',
                'price' => 2500000,
                'dimensions' => '200 x 85 x 80 cm',
                'image' => 'sofa-minimalis.jpg',
            ],
            [
                'name' => 'Meja Makan Kayu',
                'category' => 'Meja',
                'material' => 'Kayu Jati',
                'price' => 1800000,
                'dimensions' => '120 x 75 x 75 cm',
                'image' => 'meja-makan.jpg',
            ],
            [
                'name' => 'Kursi Minimalis',
                'category' => 'Kursi',
                'material' => 'Kayu dan Busa',
                'price' => 450000,
                'dimensions' => '45 x 50 x 85 cm',
                'image' => 'kursi-minimalis.jpg',
            ],
            [
                'name' => 'Lemari Pakaian',
                'category' => 'Lemari',
                'material' => 'Kayu Olahan',
                'price' => 2200000,
                'dimensions' => '120 x 50 x 200 cm',
                'image' => 'lemari-pakaian.jpg',
            ],
            [
                'name' => 'Meja Kerja',
                'category' => 'Meja',
                'material' => 'Kayu dan Besi',
                'price' => 950000,
                'dimensions' => '120 x 60 x 75 cm',
                'image' => 'meja-kerja.jpg',
            ],
            [
                'name' => 'Rak Buku',
                'category' => 'Rak',
                'material' => 'Kayu Olahan',
                'price' => 750000,
                'dimensions' => '80 x 30 x 150 cm',
                'image' => 'rak-buku.jpg',
            ],
            [
                'name' => 'Tempat Tidur',
                'category' => 'Tempat Tidur',
                'material' => 'Kayu Solid',
                'price' => 2800000,
                'dimensions' => '160 x 200 cm',
                'image' => 'tempat-tidur.jpg',
            ],
            [
                'name' => 'Meja Tamu',
                'category' => 'Meja',
                'material' => 'Kayu dan Kaca',
                'price' => 650000,
                'dimensions' => '100 x 50 x 45 cm',
                'image' => 'meja-tamu.jpg',
            ],
            [
                'name' => 'Kabinet TV',
                'category' => 'Kabinet',
                'material' => 'Kayu Olahan',
                'price' => 1200000,
                'dimensions' => '140 x 40 x 50 cm',
                'image' => 'kabinet-tv.jpg',
            ],
            [
                'name' => 'Meja Rias',
                'category' => 'Meja Rias',
                'material' => 'Kayu Olahan',
                'price' => 1100000,
                'dimensions' => '100 x 40 x 140 cm',
                'image' => 'meja-rias.jpg',
            ],
        ];

        foreach ($furnitures as $furniture) {
            DB::table('furnitures')->updateOrInsert(
                ['name' => $furniture['name']],
                array_merge($furniture, [
                    'updated_at' => now(),
                    'created_at' => now(),
                ])
            );
        }
    }
}
