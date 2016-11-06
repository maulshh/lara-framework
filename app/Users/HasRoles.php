<?php

namespace App\Users;


trait HasRoles
{

    public function hasRole($roles)
    {
        if (is_string($roles)) {
            return $this->roles->contains('name', $roles);
        }

        return !!$roles->intersect($this->roles)->count();
    }

    public function assignRole($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()
        );
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}