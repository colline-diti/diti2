<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ExpesesResturant;
use Illuminate\Auth\Access\HandlesAuthorization;

class ExpesesResturantPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the expesesResturant can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list expeses_resturants');
    }

    /**
     * Determine whether the expesesResturant can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpesesResturant  $model
     * @return mixed
     */
    public function view(User $user, ExpesesResturant $model)
    {
        return $user->hasPermissionTo('view expeses_resturants');
    }

    /**
     * Determine whether the expesesResturant can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create expeses_resturants');
    }

    /**
     * Determine whether the expesesResturant can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpesesResturant  $model
     * @return mixed
     */
    public function update(User $user, ExpesesResturant $model)
    {
        return $user->hasPermissionTo('update expeses_resturants');
    }

    /**
     * Determine whether the expesesResturant can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpesesResturant  $model
     * @return mixed
     */
    public function delete(User $user, ExpesesResturant $model)
    {
        return $user->hasPermissionTo('delete expeses_resturants');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpesesResturant  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete expeses_resturants');
    }

    /**
     * Determine whether the expesesResturant can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpesesResturant  $model
     * @return mixed
     */
    public function restore(User $user, ExpesesResturant $model)
    {
        return false;
    }

    /**
     * Determine whether the expesesResturant can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ExpesesResturant  $model
     * @return mixed
     */
    public function forceDelete(User $user, ExpesesResturant $model)
    {
        return false;
    }
}
