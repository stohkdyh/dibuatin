<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::insert([
            [
                'name' => 'Paket Tahun Baru',
                'product_id' => 1,
                'detail_package' => 'Ini adalah paket dengan benefit paling gokil di awal tahun baru ini.',
                'price' => 105000,
                'working_time' => 2,
                'unit' => 'days',
                'created_at' => '2024-12-17 23:28:01',
                'updated_at' => '2024-12-17 23:28:01',
            ],
            [
                'name' => 'Paket A',
                'product_id' => 2,
                'detail_package' => 'Paket A merupakan paket dengan benefit yang bisa anda pertimbangkan.',
                'price' => 34000,
                'working_time' => 4,
                'unit' => 'hours',
                'created_at' => '2024-12-17 23:31:42',
                'updated_at' => '2024-12-17 23:31:42',
            ],
            [
                'name' => 'Paket Poster Asik',
                'product_id' => 2,
                'detail_package' => 'Kamu ingin memesan poster dengan revisi boleh hinggal 10x ? Paket Poster Asik pilihannya.',
                'price' => 55000,
                'working_time' => 5,
                'unit' => 'hours',
                'created_at' => '2024-12-17 23:34:22',
                'updated_at' => '2024-12-17 23:34:22',
            ],
        ]);
    }
}