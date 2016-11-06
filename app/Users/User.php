<?php

namespace App\Users;

use App\Menu;
use App\Statusable;
use App\Validator;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{

    use Validator;
    use Statusable;
    use HasRoles;

    protected static $rules = [
        'username' => 'required|unique:users,username', 
        'email' => 'required|unique:users,email',
    ];

    protected static $status_list = [
        0  => 'recently created',
        1  => 'completed',
        2  => 'verified',
        -1 => 'banned'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//Appends
    public function getTanggalLahirAttribute($format = null)
    {
        return $this->biodata->bday_dd. '-' .$this->biodata->bday_mm. '-' .$this->biodata->bday_yy;
    }

//Relations
    public function alamats()
    {
        return $this->hasMany(Alamat::class);
    }

    public function alamat()
    {
        return $this->hasOne(Alamat::class, 'defaulted_to_user_id');
    }

    public function biodata()
    {
        return $this->hasOne(Biodata::class, 'id');
    }


//Operations
    public function menus($module_target = null)
    {
        return Menu::when($module_target, function ($query) use ($module_target) {
            return $query->where('module_target', $module_target);
        })->whereHas('roles', function ($query) {
            $query->whereIn('id', $this->roles()->lists('id'));
        })->orderBy('position')->get();
    }

    public function setDefaultAlamat($id)
    {
        if ($alamat = $this->alamats()->find($id)) {
            if($this->alamat) {
                $this->alamat->dissociate();
                $this->alamat->save();
            }

            return $this->alamat()->save($alamat);
        }

        return false;
    }

    public function addAlamat($alamat)
    {
        if (is_array($alamat)) {
            $alamat = $this->alamats()->create($alamat);
        } else {
            $alamat = $this->alamats()->save($alamat);
        }

        if ($this->alamat == null) {
            $this->alamat()->save($alamat);
        }

        return $alamat;
    }

    public function completeData($array)
    {
        $this->kelas = $array['kelas'];
        $this->sekolah = $array['sekolah'];

        $this->grade()->associate($array['grade_id']);
        $this->wilayah()->associate($array['wilayah_id']);
        $this->status = 1;
        $this->save();
    }
}