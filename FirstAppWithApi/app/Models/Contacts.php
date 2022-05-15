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

    public function category()
    {
        return $this->belongsTo(Category::class, 'ca_id');
    }

    public function sesscunt()
    {
        return $this->belongsTo(Session_contact::class, 'ca_id');
    }

    // public function session()
    // {
    //     return $this->belongsToMany(Session::class,'Session_contact','c_id', 's_id');
    // }
}
