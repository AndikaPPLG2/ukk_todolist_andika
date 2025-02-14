<?php

namespace App\Http\Controllers;

use App\Models\taskk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class taskController extends Controller
{
    // tampilin task
    public function task($id)
    {
        $data = taskk::where("id_list",$id)->get();

        return view("task", ["data_task" => $data,"id_list" => $id]);
    }

    // ngambil data
    public function edit($id){
        $data = taskk::where('id', $id)->first();
        return view('edit_task',["data_task" => $data]);
    }


     // Create Task
     public function store(Request $request)
     {
         taskk::create([
             'nama' => $request->nama,
             'status' => $request->status,
             'prioritas' => $request->prioritas,
             'tanggal' => $request->tanggal,
             'id_list' => $request->id_list,
         ]);
 
         return redirect()->back();
     }

   // update task
   public function update($id,Request $request){
    $data = taskk::where('id', $id)->first();
    $data->update([
        'id_list' => $request->id_list,
        'nama' => $request->nama,
        'status' => $request->status,
        'prioritas' => $request->prioritas,
        'tanggal' => $request->tanggal,
        
    ]);
    return redirect("task/$data->id_list");
}

    public function destroy($id)
    {
        $task = taskk::findOrFail($id);
        $task->delete();

        return redirect()->back();
    }

    
}
