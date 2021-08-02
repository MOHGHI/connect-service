<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('caller');
            $table->integer('phone');
            $table->string('comment');

            $table->foreignId('city_id')->constrained();
            $table->foreignId('address_id')->constrained();
            $table->foreignId('operator_id')->constrained('connection_providers');
            $table->foreignId('offer_id')->constrained();
            $table->foreignId('cancel_id')->nullable()->constrained('cancel_reasons');
            $table->foreignId('reason_id')->constrained('contact_reasons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
