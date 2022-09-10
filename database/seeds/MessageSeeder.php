<?php

use App\Models\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<50; $i++) {
            $message = new Message();
            // va messa questa riga?
            // $message -> apartments_id = $faker -> ;

            $message -> text = $faker -> text(rand(5,500));
            $message -> name = $faker -> name();
            $message -> surname = $faker -> lastName();
            $message -> email = $faker -> email();
            $message -> save();
        }
    }
}
