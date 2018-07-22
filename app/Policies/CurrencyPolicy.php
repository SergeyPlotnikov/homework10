<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CurrencyPolicy
{
    use HandlesAuthorization;


    public function create(User $user)
    {
        return $this->isAdmin($user);
    }

    public function store(User $user)
    {
        return $this->isAdmin($user);
    }

    public function update(User $user)
    {
        return $this->isAdmin($user);
    }

    public function edit(User $user)
    {
        return $this->isAdmin($user);
    }

    public function showAddButton(User $user)
    {
        return $this->isAdmin($user);
    }

    public function showChangeButton(User $user)
    {
        return $this->isAdmin($user);
    }

    private function isAdmin(User $user)
    {
        return $user->is_admin;
    }
}
