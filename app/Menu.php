<?php

namespace App;

use App\Users\Role;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    protected $fillable = ['module_target', 'position', 'icon', 'uri', 'title', 'body', 'type'];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }
}