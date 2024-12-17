<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'package_id',
        'request',
        'orientation',
        'status',
        'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'order_id');
    }

    public function project()
    {
        return $this->hasOne(Project::class, 'order_id');
    }
}