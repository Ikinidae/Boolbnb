<?php

use App\Models\Apartment;
use App\Models\Sponsorship;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ApartmentSponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $apartments = Apartment::all();
        $sponsorships = Sponsorship::all()->pluck('id');
        $nSponsorships = count($sponsorships);

        foreach ($apartments as $apartment) {
            $apartmentSponsorships = $faker->randomElements($sponsorships, rand(0, $nSponsorships));
            foreach ($apartmentSponsorships as $sponsorshipId) {
                $apartment->sponsorships()->attach($sponsorshipId);
            }
        }
    }
}
