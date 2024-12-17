<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TypeProduct extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'id',
        'name',
        'description',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function productAttributes()
    {
        return $this->hasMany(ProdukAtribute::class, 'product_type_id');
    }

    public function pricing()
    {
        return $this->hasMany(ProductPricing::class, 'product_type_id');
    }
}