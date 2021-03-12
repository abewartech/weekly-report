<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AisDestination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('ais_destination', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('ship_id');
        //     $table->string('destination');
        //     $table->string('eta');
        //     $table->dateTime('updated_at')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('ais_destination');
    }
}
