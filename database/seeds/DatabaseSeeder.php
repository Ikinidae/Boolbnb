<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(ApartmentSeeder::class);
         $this->call(MessageSeeder::class);
         $this->call(VisitSeeder::class);
         $this->call(ServiceSeeder::class);
         $this->call(ApartmentServiceSeeder::class);
         $this->call(SponsorshipSeeder::class);
         $this->call(ApartmentSponsorshipSeeder::class);


    }
}
