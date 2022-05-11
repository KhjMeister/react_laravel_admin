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
        'end_at',
        'start_time',
        'start_date',
        'jalase_type',
        'session_type',
        'total_number',
        'is_started',
        'is_ended',
        'end_at',
        
    ];

}
