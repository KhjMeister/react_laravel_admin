<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    
    protected $fillable = [
        'name',   
        'u_id'     
    ];

    // protected $hidden = [
    //     'status',  
    // ];

    public function contacts()
    {
        return $this->hasMany(Contacts::class,'ca_id');
    }
   
}
