<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObjectStorage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'status',
        'bucket_name',
        'bucket_id',
        'storageTier',
        'automatic_level_detection',
        'issuing_object_events',
        'object_version_control',
        'expires',
    ];
}
