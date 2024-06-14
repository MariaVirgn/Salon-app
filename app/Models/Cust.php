<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Cust extends Model implements Authenticatable
{
    use AuthenticatableTrait,HasFactory;

    protected $table = 'tb_cust';
    protected $primaryKey = 'id_cust';
    protected $fillable =[
        'username',
        'nomor_cust',
        'email',
        'alamat',
        'password'        
    ];

    public static function register($nama, $nomor, $email, $alamat,$password){        
        $data = self::create([
            "username" => $nama,
            "nomor_cust" => $nomor,            
            "email" => $email,            
            "alamat" => $alamat,            
            "password"=> bcrypt($password),
        ]);

        if ($data) {
            return [
                'status' => 'success',
                'message' => 'User registered successfully',
                'user_id' => $data->id,
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Failed to register user',
            ];
        }
    }
}
