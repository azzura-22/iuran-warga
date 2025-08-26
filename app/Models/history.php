<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    //
    protected $guarded = [];

    public function User(){
        return $this->belongsTo(User::class,'users_id');
    }
    public function Member(){
        return $this->belongsTo(member::class,'members_id');
    }
    public function Categori(){
        return $this->belongsTo(categori::class,'categoris_id');
    }
}
