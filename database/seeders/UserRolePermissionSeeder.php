<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    public function run()
    {
        // For Admin Model
        $admin = User::first(); // or create a dummy admin
        $adminRole = Role::where('role_type', 'admin')->where('guard_name', 'web')->first();
        $admin?->assignRole($adminRole);

        $superAdmin = User::findOrFail(2); // or create a dummy Super admin
        $superAdminRole = Role::where('role_type', 'super_admin')->where('guard_name', 'web')->first();
        $superAdmin?->assignRole($superAdminRole);

        $user = User::findOr(3); // or create a dummy User
        $userRole = Role::where('role_type', 'user')->where('guard_name', 'web')->first();
        $user?->assignRole($userRole);


    }
}
