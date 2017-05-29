<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Daron Adkins',
            'email' => 'daron.adkins@gmail.com',
            'password' => bcrypt('23wesdxc'),
            'facility' => 'Demo'

        ]);
        User::create([
           'name' => 'Stefan Grantcharov',
            'email' => 'usahsllc@aol.com',
            'password' => bcrypt('0nPoint'),
            'facility' => 'Demo'
        ]);

        User::create([
            'name' => 'Karen Hall',
            'email' => 'vpo@keetoncorrections.com',
            'password' => bcrypt('Demo123'),
            'facility' => 'Demo'
        ]);

        User::create([
            'name' => 'Dylan Johnston',
            'email' => 'dylan@kerigan.com',
            'password' => bcrypt('Demo123'),
            'facility' => 'Demo'
        ]);
    }
}
