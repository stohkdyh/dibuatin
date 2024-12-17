<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'type_id',
        'status',
        'value_1',
        'value_2',
        'dificulty_level',
        'price',
        'deadline',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class, 'type_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class);
    }
}