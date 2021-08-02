<?php

use Illuminate\Database\Seeder;

class ConnectionProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ConnectionProvider::class, 5)->create();
    }
}
