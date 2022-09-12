<?php

use App\Models\Service;
use App\Models\Apartment;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ApartmentServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();
        $services = Service::all()->pluck('id');
        $nServices = count($services);

        foreach ($apartments as $apartment) {
            $apartmentServices = $faker->randomElements($services, rand(0, $nServices));
            foreach ($apartmentServices as $serviceId) {
                $apartment->services()->attach($serviceId);
            }
        }

    }
}
