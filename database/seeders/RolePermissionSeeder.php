<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // For Admin Role
        $admin_permissions = Permission::where('guard_name', 'web')
            ->whereIn('name', [
                'admin-dashboard',
                'admin-dashboard-delete',
                'admin-dashboard-edit',
            ])->get();

        $admin_role = Role::where('role_type', 'admin')->where('guard_name', 'web')->first();
        $admin_role?->givePermissionTo($admin_permissions);


        // For Super Admin Role
        $super_admin_permissions = Permission::where('guard_name', 'web')
            ->whereIn('name', [
                'admin-dashboard',
            ])->get();

        $super_admin_role = Role::where('role_type', 'super_admin')->where('guard_name', 'web')->first();
        $super_admin_role?->givePermissionTo($super_admin_permissions);


        // For User Role
        $user_permissions = Permission::where('guard_name', 'web')
            ->whereIn('name', [
                'user-dashboard',
            ])->get();

        $user_role = Role::where('role_type', 'user')->where('guard_name', 'web')->first();
        $user_role?->givePermissionTo($user_permissions);
    }
}
