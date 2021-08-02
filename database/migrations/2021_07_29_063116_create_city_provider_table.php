<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCityProviderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_provider', function (Blueprint $table) {
//            $table->id();
//            $table->integer('city_id');
//            $table->string('provider_id');

            $table->foreignId('city_id')->constrained();
            $table->foreignId('connection_provider_id')->constrained('connection_providers');
            $table->primary(['city_id', 'connection_provider_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_provider');
    }
}
