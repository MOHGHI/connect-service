<?php

use Illuminate\Database\Seeder;

class CancelReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\CancelReason::class, 10)->create();

    }
}
