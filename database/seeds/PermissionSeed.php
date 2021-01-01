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

        $items = [
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

            // ------------ Hak Akses Profil Calon Siswa
            ['id' => '785f3c74-23f6-45f7-ad92-db38a57a0c21', 'name' => 'profilcalonsiswa_lihat'],
            ['id' => '4182a037-7fae-41f4-b435-a52c5cff0eba', 'name' => 'profilcalonsiswa_detail'],
            ['id' => 'fc2ee65a-871a-4e29-8e8a-8f792e114bbc', 'name' => 'profilcalonsiswa_ubah'],
            ['id' => '21493810-881c-4c2d-810a-632ff14a328f', 'name' => 'profilcalonsiswa_tambah'],
            ['id' => '1dd2793d-59ed-474d-be96-0acaf539b117', 'name' => 'profilcalonsiswa_hapus'],

            // ------------ Hak Akses Master Data Penghasilan
            ['id' => 'f850fb20-4c34-4518-988b-0ab7d1d99ded', 'name' => 'penghasilan_lihat'],
            ['id' => 'd9e42693-a750-4853-9e51-d985600841ae', 'name' => 'penghasilan_detail'],
            ['id' => '0392cd6d-e499-4946-b708-b9cb72363fe4', 'name' => 'penghasilan_ubah'],
            ['id' => '35b6b46e-5e32-40d3-b709-fb136b337c45', 'name' => 'penghasilan_tambah'],
            ['id' => '3965611b-8809-44e5-87b0-31059823e5fe', 'name' => 'penghasilan_hapus'],

            // ------------ Hak Akses Master Data Pekerjaan
            ['id' => '79ab6481-64e6-4e09-be6a-e26b30bcda58', 'name' => 'pekerjaan_lihat'],
            ['id' => '4b540416-d2e2-456f-a7eb-3472e25ce6ee', 'name' => 'pekerjaan_detail'],
            ['id' => 'f472d0cf-661d-4706-be4b-cd195f6e826e', 'name' => 'pekerjaan_ubah'],
            ['id' => '66268f57-fdd3-445f-93ed-724fe16e6d7f', 'name' => 'pekerjaan_tambah'],
            ['id' => '3bcd3efd-c9c6-4260-8e5d-ab464a6bdf33', 'name' => 'pekerjaan_hapus'],

            // ------------ Hak Akses Master Data Pendidikan
            ['id' => '7e233829-e7d3-4ed2-8f05-c8dd0083b23e', 'name' => 'pendidikan_lihat'],
            ['id' => '480d1401-cc1c-4543-b1a8-5b9d2902f798', 'name' => 'pendidikan_detail'],
            ['id' => '7f2f9c2b-8144-47af-b4cb-84cef6fcbae3', 'name' => 'pendidikan_ubah'],
            ['id' => '00012d90-242d-4334-821c-8850cf13ddfb', 'name' => 'pendidikan_tambah'],
            ['id' => '79cb7ea6-8929-4492-9db4-9fb99992757f', 'name' => 'pendidikan_hapus'],

            // ------------ Hak Akses Master Data Agama
            ['id' => 'b35d797a-7b56-49ef-be4c-37c2b66c1c48', 'name' => 'agama_lihat'],
            ['id' => '1c2208f8-877a-410e-97e4-c992465a4939', 'name' => 'agama_detail'],
            ['id' => '5f4631d4-f319-454d-9e63-836cc284ea4c', 'name' => 'agama_ubah'],
            ['id' => '4a1514c1-fc90-44df-8127-9809ddf7eb01', 'name' => 'agama_tambah'],
            ['id' => '49f10494-95f2-4c1b-a6a0-ed7c72a368bc', 'name' => 'agama_hapus'],

            // ------------ Hak Akses Master Data Jarak Tempat Tinggal
            ['id' => '9f315ca3-8a03-41f2-a7ad-207125d96a42', 'name' => 'jarak_lihat'],
            ['id' => 'b183d072-27ee-4907-bc33-86c9fd40edee', 'name' => 'jarak_detail'],
            ['id' => 'aa372dcf-4d4e-4704-8982-008262cf8744', 'name' => 'jarak_ubah'],
            ['id' => '8f83d7ff-13e3-42f8-8dea-eebe7205856a', 'name' => 'jarak_tambah'],
            ['id' => '946d77b2-14cf-4132-81a3-cde22d1dd3a3', 'name' => 'jarak_hapus'],

            // ------------ Hak Akses Master Data Kondisi Belajar
            ['id' => 'ef79683b-d6e1-43fb-aa0f-c5b2f79cc1b5', 'name' => 'kondisibelajar_lihat'],
            ['id' => 'a57c8495-cc78-4934-8818-f7a05aefe56a', 'name' => 'kondisibelajar_detail'],
            ['id' => '4602aca2-bfa0-4c96-9c6f-2aa53444b85b', 'name' => 'kondisibelajar_ubah'],
            ['id' => 'ed19c23d-e387-46ca-a11b-543efccc615c', 'name' => 'kondisibelajar_tambah'],
            ['id' => '4b872bbf-6996-40bb-8f1e-e25fb9a9e753', 'name' => 'kondisibelajar_hapus'],

            // ------------ Hak Akses Master Data Baca Quran
            ['id' => 'def751b8-48c8-4551-a46e-56ee42f6f616', 'name' => 'bcquran_lihat'],
            ['id' => '3d6f41de-d4ae-4001-b08f-405937865122', 'name' => 'bcquran_detail'],
            ['id' => '9e9d53c6-dff9-44e6-b0d3-3df8653d2565', 'name' => 'bcquran_ubah'],
            ['id' => 'e95be206-a184-48cb-be5a-1e6e85a1f7a2', 'name' => 'bcquran_tambah'],
            ['id' => '81cc3fe0-3e42-45a5-847b-09260be95251', 'name' => 'bcquran_hapus'],

            // ------------ Hak Akses Master Data Waktu Tempuh
            ['id' => '7cd416d9-bc99-426c-9bc3-9f905a211dc7', 'name' => 'waktutmph_lihat'],
            ['id' => '7412017e-9f67-45bb-acc2-111d3db5f6e2', 'name' => 'waktutmph_detail'],
            ['id' => '33782446-68b2-4c23-8dad-f23158aa2969', 'name' => 'waktutmph_ubah'],
            ['id' => '05ff849d-bccf-4bc9-8b77-e6474550714b', 'name' => 'waktutmph_tambah'],
            ['id' => 'cce3c3ba-fb19-412e-8335-cb4b4a9f7a15', 'name' => 'waktutmph_hapus'],

            // ------------ Hak Akses Master Data Jenis Dokumen
            ['id' => '9b09f8f5-0a2f-4691-903a-6dd1ce0ee29b', 'name' => 'jenisdokumen_lihat'],
            ['id' => '309cfd0c-77e4-4189-8d61-51c05d5f9d9c', 'name' => 'jenisdokumen_detail'],
            ['id' => '1ee1d19b-3484-4f4a-92b7-d39681625dc2', 'name' => 'jenisdokumen_ubah'],
            ['id' => 'a0d4b0da-a9c1-4908-be1c-fc45d308e913', 'name' => 'jenisdokumen_tambah'],
            ['id' => '5b1cba8b-3129-4c31-b112-44751090e449', 'name' => 'jenisdokumen_hapus'],

            // ------------ Hak Akses Master Data Transportasi
            ['id' => '5ed4c472-3a8f-4b3a-8a0f-37b4289ff554', 'name' => 'transportasi_lihat'],
            ['id' => '4832a512-f8ab-4744-b6d1-c35c5c4d51a1', 'name' => 'transportasi_detail'],
            ['id' => 'a50953b1-c486-45ca-9d75-8485c8e9142e', 'name' => 'transportasi_ubah'],
            ['id' => 'c0a1d434-49d1-4854-8845-9e83c9bca42c', 'name' => 'transportasi_tambah'],
            ['id' => '8330b31f-5d29-4ed7-95bd-3fc96fc47b5c', 'name' => 'transportasi_hapus'],

            // ------------ Hak Akses Master Data Tempat Tinggal
            ['id' => 'a4b5dfd7-477b-45e4-801f-a7fc3b061e7d', 'name' => 'tempattinggal_lihat'],
            ['id' => '4b3fa493-b853-4f20-b9a3-20506b74974a', 'name' => 'tempattinggal_detail'],
            ['id' => '80c698d4-408a-4feb-9940-b2d32fa09f43', 'name' => 'tempattinggal_ubah'],
            ['id' => 'd9677ac4-7038-47f5-b90d-ffcabb63e936', 'name' => 'tempattinggal_tambah'],
            ['id' => '09c18ef5-ecf3-4cb6-bf2e-2ff96229f7db', 'name' => 'tempattinggal_hapus'],

            // ------------ Hak Akses Virtual Account TK
            ['id' => '21874164-93a4-40a9-b13f-121d9d7b1ba7', 'name' => 'vatk_lihat'],
            ['id' => '18dd4c82-ca9a-48a3-bdb0-2a9721c6568b', 'name' => 'vatk_detail'],
            ['id' => '55e12ae0-cdab-400d-82c0-b88247dbf4bd', 'name' => 'vatk_ubah'],
            ['id' => '7c6ee0c0-349a-4da0-9a14-b948911b0502', 'name' => 'vatk_tambah'],
            ['id' => 'b92be286-9b05-4626-802e-aaec6fb12216', 'name' => 'vatk_hapus'],

            // ------------ Hak Akses Virtual Account SD
            ['id' => '61dd689b-c02c-4833-8efb-ea5c79dc708e', 'name' => 'vasd_lihat'],
            ['id' => '500fea41-d81c-4a19-b138-0dc5487bdd43', 'name' => 'vasd_detail'],
            ['id' => '0a31818c-f6b7-4f74-80d3-a2afab60d778', 'name' => 'vasd_ubah'],
            ['id' => '8a503ea7-1443-465e-8e68-a0d90ab09999', 'name' => 'vasd_tambah'],
            ['id' => '2dcd9b3c-c430-4b67-b218-fd0c6c339140', 'name' => 'vasd_hapus'],

            // ------------ Hak Akses Virtual Account SMP
            ['id' => '2d88a2fd-947a-4a57-abc4-3b93796d2c96', 'name' => 'vasmp_lihat'],
            ['id' => '58439007-80c8-4e0d-a2c2-dc4f53d0badd', 'name' => 'vasmp_detail'],
            ['id' => '1a36a069-3bff-4491-bfb6-6496e3f76ae8', 'name' => 'vasmp_ubah'],
            ['id' => '4def8744-7ff8-4d7f-9b27-e53483d5de4b', 'name' => 'vasmp_tambah'],
            ['id' => '04f9099d-61f7-4720-97ff-17eb1fc9d9ea', 'name' => 'vasmp_hapus'],

            // ------------ Hak Akses Virtual Account SMA
            ['id' => 'ba958ac8-b88c-4cde-a581-650b8927074a', 'name' => 'vasma_lihat'],
            ['id' => '0368faa7-d151-4b4c-be58-0d4e4e2b20cf', 'name' => 'vasma_detail'],
            ['id' => '6934acd9-bcbd-46f7-8bf1-1d4cd80b2062', 'name' => 'vasma_ubah'],
            ['id' => '01001a8d-443b-44b6-be4f-000f4a953217', 'name' => 'vasma_tambah'],
            ['id' => '9dce27a2-23f7-442d-845e-d451b0bde8d9', 'name' => 'vasma_hapus'],

            // FRONTEND
            // ------------ Slider
            ['id' => '365b008a-8856-436f-93d2-9f5269d40c75', 'name' => 'slidefrontend_lihat'],
            ['id' => '01fcd66a-e643-4337-ab3b-4fbec6069735', 'name' => 'slidefrontend_detail'],
            ['id' => 'a29a60dc-be47-4ffe-ba6e-106f3c8e3ef0', 'name' => 'slidefrontend_ubah'],
            ['id' => '96892368-f739-4519-adb5-4778ced2d3fa', 'name' => 'slidefrontend_tambah'],
            ['id' => '9db4c917-8c32-4b8a-8af0-2d140701c155', 'name' => 'slidefrontend_hapus'],

        ];

        Permission::insert($items);
    }
}
