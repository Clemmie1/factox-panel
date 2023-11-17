<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmtpUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'smtp_name',
        'smtp_user_name',
        'smtp_user_password',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];
}
