<?php

use App\Models\Sponsorship;
use Illuminate\Database\Seeder;

class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $names = [
        'Silver',
        'Gold',
        'Platinum'
    ];

    private $prices = [
        '1,99',
        '5,99',
        '9,99'
    ];

    private $durations = [
        '24',
        '72',
        '144'
    ];

    public function run()
    {
        for ($i=0; $i<3; $i++) {
            $sponsorship = new Sponsorship;
            $sponsorship -> name = $this -> names[$i];
            $sponsorship -> price = $this -> prices[$i];
            $sponsorship -> duration = $this -> durations[$i];

            $sponsorship -> save();
        }
    }
}
