<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TaxRates;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaxRatesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the taxRates can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list alltaxrates');
    }

    /**
     * Determine whether the taxRates can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxRates  $model
     * @return mixed
     */
    public function view(User $user, TaxRates $model)
    {
        return $user->hasPermissionTo('view alltaxrates');
    }

    /**
     * Determine whether the taxRates can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create alltaxrates');
    }

    /**
     * Determine whether the taxRates can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxRates  $model
     * @return mixed
     */
    public function update(User $user, TaxRates $model)
    {
        return $user->hasPermissionTo('update alltaxrates');
    }

    /**
     * Determine whether the taxRates can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxRates  $model
     * @return mixed
     */
    public function delete(User $user, TaxRates $model)
    {
        return $user->hasPermissionTo('delete alltaxrates');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxRates  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete alltaxrates');
    }

    /**
     * Determine whether the taxRates can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxRates  $model
     * @return mixed
     */
    public function restore(User $user, TaxRates $model)
    {
        return false;
    }

    /**
     * Determine whether the taxRates can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\TaxRates  $model
     * @return mixed
     */
    public function forceDelete(User $user, TaxRates $model)
    {
        return false;
    }
}
