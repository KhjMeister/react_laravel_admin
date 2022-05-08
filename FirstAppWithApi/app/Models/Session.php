<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $table = 'sessions';

     protected $fillable = [
        'name',
        'sess_token',
        'video_link',
        'u_id',
        'total_number',
        'end_at',
        'is_started',
        'is_ended',
        'start_time',
        'start_date',
    ];

}
