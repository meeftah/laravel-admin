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
            'id'        => '80453642-017d-44ef-9eab-d6d1e7c203b2',
            'name'      => 'Superadmin',
            'username'  => 'superadmin',
            'email'     => 'superadmin@simantap.com',
            'password'  => bcrypt('135246')
        ]);

        $user->assignRole('superadmin');

    }
}
