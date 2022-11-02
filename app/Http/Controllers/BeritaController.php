<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function index() {
        $berita = DB::table('berita')->get();
        return view('VBerita', ['berita' => $berita]);
    }

    public function add(Request $request)
    {
    	DB::table('berita')->insert([
			'nama_berita' => $request->nama_berita,

		]);
		return redirect()->back();
 
    }

    public function update(Request $request, $id)
    {
        DB::table('berita')->where('kd_berita', $id)->update([
            'nama_berita' => $request->nama_berita,
        ]);

        return redirect()->back();
    }

    public function delete($id)
    {
        DB::table('berita')->where('kd_berita', $id)->delete();

        return redirect()->back();
    }
}
