<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class taskk extends Model
{
    //nama table
    protected $table="task";

    //nama kolomnya
    protected $fillable=["nama",'status',"tanggal","prioritas","id_list"];

//     public function list(){
//         return $this->belongsTo(listts::class,'id_list','id');
//     }

//     public function show($id)
// {
//     $data = taskk::findOrFail($id);
//     return view('list.show', compact('data'));
// }
}
