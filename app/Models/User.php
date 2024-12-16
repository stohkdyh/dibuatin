<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'name',
        'phone',
        'email',
        'password',
        'role',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) {
                $user->id = (string) Str::uuid();
            }

            if (empty($user->role)) {
                $user->role = 'customer';
            }
        });
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
