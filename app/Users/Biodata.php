<?php

namespace App\Users;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model {

    protected $fillable = [
        'nama', 'no_telp', 'bio', 'bday_dd', 'bday_mm', 'bday_yy', 'jenis_kelamin', 'bio', 'avatar'
    ];

    public function user() {
        return $this->belongsTo(\App\Users\User::class, 'id');
    }
}