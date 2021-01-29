<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeed extends Seeder
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

        $manajemenUser = [
            // ------------ Users Permission
            ['id' => '1e2b5577-dffc-467c-af24-7e3d34e52dbd', 'name' => 'users_lihat'],
            ['id' => 'c6f4d1f3-f106-49bc-bec8-56b4b46e2d9c', 'name' => 'users_detail'],
            ['id' => '571d2a0f-fe77-4ec2-b778-d85a5cd9c5f4', 'name' => 'users_ubah'],
            ['id' => 'b44106cb-2eaa-4fb9-b587-59604ae421d7', 'name' => 'users_tambah'],
            ['id' => 'ac9e4f6a-acb2-47d0-84e9-138f86b07a9e', 'name' => 'users_hapus'],

            // ------------ Roles Permission
            ['id' => '485b1256-3175-4bdb-9a86-07c0fe4fce42', 'name' => 'roles_lihat'],
            ['id' => '5c45396b-1ada-4693-a346-f62485ea3f7a', 'name' => 'roles_detail'],
            ['id' => 'e97c6094-76ff-4355-bf20-21be33d22a5f', 'name' => 'roles_ubah'],
            ['id' => 'b9852f9e-ca9f-4071-919c-253b5a792694', 'name' => 'roles_tambah'],
            ['id' => '393fb7df-5b7b-422a-b94f-ede6cc8b5d37', 'name' => 'roles_hapus'],

            // ------------ Permissions Permission
            ['id' => 'c3e6020b-c144-447b-abd0-18ec64b9aa68', 'name' => 'permissions_lihat'],
            ['id' => '1378ac0d-6376-4092-b2c7-6508f83178a2', 'name' => 'permissions_detail'],
            ['id' => '78bb67ba-8cd5-40c6-b858-d323142671e6', 'name' => 'permissions_ubah'],
            ['id' => '5e7ea066-320c-48e7-99a9-3940d10f39d1', 'name' => 'permissions_tambah'],
            ['id' => '27b80a26-7696-48fe-93a3-1af8c3b48601', 'name' => 'permissions_hapus'],
        ];
        Permission::insert($manajemenUser);

        $items = [
            // ------------ Info Tambahan
            ['name' => 'info-tambahan_lihat'],
            ['name' => 'info-tambahan_detail'],
            ['name' => 'info-tambahan_ubah'],
            ['name' => 'info-tambahan_tambah'],
            ['name' => 'info-tambahan_hapus'],
            ['name' => 'info-tambahan-sub_tambah'],
        ];
        foreach ($items as $item) {
            Permission::create(['name' => $item['name']]);
        }
    }
}
