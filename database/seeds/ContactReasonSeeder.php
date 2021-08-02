<?php

use Illuminate\Database\Seeder;

class ContactReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ContactReason::class, 10)->create();
    }
}
