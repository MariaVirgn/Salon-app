<?php

namespace App\Http\Controllers;

use App\Models\Cust;
use App\Models\Booking;
use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bookingController extends Controller
{
    function read()
    {
        $data = Booking::join('tb_cust', 'tb_booking.id_cust', '=', 'tb_cust.id_cust')->join('tb_jasa', 'tb_booking.id_jasa', '=', 'tb_jasa.id_jasa')
            ->select('tb_booking.*', 'tb_cust.username', 'tb_jasa.nama_jasa', 'tb_jasa.harga_jasa')
            ->where('tb_booking.val', 'N')
            ->get();

        return $data;
    }

    function formBooking($id){
        $cust = Auth::user()->id_cust;
        $data = Cust::find($cust);

        return $data;
    }

    function tambahBooking(Request $request, $id){
        $cust = Auth::user()->id_cust;
        $result = Booking::insertPesan(
            $cust,
            $id,
            $request->input('jam'),
            $request->input('tgl'),
            $request->input('pembayaran')
        );

        return $result;
    }

    function konfirmasiBooking(Request $request, $id)
    {
        $data = Booking::where('id_booking', $id)->first();

        if ($data) {
            $data->val = 'Y';
            $data->save();

            $riwayat = Riwayat::insertRiwayat($id,$request->input('harga'));
            
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Pesanan Tidak Ditemukan'], 404);
        }
    }

    public function deleteBooking($id)
    {
        $data = Booking::find($id);

        if (!$data) {
            return response()->json(['success' => false, 'message' => 'Pesanan Tidak Ditemukan'], 404);
        }

        $data->delete();

        return response()->json(['success' => true, 'message' => 'Pesanan Berhasil Dihapus']);
    }

    public function cekPesanan()
    {
        $customerId = Auth::id();

        $pesanan = Booking::join('tb_cust', 'tb_booking.id_cust', '=', 'tb_cust.id_cust')->join('tb_jasa', 'tb_booking.id_jasa', '=', 'tb_jasa.id_jasa')
        ->select('tb_booking.*', 'tb_cust.username', 'tb_jasa.nama_jasa')
        ->where('tb_booking.id_cust', $customerId)
        ->get();

        return $pesanan;
    }
}
