<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BenefitPackage extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Kolom yang dapat diisi secara massal.
     */
    protected $fillable = [
        'package_id',
        'benefit',
    ];

    /**
     * Relasi ke model Package.
     */
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}