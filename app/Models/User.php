<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'name',
        'email',
        'isEnabled',
        'password',
        'role',
        'confirmationToken',
        'confirmedAt',
        'resetPasswordToken',
        'resetPasswordSentAt',
    ];

    protected $casts = [
        'isEnabled' => 'boolean',
        'confirmedAt' => 'datetime',
        'resetPasswordSentAt' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->id = Str::uuid()->toString();
        });
    }
}
