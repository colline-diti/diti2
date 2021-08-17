<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ItemCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the itemCategory can view any models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('list itemcategories');
    }

    /**
     * Determine whether the itemCategory can view the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemCategory  $model
     * @return mixed
     */
    public function view(User $user, ItemCategory $model)
    {
        return $user->hasPermissionTo('view itemcategories');
    }

    /**
     * Determine whether the itemCategory can create models.
     *
     * @param  App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('create itemcategories');
    }

    /**
     * Determine whether the itemCategory can update the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemCategory  $model
     * @return mixed
     */
    public function update(User $user, ItemCategory $model)
    {
        return $user->hasPermissionTo('update itemcategories');
    }

    /**
     * Determine whether the itemCategory can delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemCategory  $model
     * @return mixed
     */
    public function delete(User $user, ItemCategory $model)
    {
        return $user->hasPermissionTo('delete itemcategories');
    }

    /**
     * Determine whether the user can delete multiple instances of the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemCategory  $model
     * @return mixed
     */
    public function deleteAny(User $user)
    {
        return $user->hasPermissionTo('delete itemcategories');
    }

    /**
     * Determine whether the itemCategory can restore the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemCategory  $model
     * @return mixed
     */
    public function restore(User $user, ItemCategory $model)
    {
        return false;
    }

    /**
     * Determine whether the itemCategory can permanently delete the model.
     *
     * @param  App\Models\User  $user
     * @param  App\Models\ItemCategory  $model
     * @return mixed
     */
    public function forceDelete(User $user, ItemCategory $model)
    {
        return false;
    }
}
