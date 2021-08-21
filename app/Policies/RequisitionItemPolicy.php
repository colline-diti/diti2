<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RequisitionItem;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequisitionItemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the requisitionItem can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list requisitionitems');
    }

    /**
     * Determine whether the requisitionItem can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionItem  $model
     * @return mixed
     */
    public function view(User $user, RequisitionItem $model)
    {
        return $user->hasPermissionTo('view requisitionitems');
    }

    /**
     * Determine whether the requisitionItem can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create requisitionitems');
    }

    /**
     * Determine whether the requisitionItem can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionItem  $model
     * @return mixed
     */
    public function update(User $user, RequisitionItem $model)
    {
        return $user->hasPermissionTo('update requisitionitems');
    }

    /**
     * Determine whether the requisitionItem can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionItem  $model
     * @return mixed
     */
    public function delete(User $user, RequisitionItem $model)
    {
        return $user->hasPermissionTo('delete requisitionitems');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionItem  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete requisitionitems');
    }

    /**
     * Determine whether the requisitionItem can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionItem  $model
     * @return mixed
     */
    public function restore(User $user, RequisitionItem $model)
    {
        return false;
    }

    /**
     * Determine whether the requisitionItem can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionItem  $model
     * @return mixed
     */
    public function forceDelete(User $user, RequisitionItem $model)
    {
        return false;
    }
}
