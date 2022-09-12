<?php

use App\Models\User;
use App\Models\Apartment;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<20; $i++) {
            $apartment =new Apartment();
            $user_ids = User::all()->pluck('id');

            $apartment -> user_id = $faker->randomElement($user_ids);
            $apartment -> title = $faker -> text(rand(5,100));
            $apartment -> description = $faker -> text(rand(5,500));
            $apartment -> price = rand(25,150);
            $apartment -> rooms = rand(1,9);
            $apartment -> beds = rand(1,10);
            $apartment -> bathrooms = rand(1,10);
            $apartment -> mq = rand(30,150);
            $apartment -> address = $faker -> address();
            $apartment -> latitude = $faker -> randomFloat(5,-90,90);
            $apartment -> longitude = $faker -> randomFloat(5,-180,180);
            $apartment -> image = 'https://www.startpreventivi.it/wp-content/themes/Avada-Child-Theme/images/Blog/Case-Appartamenti/Appartamento-moderno-elegante/' . rand(1, 15) . '-appartamento-moderno-elegante.jpg';
            $apartment -> visible = $faker -> boolean();
            $apartment -> save();
        }

    }

}
