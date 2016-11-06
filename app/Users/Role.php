<?php

namespace App\Users;

use App\Menu;
use App\Validator;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    use Validator;

    protected static $rules = [
        'name'  => 'required|max:40',
        'label' => 'required|max:40',
    ];
    protected $fillable = ['label', 'name'];

    public static function getNames()
    {
        $roles = self::select('name')->get();
        $r = [];
        foreach ($roles as $role) {
            $r[] = $role->name;
        }

        return $r;
    }

    public function givePermissionTo(Permission $permission)
    {
        return $this->permissions()->save($permission);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public static function getId($string)
    {
        $get = self::where('name', $string)->first();
        return $get ? $get->id : false;
    }
}
