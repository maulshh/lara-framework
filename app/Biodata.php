<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{

    use Validator;

    protected static $rules = [
        'nama' => 'required|max:200',
        'no_telp' => 'required|max:20',
        'birthdate' => 'required',
        'jenis_kelamin' => 'max:1',
        'avatar' => 'max:200'
    ];

    protected $fillable = [
        'nama', 'no_telp', 'birthdate', 'gender', 'bio', 'avatar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}