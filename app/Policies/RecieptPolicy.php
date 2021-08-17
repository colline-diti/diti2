<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Reciept;
use Illuminate\Auth\Access\HandlesAuthorization;

class RecieptPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the reciept can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list reciepts');
    }

    /**
     * Determine whether the reciept can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reciept  $model
     * @return mixed
     */
    public function view(User $user, Reciept $model)
    {
        return $user->hasPermissionTo('view reciepts');
    }

    /**
     * Determine whether the reciept can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create reciepts');
    }

    /**
     * Determine whether the reciept can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reciept  $model
     * @return mixed
     */
    public function update(User $user, Reciept $model)
    {
        return $user->hasPermissionTo('update reciepts');
    }

    /**
     * Determine whether the reciept can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reciept  $model
     * @return mixed
     */
    public function delete(User $user, Reciept $model)
    {
        return $user->hasPermissionTo('delete reciepts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reciept  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete reciepts');
    }

    /**
     * Determine whether the reciept can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reciept  $model
     * @return mixed
     */
    public function restore(User $user, Reciept $model)
    {
        return false;
    }

    /**
     * Determine whether the reciept can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Reciept  $model
     * @return mixed
     */
    public function forceDelete(User $user, Reciept $model)
    {
        return false;
    }
}
