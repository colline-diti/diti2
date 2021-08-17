<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PettyCash;
use Illuminate\Auth\Access\HandlesAuthorization;

class PettyCashPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the pettyCash can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list pettycashes');
    }

    /**
     * Determine whether the pettyCash can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PettyCash  $model
     * @return mixed
     */
    public function view(User $user, PettyCash $model)
    {
        return $user->hasPermissionTo('view pettycashes');
    }

    /**
     * Determine whether the pettyCash can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create pettycashes');
    }

    /**
     * Determine whether the pettyCash can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PettyCash  $model
     * @return mixed
     */
    public function update(User $user, PettyCash $model)
    {
        return $user->hasPermissionTo('update pettycashes');
    }

    /**
     * Determine whether the pettyCash can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PettyCash  $model
     * @return mixed
     */
    public function delete(User $user, PettyCash $model)
    {
        return $user->hasPermissionTo('delete pettycashes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PettyCash  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete pettycashes');
    }

    /**
     * Determine whether the pettyCash can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PettyCash  $model
     * @return mixed
     */
    public function restore(User $user, PettyCash $model)
    {
        return false;
    }

    /**
     * Determine whether the pettyCash can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PettyCash  $model
     * @return mixed
     */
    public function forceDelete(User $user, PettyCash $model)
    {
        return false;
    }
}
