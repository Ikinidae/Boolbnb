<?php

use App\Models\Apartment;
use App\Models\Visit;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class VisitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i<50; $i++) {
            $visit = new Visit();
            $apartments_id = Apartment::all()->pluck('id');

            $visit -> apartments_id = $faker ->randomElement('apartments_id') ;
            $visit -> date = $faker -> date('Y_m_d');
            $visit -> ip_adress = $faker -> localIpv4();
            $visit -> save();
        }
    }
}
