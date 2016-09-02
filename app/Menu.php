<?php

namespace App;

use App\Users\Role;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $fillable = ['module_target', 'position', 'icon', 'uri', 'title', 'body', 'type', 'name'];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public static function getMenus($module_target) {
        return Menu::where('module_target', $module_target)
            ->orderBy('position')->get();
    }

    public static function getTargets() {
        return Menu::select('module_target')->get();
    }
}