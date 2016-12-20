<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, Validator, Statusable, HasRoles;

    protected static $status_list = [
        0  => 'recently created',
        1  => 'completed',
        2  => 'verified',
        -1 => 'banned'
    ];

    protected static $rules = [
        'username' => 'required|unique:users,username',
        'email'    => 'required|unique:users,email',
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
            $query->whereIn('id', $this->roles()->pluck('id'));
        })->orderBy('position')->get();
    }

    public function setDefaultAlamat($id)
    {
        if ($this->alamat && $id != $this->alamat->id && $alamat = $this->alamats()->find($id)) {
            $this->alamat()->dissociate();
            $this->alamat->save();

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
}