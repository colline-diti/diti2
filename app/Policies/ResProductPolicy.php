<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ResProduct;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the resProduct can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list resproducts');
    }

    /**
     * Determine whether the resProduct can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResProduct  $model
     * @return mixed
     */
    public function view(User $user, ResProduct $model)
    {
        return $user->hasPermissionTo('view resproducts');
    }

    /**
     * Determine whether the resProduct can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create resproducts');
    }

    /**
     * Determine whether the resProduct can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResProduct  $model
     * @return mixed
     */
    public function update(User $user, ResProduct $model)
    {
        return $user->hasPermissionTo('update resproducts');
    }

    /**
     * Determine whether the resProduct can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResProduct  $model
     * @return mixed
     */
    public function delete(User $user, ResProduct $model)
    {
        return $user->hasPermissionTo('delete resproducts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResProduct  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete resproducts');
    }

    /**
     * Determine whether the resProduct can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResProduct  $model
     * @return mixed
     */
    public function restore(User $user, ResProduct $model)
    {
        return false;
    }

    /**
     * Determine whether the resProduct can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResProduct  $model
     * @return mixed
     */
    public function forceDelete(User $user, ResProduct $model)
    {
        return false;
    }
}
