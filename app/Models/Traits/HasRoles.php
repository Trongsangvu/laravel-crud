<?php

namespace App\Models\Traits;

use App\Enums\UserRole;

trait HasRoles
{
    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }
}
