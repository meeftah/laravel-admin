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
        $roleSuperadmin = Role::create(['name' => 'superadmin']);
        $roleSuperadmin->givePermissionTo([
            // ------------ Users Permission
            'users_lihat',
            'users_detail',
            'users_ubah',
            'users_tambah',
            'users_hapus',

            // ------------ Roles Permission
            'roles_lihat',
            'roles_detail',
            'roles_ubah',
            'roles_tambah',
            'roles_hapus',

            // ------------ Permissions Permission
            'permissions_lihat',
            'permissions_detail',
            'permissions_ubah',
            'permissions_tambah',
            'permissions_hapus',

            // ------------ Info Tambahan
            'info-tambahan_lihat',
            'info-tambahan_detail',
            'info-tambahan_ubah',
            'info-tambahan_tambah',
            'info-tambahan_hapus',

            // ------------ Info Tambahan detail
            'info-tambahan-detail_lihat',
            'info-tambahan-detail_detail',
            'info-tambahan-detail_ubah',
            'info-tambahan-detail_tambah',
            'info-tambahan-detail_hapus',
        ]);

        $roleUser = Role::create(['name' => 'user']);
        $roleUser->givePermissionTo([
            // ------------ Info Tambahan
            'info-tambahan_lihat',
            'info-tambahan_detail',

            // ------------ Info Tambahan detail
            'info-tambahan-detail_lihat',
            'info-tambahan-detail_detail',
        ]);
    }
}
