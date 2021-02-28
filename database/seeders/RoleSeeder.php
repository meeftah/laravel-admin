<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'superadmin']);
        $role->givePermissionTo([
            'permission-bread',
            'permission_read',
            'permission_edit',
            'permission_add',
            'permission_delete',

            'role-bread',
            'role_read',
            'role_edit',
            'role_add',
            'role_delete',

            'user-bread',
            'user_read',
            'user_edit',
            'user_add',
            'user_delete',

            'product-bread',
            'product_read',
            'product_edit',
            'product_add',
            'product_delete',
        ]);
    }
}
