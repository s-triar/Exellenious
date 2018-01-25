<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLearningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learnings', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('id_privateteacher');
            $table->foreign('id_privateteacher')->references('id')->on('privateteachers')->onDelete('restrict');
            $table->string('id_student');
            $table->foreign('id_student')->references('id')->on('students')->onDelete('restrict');
            $table->string('id_subject');
            $table->foreign('id_subject')->references('id')->on('subjects')->onDelete('restrict');
            $table->integer('id_schedule_privateteacher')->unsigned();
            $table->foreign('id_schedule_privateteacher')->references('id')->on('schedule_privateteachers')->onDelete('restrict');
            $table->date('tanggal');
            $table->boolean('paid');
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
        Schema::dropIfExists('learnings');
    }
}
