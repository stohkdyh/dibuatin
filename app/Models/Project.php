<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['order_id', 'worker', 'review', 'status'];

    // Relasi ke order
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Relasi ke worker
    public function worker(): BelongsTo
    {
        return $this->belongsTo(User::class, 'worker');
    }

    // Relasi ke files
    public function files(): HasMany
    {
        return $this->hasMany(File::class, 'project_id');
    }
}