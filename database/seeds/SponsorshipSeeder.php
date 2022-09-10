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

    // private $names = [

    //     'Gold',
    //     'Platinum'
    // ];

    // private $prices = [

    //     '5,99',
    //     '9,99'
    // ];

    // private $durations = [
    //     '24',
    //     '72',
    //     '144'
    // ];

    public function run()
    {
        $sponsorships = [
            [
                'name' => 'Silver',
                'price' => 1,99,
                'duration' => 24
            ],
            [
                'name' => 'Gold',
                'price' => 5,99,
                'duration' => 72
            ],
            [
                'name' => 'Platinum',
                'price' => 9,99,
                'duration' => 144
            ]
        ];

        foreach ($sponsorships as $sponsorship) {
            Sponsorship::create([
                $sponsorship
            ]);
        }

    //     for ($i=0; $i<3; $i++) {
    //         $sponsorship = new Sponsorship;
    //         $sponsorship -> name = $this -> names[$i];
    //         $sponsorship -> price = $this -> prices[$i];
    //         $sponsorship -> duration = $this -> durations[$i];

    //         $sponsorship -> save();
    //     }
    // }
}
