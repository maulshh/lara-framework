<?php

namespace App\Policies;

use App\Catering;
use App\Users\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CateringPolicy {

    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct() {
    }

    public function hascatering(User $user) {
        dd($user->role->catering);
        return true;
    }

    public function store(User $user, Catering $makanan) {
        return $user->owns($makanan) || $user->role_type
    }

    public function update(User $user, Catering $makanan) {

    }

    public function destroy(User $user, Catering $makanan) {

    }
}
