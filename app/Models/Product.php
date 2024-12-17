<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name'];


    // Menangani nama duplikat
    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $originalName = $product->name;
            $existingProduct = self::where('name', $originalName)->first();

            if ($existingProduct) {
                $counter = 2;
                $newName = $originalName . ' ' . $counter;

                // Cek apakah nama baru sudah ada, dan tambahkan angka berturut-turut jika perlu
                while (self::where('name', $newName)->exists()) {
                    $counter++;
                    $newName = $originalName . ' ' . $counter;
                }

                $product->name = $newName;
            }
        });
    }

    // Relasi ke packages
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class, 'product_id');
    }
}