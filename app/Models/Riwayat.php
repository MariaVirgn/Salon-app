<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'tb_riwayat';

    protected $fillable =[
        'id_booking',
        'harga_jasa_booking'
    ];

    public static function insertRiwayat($id, $harga){
        $data = self::create([
            'id_booking'=> $id,
            'harga_jasa_booking'=>$harga,
        ]);

        if ($data) {
            return [
                'status' => 'success',
                'message' => 'successfully insert riwayat',                
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to insert riwayat',
            ];
        }

    }
}
