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
    protected $fillable = [
        'order_id',
        'user_id',
        'review',
        'status_project'
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($project) {
            if ($project->isDirty('status_project')) {
                $newStatus = $project->status_project;
                $order = $project->order;
                if ($order) {
                    if ($newStatus === 'completed') {
                        $order->update(['status' => "completed"]);
                    } elseif (in_array($newStatus, ['review', 'ongoing'])) {
                        $order->update(['status' => 'in progress']);
                    }
                }
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