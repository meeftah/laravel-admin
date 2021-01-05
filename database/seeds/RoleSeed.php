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

            // ------------ Hak Akses Master Data Jenis Dokumen
            'jenisdokumen_lihat',
            'jenisdokumen_detail',
            'jenisdokumen_ubah',
            'jenisdokumen_tambah',
            'jenisdokumen_hapus',

            // ------------ Hak Akses Master Data Tempat Tinggal
            'tempattinggal_lihat',
            'tempattinggal_detail',
            'tempattinggal_ubah',
            'tempattinggal_tambah',
            'tempattinggal_hapus',

            // ------------ Hak Akses Master Data Transportasi
            'transportasi_lihat',
            'transportasi_detail',
            'transportasi_ubah',
            'transportasi_tambah',
            'transportasi_hapus',

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

            // ------------ Calon Siswa TKIT
            'casistk_lihat',
            'casistk_detail',
            'casistk_ubah',
            'casistk_tambah',
            'casistk_hapus',
            'casistk_verifikasi',

            // ------------ Calon Siswa SDIT
            'casissd_lihat',
            'casissd_detail',
            'casissd_ubah',
            'casissd_tambah',
            'casissd_hapus',
            'casissd_verifikasi',

            // ------------ Calon Siswa SMPIT
            'casissmp_lihat',
            'casissmp_detail',
            'casissmp_ubah',
            'casissmp_tambah',
            'casissmp_hapus',
            'casissmp_verifikasi',

            // ------------ Calon Siswa SMAIT
            'casissma_lihat',
            'casissma_detail',
            'casissma_ubah',
            'casissma_tambah',
            'casissma_hapus',
            'casissma_verifikasi',

            // FRONTEND
            // ------------ Slider
            'slidefrontend_lihat',
            'slidefrontend_detail',
            'slidefrontend_ubah',
            'slidefrontend_tambah',
            'slidefrontend_hapus',
        ]);

        $calonSiswaTK = Role::create(['name' => 'Calon Siswa TK']);
        $calonSiswaTK->givePermissionTo([
            // ------------ Hak Akses Profil Calon Siswa
            'profilcalonsiswa_lihat',
            'profilcalonsiswa_detail',
            'profilcalonsiswa_ubah',
            'profilcalonsiswa_tambah',
            'profilcalonsiswa_hapus',
        ]);

        $calonSiswaSD = Role::create(['name' => 'Calon Siswa SD']);
        $calonSiswaSD->givePermissionTo([
            // ------------ Hak Akses Profil Calon Siswa
            'profilcalonsiswa_lihat',
            'profilcalonsiswa_detail',
            'profilcalonsiswa_ubah',
            'profilcalonsiswa_tambah',
            'profilcalonsiswa_hapus',
        ]);

        $calonSiswaSMP = Role::create(['name' => 'Calon Siswa SMP']);
        $calonSiswaSMP->givePermissionTo([
            // ------------ Hak Akses Profil Calon Siswa
            'profilcalonsiswa_lihat',
            'profilcalonsiswa_detail',
            'profilcalonsiswa_ubah',
            'profilcalonsiswa_tambah',
            'profilcalonsiswa_hapus',
        ]);

        $calonSiswaSMA = Role::create(['name' => 'Calon Siswa SMA']);
        $calonSiswaSMA->givePermissionTo([
            // ------------ Hak Akses Profil Calon Siswa
            'profilcalonsiswa_lihat',
            'profilcalonsiswa_detail',
            'profilcalonsiswa_ubah',
            'profilcalonsiswa_tambah',
            'profilcalonsiswa_hapus',
        ]);
    }
}
