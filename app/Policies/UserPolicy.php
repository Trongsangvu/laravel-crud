<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;

class UserPolicy
{
    /**
     * Determine whether the user can view the model.
     * $user: the user is currently logged in.
     * $model: the user was passed in from the route.
     */
    public function view(User $authUser, User $model): bool
    {
        return $authUser->isAdmin() && !$authUser->is($model);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, User $model): bool
    {
        return $user->isAdmin() && !$user->is($model);
    }
}
