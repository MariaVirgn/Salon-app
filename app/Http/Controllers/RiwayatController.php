<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    function getRiwayatTransaksi()
    {
        $data = Riwayat::join('tb_booking', 'tb_riwayat.id_booking', '=', 'tb_booking.id_booking')
            ->join('tb_jasa', 'tb_booking.id_jasa', '=', 'tb_jasa.id_jasa')
            ->join('tb_cust', 'tb_booking.id_cust', '=', 'tb_cust.id_cust')
            ->select('tb_riwayat.*', 'tb_booking.*', 'tb_cust.username', 'tb_jasa.nama_jasa')
            ->get();

        return $data;
    }
}
