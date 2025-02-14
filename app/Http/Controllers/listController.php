<?php

namespace App\Http\Controllers;

use App\Models\listts;
use App\Models\taskk;
use Illuminate\Http\Request;


class listController extends Controller{
        public function index(){
         $data = listts::get();

         return view("list",["data_list" => $data]);
        }

        public function store(){
                $data = request()->all();
                listts::create([
                        "nama" => $data["nama"],
                        
                ]);
                return redirect()->back();
        }

        public function destroy($id){
                listts::findOrFail($id)->delete();
                return redirect()->back();
        }
        public function edit($id)
{
    $data = listts::find($id); // Pastikan modelnya benar

    if (!$data) {
        return redirect()->route('list.index')->with('error', 'Data tidak ditemukan');
    }

    return view('edit', compact('data')); // Pastikan data dikirim ke view
}

public function update(Request $request, $id)
{
    // Validasi data yang diterima
    $request->validate([
        'nama' => 'required|string|max:255',
    ]);

    // Ambil data berdasarkan ID
    $task = listts::findOrFail($id); // Sesuaikan dengan nama model yang kamu gunakan

    // Update data
    $task->nama = $request->nama;
    $task->save();

    // Redirect dengan pesan sukses
    return redirect('/list')->with('success', 'Data berhasil diperbarui!');

}

public function create()
{
    $data_list = taskk::all(); // Mengambil semua data Task
    return view('list.create', compact('data_list'));
}


}
