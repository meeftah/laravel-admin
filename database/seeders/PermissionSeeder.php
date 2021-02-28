<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Artisan::call('cache:clear');
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            ['name' => 'permission-bread', 'group' => 'permission'],
            ['name' => 'permission-read', 'group' => 'permission'],
            ['name' => 'permission-edit', 'group' => 'permission'],
            ['name' => 'permission-add', 'group' => 'permission'],
            ['name' => 'permission-delete', 'group' => 'permission'],

            ['name' => 'role-bread', 'group' => 'role'],
            ['name' => 'role-read', 'group' => 'role'],
            ['name' => 'role-edit', 'group' => 'role'],
            ['name' => 'role-add', 'group' => 'role'],
            ['name' => 'role-delete', 'group' => 'role'],

            ['name' => 'user-bread', 'group' => 'user'],
            ['name' => 'user-read', 'group' => 'user'],
            ['name' => 'user-edit', 'group' => 'user'],
            ['name' => 'user-add', 'group' => 'user'],
            ['name' => 'user-delete', 'group' => 'user'],

            ['name' => 'product-bread', 'group' => 'product'],
            ['name' => 'product-read', 'group' => 'product'],
            ['name' => 'product-edit', 'group' => 'product'],
            ['name' => 'product-add', 'group' => 'product'],
            ['name' => 'product-delete', 'group' => 'product'],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission['name'],
                'group' => $permission['group'],
            ]);
        }
    }
}
