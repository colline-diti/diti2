<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Invoices;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the invoices can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allinvoices');
    }

    /**
     * Determine whether the invoices can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invoices  $model
     * @return mixed
     */
    public function view(User $user, Invoices $model)
    {
        return $user->hasPermissionTo('view allinvoices');
    }

    /**
     * Determine whether the invoices can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allinvoices');
    }

    /**
     * Determine whether the invoices can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invoices  $model
     * @return mixed
     */
    public function update(User $user, Invoices $model)
    {
        return $user->hasPermissionTo('update allinvoices');
    }

    /**
     * Determine whether the invoices can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invoices  $model
     * @return mixed
     */
    public function delete(User $user, Invoices $model)
    {
        return $user->hasPermissionTo('delete allinvoices');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invoices  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allinvoices');
    }

    /**
     * Determine whether the invoices can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invoices  $model
     * @return mixed
     */
    public function restore(User $user, Invoices $model)
    {
        return false;
    }

    /**
     * Determine whether the invoices can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\Invoices  $model
     * @return mixed
     */
    public function forceDelete(User $user, Invoices $model)
    {
        return false;
    }
}
