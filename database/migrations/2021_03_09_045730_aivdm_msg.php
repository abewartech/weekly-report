<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AivdmMsg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('aivdm_msg', function (Blueprint $table) {
        //     $table->bigInteger('msg_id');
        //     $table->longText('msg_text');
        //     $table->integer('msg_source');
        //     $table->tinyInteger('msg_decode_status');
        //     $table->timestamp('msg_received')->nullable();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('aivdm_msg');
    }
}
