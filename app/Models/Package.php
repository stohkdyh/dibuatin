<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Package extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'product_id',
        'detail_package',
        'price',
        'working_time',
        'unit'
    ];

    public function benefitPackages()
    {
        return $this->hasMany(BenefitPackage::class, 'packages_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function orders()
    {
        return $this->hasMany(Order::class, 'package_id');
    }
}