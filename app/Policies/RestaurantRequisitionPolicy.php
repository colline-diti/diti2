<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RestaurantRequisition;
use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantRequisitionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the restaurantRequisition can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list restaurantrequisitions');
    }

    /**
     * Determine whether the restaurantRequisition can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RestaurantRequisition  $model
     * @return mixed
     */
    public function view(User $user, RestaurantRequisition $model)
    {
        return $user->hasPermissionTo('view restaurantrequisitions');
    }

    /**
     * Determine whether the restaurantRequisition can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create restaurantrequisitions');
    }

    /**
     * Determine whether the restaurantRequisition can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RestaurantRequisition  $model
     * @return mixed
     */
    public function update(User $user, RestaurantRequisition $model)
    {
        return $user->hasPermissionTo('update restaurantrequisitions');
    }

    /**
     * Determine whether the restaurantRequisition can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RestaurantRequisition  $model
     * @return mixed
     */
    public function delete(User $user, RestaurantRequisition $model)
    {
        return $user->hasPermissionTo('delete restaurantrequisitions');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RestaurantRequisition  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete restaurantrequisitions');
    }

    /**
     * Determine whether the restaurantRequisition can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RestaurantRequisition  $model
     * @return mixed
     */
    public function restore(User $user, RestaurantRequisition $model)
    {
        return false;
    }

    /**
     * Determine whether the restaurantRequisition can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RestaurantRequisition  $model
     * @return mixed
     */
    public function forceDelete(User $user, RestaurantRequisition $model)
    {
        return false;
    }
}
