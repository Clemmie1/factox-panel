<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SupportTicket extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'owner_id',
        'ticket_id',
        'ticket_theme',
        'ticket_category',
        'ticket_priority',
        // 0 - Открыто / 1 - Ожидании ответа / 2 - Решено / 3 - Закрыто
        'ticket_status',
    ];
}
