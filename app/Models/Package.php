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
    protected $fillable = ['name', 'product_id', 'detail_package', 'price', 'deadline', 'worker'];

    // Relasi ke product
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Relasi ke orders
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'package_id');
    }

    // Relasi ke user (worker)
    public function worker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'worker');
    }

    public function benefits()
    {
        return $this->hasMany(BenefitPackage::class);
    }
}