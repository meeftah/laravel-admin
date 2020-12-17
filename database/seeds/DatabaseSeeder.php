<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeed::class);
        $this->call(RoleSeed::class);
        $this->call(UserSeed::class);
        $this->call(PekerjaanTableSeed::class);
        $this->call(AgamaTableSeed::class);
        $this->call(AlamatTableSeed::class);
        $this->call(BcquranTableSeed::class);
        $this->call(KondisibelajarTableSeed::class);
        $this->call(PendidikanTableSeed::class);
        $this->call(PenghasilanTableSeed::class);
    }
}
