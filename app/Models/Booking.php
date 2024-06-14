<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'tb_booking';
    protected $primaryKey = 'id_booking'; 
    
    protected $fillable =[
        'id_cust',
        'id_jasa',
        'jam_booking',
        'tanggal_booking',
        'metode_pembayaran',
        'val'
    ];

    public static function insertPesan($id_cust, $id_jasa, $jam, $tgl, $metode){
        $data = self::create([
            'id_cust'=>$id_cust,
            'id_jasa'=>$id_jasa,
            'jam_booking'=>$jam,
            'tanggal_booking'=>$tgl,
            'metode_pembayaran'=>$metode,
            'val'=>'N'
        ]);

        if ($data) {
            return [
                'status' => 'success',
                'message' => 'Insert jasa successfully',
                'user_id' => $data->id,
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to insert jasa',
            ];
        }
    }
}
