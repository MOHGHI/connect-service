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
        $this->call(CitySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(ContactReasonSeeder::class);
        $this->call(ConnectionProviderSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(ConditionSeeder::class);
        $this->call(CancelReasonSeeder::class);
        $this->call(CityToProviderSeeder::class);

    }
}
