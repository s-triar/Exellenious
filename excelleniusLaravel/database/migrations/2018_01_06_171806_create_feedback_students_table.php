<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedbackStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedback_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_privateteacher');
            $table->foreign('id_privateteacher')->references('id')->on('privateteachers')->onDelete('restrict');
            $table->string('id_student');
            $table->foreign('id_student')->references('id')->on('students')->onDelete('restrict');
            $table->integer('rating')->unsigned();
            $table->string('komentar');
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
        Schema::dropIfExists('feedback_students');
    }
}
