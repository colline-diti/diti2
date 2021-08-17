<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ResSection;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResSectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the resSection can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list ressections');
    }

    /**
     * Determine whether the resSection can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSection  $model
     * @return mixed
     */
    public function view(User $user, ResSection $model)
    {
        return $user->hasPermissionTo('view ressections');
    }

    /**
     * Determine whether the resSection can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create ressections');
    }

    /**
     * Determine whether the resSection can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSection  $model
     * @return mixed
     */
    public function update(User $user, ResSection $model)
    {
        return $user->hasPermissionTo('update ressections');
    }

    /**
     * Determine whether the resSection can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSection  $model
     * @return mixed
     */
    public function delete(User $user, ResSection $model)
    {
        return $user->hasPermissionTo('delete ressections');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSection  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete ressections');
    }

    /**
     * Determine whether the resSection can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSection  $model
     * @return mixed
     */
    public function restore(User $user, ResSection $model)
    {
        return false;
    }

    /**
     * Determine whether the resSection can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSection  $model
     * @return mixed
     */
    public function forceDelete(User $user, ResSection $model)
    {
        return false;
    }
}
