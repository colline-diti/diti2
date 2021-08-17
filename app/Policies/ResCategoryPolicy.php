<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ResCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the resCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list rescategories');
    }

    /**
     * Determine whether the resCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResCategory  $model
     * @return mixed
     */
    public function view(User $user, ResCategory $model)
    {
        return $user->hasPermissionTo('view rescategories');
    }

    /**
     * Determine whether the resCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create rescategories');
    }

    /**
     * Determine whether the resCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResCategory  $model
     * @return mixed
     */
    public function update(User $user, ResCategory $model)
    {
        return $user->hasPermissionTo('update rescategories');
    }

    /**
     * Determine whether the resCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResCategory  $model
     * @return mixed
     */
    public function delete(User $user, ResCategory $model)
    {
        return $user->hasPermissionTo('delete rescategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete rescategories');
    }

    /**
     * Determine whether the resCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResCategory  $model
     * @return mixed
     */
    public function restore(User $user, ResCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the resCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, ResCategory $model)
    {
        return false;
    }
}
