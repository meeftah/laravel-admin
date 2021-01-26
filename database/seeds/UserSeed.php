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
            'name'      => 'Superadmin',
            'username'  => 'superadmin',
            'email'     => 'superadmin@simantap.com',
            'password'  => bcrypt('135246')
        ]);

        $user->assignRole('superadmin');

    }
}
