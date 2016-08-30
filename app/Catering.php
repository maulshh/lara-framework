<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catering extends Model
{
    protected $table = 'caterings';
    
    protected $fillable = ['nama', 'provinsi', 'kota', 'kecamatan', 'alamat', 'avatar_toko', 'bio_toko'];
    
    public function makanans()
    {
        return $this->hasMany(\App\Makanan::class);
    }

    public function owner()
    {
        return $this->belongsTo(\App\Users\User::class, 'user_id');
    }
}