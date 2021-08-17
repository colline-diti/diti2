<?php

namespace App\Policies;

use App\Models\User;
use App\Models\StockTable;
use Illuminate\Auth\Access\HandlesAuthorization;

class StockTablePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the stockTable can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list stocktables');
    }

    /**
     * Determine whether the stockTable can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockTable  $model
     * @return mixed
     */
    public function view(User $user, StockTable $model)
    {
        return $user->hasPermissionTo('view stocktables');
    }

    /**
     * Determine whether the stockTable can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create stocktables');
    }

    /**
     * Determine whether the stockTable can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockTable  $model
     * @return mixed
     */
    public function update(User $user, StockTable $model)
    {
        return $user->hasPermissionTo('update stocktables');
    }

    /**
     * Determine whether the stockTable can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockTable  $model
     * @return mixed
     */
    public function delete(User $user, StockTable $model)
    {
        return $user->hasPermissionTo('delete stocktables');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockTable  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete stocktables');
    }

    /**
     * Determine whether the stockTable can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockTable  $model
     * @return mixed
     */
    public function restore(User $user, StockTable $model)
    {
        return false;
    }

    /**
     * Determine whether the stockTable can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\StockTable  $model
     * @return mixed
     */
    public function forceDelete(User $user, StockTable $model)
    {
        return false;
    }
}
