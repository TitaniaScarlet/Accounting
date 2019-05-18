<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
     public function admin(User $user)
       {
           return $user->role == "admin";
       }

       public function employee(User $user) {
         return $user->role == "employee" || $user->role == "admin";
       }
}
