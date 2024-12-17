<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdukAtribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_type_id',
        'name',
        'unit',
    ];

    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class, 'product_type_id');
    }

    public function productPricings()
    {
        return $this->hasMany(ProductPricing::class, 'attribute_name', 'id');
    }
}