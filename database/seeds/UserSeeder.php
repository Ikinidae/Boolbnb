<?php

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user -> email = 'asdf@asdf.com';
        $user -> password = Hash::make('asdfasdf');
        $user -> name = 'Team 4';
        $user -> save();

        for ($i=0; $i<10; $i++) {
            $user = new User();
            $user -> name = $faker -> name();
            $user -> surname = $faker -> lastName();
            $user -> birthdate = $faker -> date('Y_m_d');
            $user -> email = $faker -> email();
            $password = $faker -> word();
            $user -> password = Hash::make($password);

            $user -> save();
        }
    }
}
