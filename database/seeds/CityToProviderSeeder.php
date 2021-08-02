<?php

use Illuminate\Database\Seeder;

class CityToProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = \App\City::all();
        \App\ConnectionProvider::all()->each(function ($provider) use ($cities){
            $provider->cities()->attach(
                $cities->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
