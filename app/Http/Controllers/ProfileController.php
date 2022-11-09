<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function index() {
        $profile = DB::table('profile')->get();
        return view('VProfile', ['profile' => $profile]);
    }
    
    public function add(Request $request)
    {
    	DB::table('profile')->insert([
			'nama_profile' => $request->nama_profile,

		]);
		return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
 
    }

    public function update(Request $request, $id)
    {
        DB::table('profile')->where('kd_profile', $id)->update([
            'nama_profile' => $request->nama_profile,
        ]);

        return redirect()->back()->with('success', 'Data berhasil dirubah!');
    }

    public function delete($id)
    {
        DB::table('profile')->where('kd_profile', $id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
