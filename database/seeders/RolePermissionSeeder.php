<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = Permission::all();

        $admin = Role::where('name', 'Admin')->first();
        $operator = Role::where('name', 'Operator')->first();
        $viewer = Role::where('name', 'Viewer')->first();

        // Admin punya semua permission
        $admin->permissions()->sync($permissions->pluck('id'));

        // Operator hanya boleh manage aset
        $operator->permissions()->sync(
            $permissions->filter(fn ($p) => str_contains($p->name, 'profile'))->pluck('id')
        );

        // Viewer hanya boleh read
        $viewer->permissions()->sync(
            $permissions->filter(fn ($p) => str_starts_with($p->name, 'profile'))->pluck('id')
        );
    }
}
