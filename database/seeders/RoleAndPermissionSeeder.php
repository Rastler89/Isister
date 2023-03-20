<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);

        $adminRole = Role::create(['name' => 'Admin']);

        $adminRole->givePermissionTo([
            'dashboard',
            'create-users',
            'edit-users',
            'delete-users'
        ]);

        $user = User::create([
            'name' => 'Rastler',
            'email' => 'rastler89@gmail.com',
            'password' => bcrypt('password')
        ]);

        $user->assignRole('Admin');
    }
}
