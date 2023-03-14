<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'create-users']);
        Permission::create(['name' => 'edit-users']);
        Permission::create(['name' => 'delete-users']);
        Permission::create(['']);

        $adminRole = Role::create(['name' => 'Admin']);

        $adminRole->givePermissionTo([
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
