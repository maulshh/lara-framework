<?php

namespace App;

use App\Users\Role;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{

    use Validator;

    protected static $rules = [
        'name'          => 'required',
        'module_target' => 'required|max:40',
        'body'          => 'required|max:40',
        'position'      => 'required|max:8',
        'type'          => 'required|in:default,separator,parent',
    ];
    protected $fillable = ['module_target', 'position', 'icon', 'uri', 'title', 'body', 'type', 'name'];

    public static function getMenus($module_target)
    {
        return Menu::where('module_target', $module_target)
            ->orderBy('position')->get();
    }

    public static function getTargets()
    {
        return Menu::select('module_target')->get();
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}