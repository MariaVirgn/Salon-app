<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $table = 'tb_jasa';
    protected $primaryKey ='id_jasa';
    protected $fillable =[
        'nama_jasa',
        'harga_jasa',
        'deskripsi_jasa'
    ];

    

    public static function insertJasa($nama, $harga, $desc){
        $data = self::create([
            'nama_jasa'=>$nama,
            'harga_jasa'=>$harga,
            'deskripsi_jasa'=>$desc
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

    public static function editJasa($id, $nama, $harga, $desc){
        
    }
}
