<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AssetsAccounts;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssetsAccountsPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the assetsAccounts can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allassetsaccounts');
    }

    /**
     * Determine whether the assetsAccounts can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetsAccounts  $model
     * @return mixed
     */
    public function view(User $user, AssetsAccounts $model)
    {
        return $user->hasPermissionTo('view allassetsaccounts');
    }

    /**
     * Determine whether the assetsAccounts can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allassetsaccounts');
    }

    /**
     * Determine whether the assetsAccounts can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetsAccounts  $model
     * @return mixed
     */
    public function update(User $user, AssetsAccounts $model)
    {
        return $user->hasPermissionTo('update allassetsaccounts');
    }

    /**
     * Determine whether the assetsAccounts can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetsAccounts  $model
     * @return mixed
     */
    public function delete(User $user, AssetsAccounts $model)
    {
        return $user->hasPermissionTo('delete allassetsaccounts');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetsAccounts  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allassetsaccounts');
    }

    /**
     * Determine whether the assetsAccounts can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetsAccounts  $model
     * @return mixed
     */
    public function restore(User $user, AssetsAccounts $model)
    {
        return false;
    }

    /**
     * Determine whether the assetsAccounts can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetsAccounts  $model
     * @return mixed
     */
    public function forceDelete(User $user, AssetsAccounts $model)
    {
        return false;
    }
}
