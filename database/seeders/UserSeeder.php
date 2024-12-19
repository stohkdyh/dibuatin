<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user dengan role admin
        User::create([
            'id' => Str::uuid(),
            'name' => 'Administrator',
            'phone' => '081234567890',
            'email' => 'admin@dibuatin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        // Buat 10 user dengan role customer
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'id' => Str::uuid(),
                'name' => "Customer $i",
                'phone' => '081234567' . str_pad($i + 891, 3, '0', STR_PAD_LEFT),
                'email' => "customer$i@example.com",
                'password' => Hash::make('customer'),
                'role' => 'customer',
            ]);
        }

        // Buat 10 user dengan role worker
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'id' => Str::uuid(),
                'name' => "Worker $i",
                'phone' => '081234567' . str_pad($i + 900, 3, '0', STR_PAD_LEFT),
                'email' => "worker$i@example.com",
                'password' => Hash::make('worker'),
                'role' => 'worker',
                'is_active' => $i % 2 === 0 ? 1 : 0,
            ]);
        }
    }
}