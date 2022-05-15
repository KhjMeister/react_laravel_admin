<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session_contact extends Model
{
    use HasFactory;
    protected $table = "sesscont";

    protected $fillable = [
        'c_id',
        's_id',
        'sms_status',
        'token',
        'ostad_flag'
    ];

    // public function contacts()
    // {
    //     return $this->belongsTo(Contacts::class, 'c_id');
    // }
}
