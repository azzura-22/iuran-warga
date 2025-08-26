<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categori extends Model
{
    //
    protected $guarded =[];
    public function member(){
        return $this->hasMany(member::class,'categoris_id');
    }
    public function history(){
        return $this->hasMany(history::class,'categoris_id');
    }
}
