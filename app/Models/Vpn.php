<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vpn extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'status',
        'vpn_location',
        'vpn_name',
        'vpn_id',
        'vpn_access_id',
        'vpn_access_url',
        'expires',
    ];
}
