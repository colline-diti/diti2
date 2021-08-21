<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RequisitionDelivery;
use Illuminate\Auth\Access\HandlesAuthorization;

class RequisitionDeliveryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the requisitionDelivery can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list requisitiondeliveries');
    }

    /**
     * Determine whether the requisitionDelivery can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionDelivery  $model
     * @return mixed
     */
    public function view(User $user, RequisitionDelivery $model)
    {
        return $user->hasPermissionTo('view requisitiondeliveries');
    }

    /**
     * Determine whether the requisitionDelivery can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create requisitiondeliveries');
    }

    /**
     * Determine whether the requisitionDelivery can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionDelivery  $model
     * @return mixed
     */
    public function update(User $user, RequisitionDelivery $model)
    {
        return $user->hasPermissionTo('update requisitiondeliveries');
    }

    /**
     * Determine whether the requisitionDelivery can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionDelivery  $model
     * @return mixed
     */
    public function delete(User $user, RequisitionDelivery $model)
    {
        return $user->hasPermissionTo('delete requisitiondeliveries');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionDelivery  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete requisitiondeliveries');
    }

    /**
     * Determine whether the requisitionDelivery can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionDelivery  $model
     * @return mixed
     */
    public function restore(User $user, RequisitionDelivery $model)
    {
        return false;
    }

    /**
     * Determine whether the requisitionDelivery can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\RequisitionDelivery  $model
     * @return mixed
     */
    public function forceDelete(User $user, RequisitionDelivery $model)
    {
        return false;
    }
}
