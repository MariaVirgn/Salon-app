<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    function getAbout(){
        $data = About::all();

        return $data;
    }

    function updateAbout(Request $request)
    {
        $id = $request->input('id');
        $deskripsi = $request->input('deskripsi');

        $about = About::find($id);

        $about->deskripsi = $deskripsi;
        $about->save();

        return response()->json(['success' => true, 'message' => 'Data Berhasil Diubah']);
    }
}
