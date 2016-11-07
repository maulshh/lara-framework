<?php

namespace App\Users;

use App\Validator;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{

    use Validator;

    protected static $rules = [
        'nama'          => 'required|max:200',
        'no_telp'       => 'required|max:20',
        'bday_dd'       => 'max:2',
        'bday_mm'       => 'max:2',
        'bday_yy'       => 'max:4',
        'jenis_kelamin' => 'max:1',
        'avatar'        => 'max:200'
    ];

    protected $appends = ['age'];

    protected $dates = ['birthday'];
    
    protected $fillable = [
        'nama', 'no_telp', 'birthday', 'jenis_kelamin', 'bio', 'avatar'
    ];

    public function getAgeAttribute()
    {
        return $this->birthday->diffInYears();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}