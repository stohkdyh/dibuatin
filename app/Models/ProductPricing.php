<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPricing extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_type_id',
        'attribute_name',
        'min_value',
        'max_value',
        'difficulty_level',
        'base_price',
    ];

    public function productType()
    {
        return $this->belongsTo(TypeProduct::class, 'product_type_id');
    }

    public function attribute()
    {
        return $this->belongsTo(ProdukAtribute::class, 'attribute_name', 'id');
    }
}