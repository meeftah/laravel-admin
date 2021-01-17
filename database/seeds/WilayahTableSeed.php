<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Process\Process;

class WilayahTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // =============================================================
        // file Path -> Project/app/configs/database.php
        // get the database name, database username, database password
        // =============================================================
        $db     = \Config::get('database.connections.mysql.database');
        $user   = \Config::get('database.connections.mysql.username');
        $pass   = \Config::get('database.connections.mysql.password');
        $path   = 'database/seeds/tbl_wilayah.sql';

        // $this->command->info($db);
        // $this->command->info($user);
        // $this->command->info($pass);
        
        exec("mysql -u " . $user . " -p" . $pass . " " . $db . " < " . $path);
    }
}
