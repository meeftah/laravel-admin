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

            // ------------ Info Tambahan daftar
            'info-tambahan-daftar_lihat',
            'info-tambahan-daftar_detail',
            'info-tambahan-daftar_ubah',
            'info-tambahan-daftar_tambah',
            'info-tambahan-daftar_hapus',

            // ------------ Info Tambahan daftar detail
            'info-tambahan-daftar-detail_lihat',
            'info-tambahan-daftar-detail_detail',
            'info-tambahan-daftar-detail_ubah',
            'info-tambahan-daftar-detail_tambah',
            'info-tambahan-daftar-detail_hapus',
        ]);
    }
}
