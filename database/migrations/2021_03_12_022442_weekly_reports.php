<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class WeeklyReports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weekly_reports', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('position_id');
            $table->string('roadblock')->nullable();
            $table->string('issue')->nullable();
            $table->string('improvement')->nullable();
            $table->string('recomendation')->nullable();
            $table->longText('newdevelop')->nullable();
            $table->longText('additionalreq')->nullable();
            $table->longText('developpipeline')->nullable();
            $table->longText('activitiespastweek');
            $table->longText('activitiesnextweek');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('weekly_reports');
    }
}
