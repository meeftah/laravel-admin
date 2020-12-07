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
            'name' => 'Superadmin',
            'email' => 'superadmin@alfityankuburaya.sch.id',
            'password' => bcrypt('13524')
        ]);

        $user->assignRole('superadmin');

    }
}
