<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    public function index() {
        $kontak = DB::table('kontak')->get();
        return view('VKontak', ['kontak' => $kontak]);
    }
    
    public function add(Request $request)
    {
    	DB::table('kontak')->insert([
			'nama_kontak' => $request->nama_kontak,

		]);
		return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
 
    }

    public function update(Request $request, $id)
    {
        DB::table('kontak')->where('kd_kontak', $id)->update([
            'nama_kontak' => $request->nama_kontak,
        ]);

        return redirect()->back()->with('success', 'Data berhasil dirubah!');
    }

    public function delete($id)
    {
        DB::table('kontak')->where('kd_kontak', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
