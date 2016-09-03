<?php

namespace App\Users;

use App\Menu;
use Illuminate\Database\Eloquent\Model;

class Role extends Model {

    protected $fillable = ['label', 'name'];

    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(Permission $permission) {
        return $this->permissions()->save($permission);
    }

    public function menus() {
        return $this->belongsToMany(Menu::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

    public static function getNames() {
        $roles = Role::select('name')->get()->toArray();
        $r = [];
        foreach ($roles as $role) {
            $r += $role;
        }

        return $r;
    }
}
