<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class listts extends Model
{
    //nama table
    protected $table="list";

    //nama kolomnya
    protected $fillable=[ "nama"];

    public function task(){
        return $this->hasMany(taskk::class,'id_list','id');
    }
}
