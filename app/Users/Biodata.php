<?php

namespace App\Users;

use App\Validator;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{

    use Validator;

    protected static $rules = [
        'nama' => 'required|max:200', 
        'no_telp' => 'required|max:20', 
        'bday_dd' => 'required|max:2', 
        'bday_mm' => 'required|max:2', 
        'bday_yy' => 'required|max:4',
        'jenis_kelamin' => 'required|max:1', 
        'avatar' => 'max:200'
    ];
    
    protected $fillable = [
        'nama', 'no_telp', 'bday_dd', 'bday_mm', 'bday_yy', 'jenis_kelamin', 'bio', 'avatar'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Users\User::class, 'id');
    }
}