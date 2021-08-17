<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list ressections']);
        Permission::create(['name' => 'view ressections']);
        Permission::create(['name' => 'create ressections']);
        Permission::create(['name' => 'update ressections']);
        Permission::create(['name' => 'delete ressections']);

        Permission::create(['name' => 'list rescategories']);
        Permission::create(['name' => 'view rescategories']);
        Permission::create(['name' => 'create rescategories']);
        Permission::create(['name' => 'update rescategories']);
        Permission::create(['name' => 'delete rescategories']);

        Permission::create(['name' => 'list ressalestables']);
        Permission::create(['name' => 'view ressalestables']);
        Permission::create(['name' => 'create ressalestables']);
        Permission::create(['name' => 'update ressalestables']);
        Permission::create(['name' => 'delete ressalestables']);

        Permission::create(['name' => 'list stocktables']);
        Permission::create(['name' => 'view stocktables']);
        Permission::create(['name' => 'create stocktables']);
        Permission::create(['name' => 'update stocktables']);
        Permission::create(['name' => 'delete stocktables']);

        Permission::create(['name' => 'list resproducts']);
        Permission::create(['name' => 'view resproducts']);
        Permission::create(['name' => 'create resproducts']);
        Permission::create(['name' => 'update resproducts']);
        Permission::create(['name' => 'delete resproducts']);

        Permission::create(['name' => 'list stockdischarges']);
        Permission::create(['name' => 'view stockdischarges']);
        Permission::create(['name' => 'create stockdischarges']);
        Permission::create(['name' => 'update stockdischarges']);
        Permission::create(['name' => 'delete stockdischarges']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
