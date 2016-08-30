<?php

namespace App\Users;

use App\Menu;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'users';

    public function menus($module_target = null) {
        return Menu::when($module_target, function ($query) use ($module_target) {
            return $query->where('module_target', $module_target);
        })->whereHas('roles', function ($query) {
            $query->whereIn('id', $this->roles()->lists('id'));
        })->get();

//        return $this->hasManyThrough(\App\Menu::class, Role::class);
//        Error because, use 2 pivot table. hasManyThrough shouldn't use any pivot
    }

    public function alamat() {
        return $this->alamats()->find($this->default_alamat);
    }

    public function setDefaultAlamat($id) {
        $this->default_alamat = $id;
        $this->save();
    }

    public function alamats() {
        return $this->hasMany(\App\Users\Alamat::class);
    }

    public function biodata() {
        return $this->hasOne(\App\Users\Biodata::class, 'id');
    }
}