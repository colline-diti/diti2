<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ProductParticulars;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductParticularsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the productParticulars can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allproductparticulars');
    }

    /**
     * Determine whether the productParticulars can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductParticulars  $model
     * @return mixed
     */
    public function view(User $user, ProductParticulars $model)
    {
        return $user->hasPermissionTo('view allproductparticulars');
    }

    /**
     * Determine whether the productParticulars can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allproductparticulars');
    }

    /**
     * Determine whether the productParticulars can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductParticulars  $model
     * @return mixed
     */
    public function update(User $user, ProductParticulars $model)
    {
        return $user->hasPermissionTo('update allproductparticulars');
    }

    /**
     * Determine whether the productParticulars can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductParticulars  $model
     * @return mixed
     */
    public function delete(User $user, ProductParticulars $model)
    {
        return $user->hasPermissionTo('delete allproductparticulars');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductParticulars  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allproductparticulars');
    }

    /**
     * Determine whether the productParticulars can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductParticulars  $model
     * @return mixed
     */
    public function restore(User $user, ProductParticulars $model)
    {
        return false;
    }

    /**
     * Determine whether the productParticulars can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ProductParticulars  $model
     * @return mixed
     */
    public function forceDelete(User $user, ProductParticulars $model)
    {
        return false;
    }
}
