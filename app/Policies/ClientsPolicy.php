<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Clients;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClientsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the clients can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allclients');
    }

    /**
     * Determine whether the clients can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Clients  $model
     * @return mixed
     */
    public function view(User $user, Clients $model)
    {
        return $user->hasPermissionTo('view allclients');
    }

    /**
     * Determine whether the clients can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allclients');
    }

    /**
     * Determine whether the clients can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Clients  $model
     * @return mixed
     */
    public function update(User $user, Clients $model)
    {
        return $user->hasPermissionTo('update allclients');
    }

    /**
     * Determine whether the clients can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Clients  $model
     * @return mixed
     */
    public function delete(User $user, Clients $model)
    {
        return $user->hasPermissionTo('delete allclients');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Clients  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allclients');
    }

    /**
     * Determine whether the clients can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Clients  $model
     * @return mixed
     */
    public function restore(User $user, Clients $model)
    {
        return false;
    }

    /**
     * Determine whether the clients can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Clients  $model
     * @return mixed
     */
    public function forceDelete(User $user, Clients $model)
    {
        return false;
    }
}
