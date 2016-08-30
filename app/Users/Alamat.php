<?php

namespace App\Users;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model {

    protected $fillable = [
        'nama_alamat', 'nama_penerima', 'no_telp', 'negara', 'provinsi', 'kota', 'kecamatan', 'alamat', 'kode_pos'
    ];

    public function user() {
        return $this->belongsTo(\App\Users\User::class);
    }
}
