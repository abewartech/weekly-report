<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BstMbs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bst_mbs', function (Blueprint $table) {
            $table->id();
            $table->integer('station_id');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->float('heading');
            $table->float('sog');
            $table->float('cog');
            $table->timestamp('updated_at')->nullable();
            $table->string('time_stamp', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bst_mbs');
    }
}
