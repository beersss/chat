<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // User $currentUser 这个是登录用户的实例
    // User $user 传递过来的用户实例
    public function update(User $currentUser, User $user)    {
        return $currentUser->id === $user->id;
    }
}
