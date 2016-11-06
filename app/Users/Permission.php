<?php

namespace App\Users;

use App\Validator;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{

    use Validator;

    protected static $rules = [
        'name'  => 'required|max:40',
        'label' => 'required|max:40',
    ];

    protected $fillable = ['label', 'name'];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
