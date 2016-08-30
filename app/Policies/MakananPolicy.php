<?php

namespace App\Policies;

use App\Users\User;
use App\Makanan;
use Illuminate\Auth\Access\HandlesAuthorization;

class MakananPolicy {

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {

    }

    public function store(User $user, Makanan $makanan) {
        return $user->owns($makanan) || $user->role_type
    }

    public function update(User $user, Makanan $makanan) {

    }

    public function destroy(User $user, Makanan $makanan) {

    }
}