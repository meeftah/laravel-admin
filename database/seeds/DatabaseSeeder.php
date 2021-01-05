<?php

use App\Models\Jarak;
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
        $this->call(JarakTableSeed::class);
        $this->call(BcquranTableSeed::class);
        $this->call(KondisibelajarTableSeed::class);
        $this->call(PendidikanTableSeed::class);
        $this->call(PenghasilanTableSeed::class);
        $this->call(WaktutmphTableSeed::class);
        $this->call(transporttasiseed::class);
        $this->call(tempattinggalseed::class);
        $this->call(UnitTableSeed::class);
        $this->call(TahunAjaranTableSeed::class);
        $this->call(StatusCasisTableSeed::class);
        $this->call(StatusPendaftaranTableSeed::class);
        $this->call(JenisDokumenSeed::class);
    }
}
