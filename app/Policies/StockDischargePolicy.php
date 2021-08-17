<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StockDischarge;
use Illuminate\Auth\Access\HandlesAuthorization;

class StockDischargePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the stockDischarge can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list stockdischarges');
    }

    /**
     * Determine whether the stockDischarge can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockDischarge  $model
     * @return mixed
     */
    public function view(User $user, StockDischarge $model)
    {
        return $user->hasPermissionTo('view stockdischarges');
    }

    /**
     * Determine whether the stockDischarge can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create stockdischarges');
    }

    /**
     * Determine whether the stockDischarge can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockDischarge  $model
     * @return mixed
     */
    public function update(User $user, StockDischarge $model)
    {
        return $user->hasPermissionTo('update stockdischarges');
    }

    /**
     * Determine whether the stockDischarge can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockDischarge  $model
     * @return mixed
     */
    public function delete(User $user, StockDischarge $model)
    {
        return $user->hasPermissionTo('delete stockdischarges');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockDischarge  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete stockdischarges');
    }

    /**
     * Determine whether the stockDischarge can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockDischarge  $model
     * @return mixed
     */
    public function restore(User $user, StockDischarge $model)
    {
        return false;
    }

    /**
     * Determine whether the stockDischarge can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockDischarge  $model
     * @return mixed
     */
    public function forceDelete(User $user, StockDischarge $model)
    {
        return false;
    }
}
