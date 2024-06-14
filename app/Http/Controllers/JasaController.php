<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jasa;
use App\Models\Riwayat;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    function read(){
        $data = Jasa::all();
        
        return $data;
    }

    function insert(Request $request){
        $request->validate([
            'nama'=> 'required',
            'harga'=> 'required|numeric',
            'desc'=>'required'
        ]);

        $result = Jasa::insertJasa(
            $request->input('nama'),
            $request->input('harga'),
            $request->input('desc')
        );

        return $result;
    }

    function edit($id){
        $data = Jasa::where('id_jasa', $id)->first();

        return $data;
    }

    function update(Request $request, $id){
        $request->validate([
            'nama'=>'required',
            'harga'=>'required|numeric',
            'desc'=>'required',
        ]);
        
        $data = Jasa::where('id_jasa', $id)->first();        
        $data->nama_jasa = $request->input('nama');
        $data->harga_jasa = $request->input('harga');
        $data->deskripsi_jasa = $request->input('desc');
        $data->save();
        if($data){
            return response()->json(['success' => true]);
        }else{
            return response()->json(['success' => false, 'message'=>'Update jasa gagal']);
        }
    }

    function deleteJasa($id){
        $data = Jasa::find($id);

        if (!$data) {
            return response()->json(['success' => false, 'message' => 'Pesanan Tidak Ditemukan'], 404);
        }

        $data->delete();

        return response()->json(['success' => true, 'message' => 'Booking deleted successfully']);
    }
}
