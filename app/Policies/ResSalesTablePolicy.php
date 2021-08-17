<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ResSalesTable;
use Illuminate\Auth\Access\HandlesAuthorization;

class ResSalesTablePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the resSalesTable can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list ressalestables');
    }

    /**
     * Determine whether the resSalesTable can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSalesTable  $model
     * @return mixed
     */
    public function view(User $user, ResSalesTable $model)
    {
        return $user->hasPermissionTo('view ressalestables');
    }

    /**
     * Determine whether the resSalesTable can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create ressalestables');
    }

    /**
     * Determine whether the resSalesTable can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSalesTable  $model
     * @return mixed
     */
    public function update(User $user, ResSalesTable $model)
    {
        return $user->hasPermissionTo('update ressalestables');
    }

    /**
     * Determine whether the resSalesTable can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSalesTable  $model
     * @return mixed
     */
    public function delete(User $user, ResSalesTable $model)
    {
        return $user->hasPermissionTo('delete ressalestables');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSalesTable  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete ressalestables');
    }

    /**
     * Determine whether the resSalesTable can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSalesTable  $model
     * @return mixed
     */
    public function restore(User $user, ResSalesTable $model)
    {
        return false;
    }

    /**
     * Determine whether the resSalesTable can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ResSalesTable  $model
     * @return mixed
     */
    public function forceDelete(User $user, ResSalesTable $model)
    {
        return false;
    }
}
