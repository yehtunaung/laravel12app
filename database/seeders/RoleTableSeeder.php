<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'Admin',
                'role_type' => '‌admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'Super Admin',
                'role_type' => 'super_admin',
                'guard_name' => 'web'
            ],
            [
                'name' => 'User',
                'role_type' => 'user',
                'guard_name' => 'web'
            ]
        ];
        foreach ($roles as $role) {
            Role::create([
                'name' => $role['name'],
                'role_type' => $role['role_type'],
                'guard_name' => $role['guard_name'],
                'is_active' => 1,
            ]);
        }
    }
}
