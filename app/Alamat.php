<?php

namespace App;

use App\Http\Utilities\Region;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{

    use Validator;

    private static $rules = [
        'nama_alamat'   => 'required|max:40',
        'alamat'        => 'required',
        'no_telp'       => 'required',
        'nama_penerima' => 'required'
    ];

    protected $fillable = [
        'nama_alamat', 'nama_penerima', 'no_telp', 'negara', 'provinsi', 'kota', 'kecamatan', 'alamat', 'kode_pos', 'keterangan'
    ];

    protected $appends = array('district', 'city', 'province');

    
    public function getDistrictAttribute()
    {
        return Region::district($this->kecamatan);
    }

    public function getCityAttribute()
    {
        return Region::city($this->kota);
    }

    public function getProvinceAttribute()
    {
        return Region::province($this->provinsi);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}