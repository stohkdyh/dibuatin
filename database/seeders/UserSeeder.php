<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Buat user dengan role admin
        User::create([
            'id' => Str::uuid(),
            'name' => 'Administrator',
            'phone' => '081234567890',
            'email' => 'admin@dibuatin.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => "bagas",
            'phone' => '081232324545',
            'email' => "human2erori@gmail.com",
            'password' => Hash::make('customer'),
            'role' => 'customer',
        ]);

        User::create([
            'id' => Str::uuid(),
            'name' => "Lian dev",
            'phone' => '083123456788',
            'email' => "indonesia4gaming@gmail.com",
            'password' => Hash::make('worker'),
            'role' => 'worker',
            'is_active' => 1,
        ]);

        // Buat 10 user dengan role customer
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'id' => Str::uuid(),
                'name' => $faker->name,
                'phone' => '08' . substr($faker->unique()->numerify('##########'), 2),,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('customer'),
                'role' => 'customer',
            ]);
        }

        // Buat 10 user dengan role worker
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'id' => Str::uuid(),
                'name' => $faker->name,
                'phone' => '08' . substr($faker->unique()->numerify('##########'), 2),,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('worker'),
                'role' => 'worker',
                'is_active' => $i % 2 === 0 ? 1 : 0,
            ]);
        }
    }
}