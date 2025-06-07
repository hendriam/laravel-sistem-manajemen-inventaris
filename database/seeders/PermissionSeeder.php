<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'create-role', 'read-role', 'update-role', 'delete-role',
            'create-permission', 'read-permission', 'update-permission', 'delete-permission', 'assign-permission',
            'create-user', 'read-user', 'update-user', 'delete-user',
            'create-inventory', 'read-inventory', 'update-inventory', 'delete-inventory',
            'profile-show', 'profile-edit',
            'create-category', 'read-category', 'update-category', 'delete-category',
            'create-location', 'read-location', 'update-location', 'delete-location',
            'create-transaction-in', 'read-transaction-in', 'update-transaction-in', 'delete-transaction-in', 'show-transaction-in',
        ];

        foreach ($permissions as $name) {
            Permission::firstOrCreate(['name' => $name]);
        }
    }
}
