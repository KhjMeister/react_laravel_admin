<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $table = "contacts";
    
    protected $fillable = [
        'username',
        'phone',
        'semat',
        'u_id',
        'ca_id',

    ];

    protected $hidden = [
        'status',
    ];
}
