<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'order_id',
        'user_id',
        'grandtotal',
        'payment_method',
        'payment_status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaction) {
            // Pastikan user_id terisi
            if (empty($transaction->user_id)) {
                $order = Order::find($transaction->order_id);
                if ($order) {
                    $transaction->user_id = $order->user_id;
                } else {
                    throw new \Exception('User ID is required and could not be resolved.');
                }
            }

            // Pastikan grandtotal terisi
            if (empty($transaction->grandtotal)) {
                $order = Order::find($transaction->order_id);
                if ($order) {
                    $transaction->grandtotal = $order->price;
                } else {
                    $transaction->grandtotal = 0;
                }
            }

            // Generate UUID untuk ID jika kosong
            if (empty($transaction->id)) {
                $transaction->id = (string) Str::uuid();
            }

        });
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}