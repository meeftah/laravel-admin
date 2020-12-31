<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'username' => 'superadmin',
            'email' => 'superadmin@alfityankuburaya.sch.id',
            'nohp' => '00000000000',
            'password' => bcrypt('135246')
        ]);

        $user->assignRole('superadmin');

    }
}
