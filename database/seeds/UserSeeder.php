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
        for ($i=0; $i<50; $i++) {
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
