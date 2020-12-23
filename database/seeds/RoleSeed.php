<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeed extends Seeder
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
            'users_lihat',
            'users_detail',
            'users_ubah',
            'users_tambah',
            'users_hapus',

            'roles_lihat',
            'roles_detail',
            'roles_ubah',
            'roles_tambah',
            'roles_hapus',
            
            'permissions_lihat',
            'permissions_detail',
            'permissions_ubah',
            'permissions_tambah',
            'permissions_hapus',
        ]);
    }
}
