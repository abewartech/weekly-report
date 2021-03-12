<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AisStatic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ais_static', function (Blueprint $table) {
            $table->id();
            $table->integer('mmsi')->unique();
            $table->string('callsign', 20)->nullable();
            $table->string('vessel_name', 100)->nullable();
            $table->string('imo')->nullable();
            $table->integer('ship_type')->nullable();
            $table->string('type_name')->nullable();
            $table->string('type_detail')->nullable();
            $table->integer('gt')->nullable();
            $table->integer('dwt')->nullable();
            $table->float('lo')->nullable();
            $table->float('be')->nullable();
            $table->integer('year_built')->nullable();
            $table->string('home_port')->nullable();
            $table->string('country')->nullable();
            $table->float('dimension_a')->nullable();
            $table->float('dimension_b')->nullable();
            $table->float('dimension_c')->nullable();
            $table->float('dimension_d')->nullable();
            $table->integer('fix_type')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ais_static');
    }
}
