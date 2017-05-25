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
    }
}
