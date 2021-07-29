<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */

    public function run()
    {
        $permissions = [
            'role-list', 'role-create', 'role-edit', 'role-delete',
            'users-list', 'users-create', 'users-edit', 'users-delete',
            'propriete-list', 'propriete-create', 'propriete-edit', 'propriete-delete',
            'category-list', 'category-create', 'category-edit', 'category-delete',
            'visits-list', 'visits-create', 'visits-edit', 'visits-delete',
            'agents-list', 'agents-create', 'agents-edit', 'agents-delete',
            'comments-list', 'comments-show',
            'dashboard','compte'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
