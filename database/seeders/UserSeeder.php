<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'password' => Hash::make('admin'), // Password untuk admin
            'role' => 'admin',
        ]);

        // Buat 2 user dengan role customer
        User::create([
            'id' => Str::uuid(),
            'name' => 'Alpram',
            'phone' => '081234567891',
            'email' => 'alpram.doe@example.com',
            'password' => Hash::make('customer'), // Password untuk customer
            'role' => 'customer',
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => 'Royyan',
            'phone' => '081234567892',
            'email' => 'royyan.1@example.com',
            'password' => Hash::make('customer'), // Password untuk customer
            'role' => 'customer',
        ]);

        // Buat 2 user dengan role worker
        User::create([
            'id' => Str::uuid(),
            'name' => 'Bagas',
            'phone' => '081234567893',
            'email' => 'worker.one@example.com',
            'password' => Hash::make('worker'), // Password untuk worker
            'role' => 'worker',
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => 'Adit',
            'phone' => '081234567894',
            'email' => 'pogung.adit@example.com',
            'password' => Hash::make('worker'), // Password untuk worker
            'role' => 'worker',
        ]);
    }
}