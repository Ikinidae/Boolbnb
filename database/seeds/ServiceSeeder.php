<?php

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public $services = [
        'Pool',
        'WiFi',
        'Jacuzzi tub',
        'Safe',
        'Park',
        'Sauna',
        'Sea View',
        'Reception'
    ];

    public function run()
    {
        $services = [
            'Pool',
            'WiFi',
            'Jacuzzi tub',
            'Safe',
            'Park',
            'Sauna',
            'Sea View',
            'Reception'
        ];

        // for ($i=0; $i<count($this->services); $i++) {
        //     $service = new Service();
        //     $service -> name = $this->services[$i];
        //     $service -> save();
        // }

        foreach ($services as $service) {
            Service::create([
                'name' => $service
            ]);
        }
    }
}
