<?php

namespace App\Http\Controllers;

use App\Models\About;
use Auth;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    function getAbout(){
            // public function __construct()
    // {
        Auth::shouldUse('user');
        $this->middleware('auth:user');
    // }
        $data = About::all();

        return $data;
    }

    function updateAbout(Request $request)
    {
        Auth::shouldUse('admin');
        $this->middleware('auth:admin');

        $id = $request->input('id');
        $deskripsi = $request->input('deskripsi');

        $about = About::find($id);

        $about->deskripsi = $deskripsi;
        $about->save();

        return response()->json(['success' => true, 'message' => 'Data Berhasil Diubah']);
    }
}
