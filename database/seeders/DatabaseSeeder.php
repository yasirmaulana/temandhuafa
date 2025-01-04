<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PermissionRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'yasir',
        //     'email' => 'yasir@temandhuafa.id',
        // ]);

        User::create([
            'name' => 'yasir',
            'email' => 'yasir@temandhuafa.id',
            'password' => Hash::make('yasir'),
            'role_id' => 1
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@temandhuafa.id',
            'password' => Hash::make('password'),
            'role_id' => 1
        ]);

        Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'Donatur'
        ]);

        Role::create([
            'name' => 'Fundraiser'
        ]);

        Role::create([
            'name' => 'Keuangan'
        ]);

        Role::create([
            'name' => 'Program'
        ]);

        Permission::create([
            'name' => 'Dashboard',
            'slug' => 'Dashboard',
            'groupby' => 0
        ]);

        Permission::create([
            'name' => 'User',
            'slug' => 'User',
            'groupby' => 1
        ]);

        Permission::create([
            'name' => 'Add User',
            'slug' => 'Add User',
            'groupby' => 1
        ]);

        Permission::create([
            'name' => 'Edit User',
            'slug' => 'Edit User',
            'groupby' => 1
        ]);

        Permission::create([
            'name' => 'Delete User',
            'slug' => 'Delete User',
            'groupby' => 1
        ]);

        Permission::create([
            'name' => 'Role',
            'slug' => 'Role',
            'groupby' => 2
        ]);

        Permission::create([
            'name' => 'Add Role',
            'slug' => 'Add Role',
            'groupby' => 2
        ]);

        Permission::create([
            'name' => 'Edit Role',
            'slug' => 'Edit Role',
            'groupby' => 2
        ]);

        Permission::create([
            'name' => 'Delete Role',
            'slug' => 'Delete Role',
            'groupby' => 2
        ]);

        Permission::create([
            'name' => 'Category',
            'slug' => 'Category',
            'groupby' => 3
        ]);

        Permission::create([
            'name' => 'Add Category',
            'slug' => 'Add Category',
            'groupby' => 3
        ]);

        Permission::create([
            'name' => 'Edit Category',
            'slug' => 'Edit Category',
            'groupby' => 3
        ]);

        Permission::create([
            'name' => 'Delete Category',
            'slug' => 'Delete Category',
            'groupby' => 3
        ]);

        Permission::create([
            'name' => 'Campaign',
            'slug' => 'Campaign',
            'groupby' => 4
        ]);

        Permission::create([
            'name' => 'Add Campaign',
            'slug' => 'Add Campaign',
            'groupby' => 4
        ]);

        Permission::create([
            'name' => 'Edit Campaign',
            'slug' => 'Edit Campaign',
            'groupby' => 4
        ]);

        Permission::create([
            'name' => 'Delete Campaign',
            'slug' => 'Delete Campaign',
            'groupby' => 4
        ]);

        Permission::create([
            'name' => 'Donatur',
            'slug' => 'Donatur',
            'groupby' => 5
        ]);

        Permission::create([
            'name' => 'Add Donatur',
            'slug' => 'Add Donatur',
            'groupby' => 5
        ]);

        Permission::create([
            'name' => 'Edit Donatur',
            'slug' => 'Edit Donatur',
            'groupby' => 5
        ]);

        Permission::create([
            'name' => 'Delete Donatur',
            'slug' => 'Delete Donatur',
            'groupby' => 5
        ]);

        Permission::create([
            'name' => 'Donasi',
            'slug' => 'Donasi',
            'groupby' => 6
        ]);

        Permission::create([
            'name' => 'Add Donasi',
            'slug' => 'Add Donasi',
            'groupby' => 6
        ]);

        Permission::create([
            'name' => 'Edit Donasi',
            'slug' => 'Edit Donasi',
            'groupby' => 6
        ]);

        Permission::create([
            'name' => 'Delete Donasi',
            'slug' => 'Delete Donasi',
            'groupby' => 6
        ]);

        Permission::create([
            'name' => 'Fundraiser',
            'slug' => 'Fundraiser',
            'groupby' => 7
        ]);

        Permission::create([
            'name' => 'Add Fundraiser',
            'slug' => 'Add Fundraiser',
            'groupby' => 7
        ]);

        Permission::create([
            'name' => 'Edit Fundraiser',
            'slug' => 'Edit Fundraiser',
            'groupby' => 7
        ]);

        Permission::create([
            'name' => 'Delete Fundraiser',
            'slug' => 'Delete Fundraiser',
            'groupby' => 7
        ]);

        Permission::create([
            'name' => 'Keuangan',
            'slug' => 'Keuangan',
            'groupby' => 8
        ]);

        Permission::create([
            'name' => 'Add Keuangan',
            'slug' => 'Add Keuangan',
            'groupby' => 8
        ]);

        Permission::create([
            'name' => 'Edit Keuangan',
            'slug' => 'Edit Keuangan',
            'groupby' => 8
        ]);

        Permission::create([
            'name' => 'Delete Keuangan',
            'slug' => 'Delete Keuangan',
            'groupby' => 8
        ]);

        PermissionRole::create([
            'role_id' => 1,
            'permission_id' => 6
        ]);

        PermissionRole::create([
            'role_id' => 1,
            'permission_id' => 7
        ]);

        PermissionRole::create([
            'role_id' => 1,
            'permission_id' => 8
        ]);

        PermissionRole::create([
            'role_id' => 1,
            'permission_id' => 9
        ]);
    }
}
