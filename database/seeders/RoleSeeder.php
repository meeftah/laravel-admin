<?php

namespace Database\Seeders;

use App\Models\Dashboard\Role;
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
            'permission-read',
            'permission-edit',
            'permission-add',
            'permission-delete',

            'role-bread',
            'role-read',
            'role-edit',
            'role-add',
            'role-delete',

            'user-bread',
            'user-read',
            'user-edit',
            'user-add',
            'user-delete',

            'product-bread',
            'product-read',
            'product-edit',
            'product-add',
            'product-delete',
        ]);
    }
}
