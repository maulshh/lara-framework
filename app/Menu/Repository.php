<?php

namespace App\Menu;

use Illuminate\Support\Facades\Auth;

class Repository {

    /**
     * Get list of menus for certain module in page or section,
     * for the current role of the user
     *
     * @param $module_target
     * @param $role
     */
    public function menuList($module_target, $role = null) {
        if($role == null){
            return Auth::user()->menus()->where('module_target', $module_target);
        }
        return Menu::where('module_target', $module_target)->like('role', "-" . $role . "-");
    }
}