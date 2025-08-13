<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    //
    protected $guarded=[];
    public function User(){
        return $this->belongsTo(User::class,'users_id');
    }
    // public function categori(){
    //     return $this-> belongsTo(categori::class,'categoris_id');
    // }
}
