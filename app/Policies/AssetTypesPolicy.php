<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AssetTypes;
use Illuminate\Auth\Access\HandlesAuthorization;

class AssetTypesPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the assetTypes can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list allassettypes');
    }

    /**
     * Determine whether the assetTypes can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetTypes  $model
     * @return mixed
     */
    public function view(User $user, AssetTypes $model)
    {
        return $user->hasPermissionTo('view allassettypes');
    }

    /**
     * Determine whether the assetTypes can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create allassettypes');
    }

    /**
     * Determine whether the assetTypes can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetTypes  $model
     * @return mixed
     */
    public function update(User $user, AssetTypes $model)
    {
        return $user->hasPermissionTo('update allassettypes');
    }

    /**
     * Determine whether the assetTypes can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetTypes  $model
     * @return mixed
     */
    public function delete(User $user, AssetTypes $model)
    {
        return $user->hasPermissionTo('delete allassettypes');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetTypes  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete allassettypes');
    }

    /**
     * Determine whether the assetTypes can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetTypes  $model
     * @return mixed
     */
    public function restore(User $user, AssetTypes $model)
    {
        return false;
    }

    /**
     * Determine whether the assetTypes can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\AssetTypes  $model
     * @return mixed
     */
    public function forceDelete(User $user, AssetTypes $model)
    {
        return false;
    }
}
