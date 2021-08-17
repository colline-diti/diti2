<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PaymentTypes;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentTypesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the paymentTypes can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allpaymenttypes');
    }

    /**
     * Determine whether the paymentTypes can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentTypes  $model
     * @return mixed
     */
    public function view(User $user, PaymentTypes $model)
    {
        return $user->hasPermissionTo('view allpaymenttypes');
    }

    /**
     * Determine whether the paymentTypes can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allpaymenttypes');
    }

    /**
     * Determine whether the paymentTypes can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentTypes  $model
     * @return mixed
     */
    public function update(User $user, PaymentTypes $model)
    {
        return $user->hasPermissionTo('update allpaymenttypes');
    }

    /**
     * Determine whether the paymentTypes can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentTypes  $model
     * @return mixed
     */
    public function delete(User $user, PaymentTypes $model)
    {
        return $user->hasPermissionTo('delete allpaymenttypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentTypes  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allpaymenttypes');
    }

    /**
     * Determine whether the paymentTypes can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentTypes  $model
     * @return mixed
     */
    public function restore(User $user, PaymentTypes $model)
    {
        return false;
    }

    /**
     * Determine whether the paymentTypes can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\PaymentTypes  $model
     * @return mixed
     */
    public function forceDelete(User $user, PaymentTypes $model)
    {
        return false;
    }
}
