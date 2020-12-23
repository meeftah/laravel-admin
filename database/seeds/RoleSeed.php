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

            // ------------ Hak Akses Master Data Penghasilan
            'penghasilan_lihat',
            'penghasilan_detail',
            'penghasilan_ubah',
            'penghasilan_tambah',
            'penghasilan_hapus',

            // ------------ Hak Akses Master Data Pekerjaan
            'pekerjaan_lihat',
            'pekerjaan_detail',
            'pekerjaan_ubah',
            'pekerjaan_tambah',
            'pekerjaan_hapus',

            // ------------ Hak Akses Master Data Pendidikan
            'pendidikan_lihat',
            'pendidikan_detail',
            'pendidikan_ubah',
            'pendidikan_tambah',
            'pendidikan_hapus',

            // ------------ Hak Akses Master Data Agama
            'agama_lihat',
            'agama_detail',
            'agama_ubah',
            'agama_tambah',
            'agama_hapus',

            // ------------ Hak Akses Master Data Jarak Tempat Tinggal
            'jarak_lihat',
            'jarak_detail',
            'jarak_ubah',
            'jarak_tambah',
            'jarak_hapus',

            // ------------ Hak Akses Master Data Kondisi Belajar
            'kondisibelajar_lihat',
            'kondisibelajar_detail',
            'kondisibelajar_ubah',
            'kondisibelajar_tambah',
            'kondisibelajar_hapus',

            // ------------ Hak Akses Master Data Baca Quran
            'bcquran_lihat',
            'bcquran_detail',
            'bcquran_ubah',
            'bcquran_tambah',
            'bcquran_hapus',

            // ------------ Hak Akses Master Data Waktu Tempuh
            'waktutmph_lihat',
            'waktutmph_detail',
            'waktutmph_ubah',
            'waktutmph_tambah',
            'waktutmph_hapus',

            // ------------ Hak Akses Virtual Account TK
            'vatk_lihat',
            'vatk_detail',
            'vatk_ubah',
            'vatk_tambah',
            'vatk_hapus',

            // ------------ Hak Akses Virtual Account SD
            'vasd_lihat',
            'vasd_detail',
            'vasd_ubah',
            'vasd_tambah',
            'vasd_hapus',

            // ------------ Hak Akses Virtual Account SMP
            'vasmp_lihat',
            'vasmp_detail',
            'vasmp_ubah',
            'vasmp_tambah',
            'vasmp_hapus',

            // ------------ Hak Akses Virtual Account SMA
            'vasma_lihat',
            'vasma_detail',
            'vasma_ubah',
            'vasma_tambah',
            'vasma_hapus',
        ]);
    }
}
