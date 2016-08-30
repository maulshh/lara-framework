<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'makanans';

    protected $fillable = ['nama', 'deskripsi', 'harga', 'pict'];

    public function catering()
    {
        return $this->belongsTo(\App\Catering::class);
    }
}