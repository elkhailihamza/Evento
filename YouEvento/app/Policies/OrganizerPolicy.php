<?php

namespace App\Policies;

use App\Models\User;

class OrganizerPolicy
{
    /**
     * Create a new policy instance.
     */

    public function viewOriganizerComponent(User $user) {
        return $user->role_id == 2;
    }
}
