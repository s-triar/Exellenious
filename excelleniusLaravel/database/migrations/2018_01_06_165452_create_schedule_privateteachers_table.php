<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulePrivateteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedule_privateteachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_privateteacher');
            $table->foreign('id_privateteacher')->references('id')->on('privateteachers')->onDelete('restrict');
            $table->integer('id_schedule_day')->unsigned();
            $table->foreign('id_schedule_day')->references('id')->on('schedule_days')->onDelete('restrict');
            $table->integer('id_schedule_hour')->unsigned();
            $table->foreign('id_schedule_hour')->references('id')->on('schedule_hours')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule_privateteachers');
    }
}
