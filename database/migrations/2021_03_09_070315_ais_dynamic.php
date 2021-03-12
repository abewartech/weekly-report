<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AisDynamic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('ais_dynamic', function (Blueprint $table) {
        //     $table->id();
        //     $table->integer('station_id');
        //     $table->integer('ship_id');
        //     $table->float('sog');
        //     $table->float('cog');
        //     $table->float('heading');
        //     $table->tinyInteger('turning_direction');
        //     $table->float('rot');
        //     $table->float('bearing');
        //     $table->float('nav_status');
        //     $table->decimal('latitude', 10, 8)->nullable();
        //     $table->decimal('longitude', 11, 8)->nullable();
        //     $table->tinyInteger('raim');
        //     $table->integer('msg_type');
        //     $table->integer('repeat_indicator');
        //     $table->integer('position_accuracy');
        //     $table->timestamp('created_at')->nullable();
        //     $table->timestamp('updated_at')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('ais_dynamic');
    }
}
