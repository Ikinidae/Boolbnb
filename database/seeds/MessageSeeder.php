<?php

use App\Models\Apartment;
use App\Models\Message;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

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
            $apartment_ids = Apartment::all()->pluck('id');
            $message -> apartment_id = $faker->randomElement($apartment_ids);

            $message -> text = $faker -> text(rand(5,500));
            $message -> name = $faker -> name();
            $message -> surname = $faker -> lastName();
            $message -> email = $faker -> email();
            $message -> save();
        }
    }
}
