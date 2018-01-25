<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_classrooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_classroom')->unsigned();
            $table->foreign('id_classroom')->references('id')->on('classrooms')->onDelete('restrict');
            $table->string('id_student');
            $table->foreign('id_student')->references('id')->on('students')->onDelete('restrict');
            $table->smallInteger('no_absen');
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
        Schema::dropIfExists('member_classrooms');
    }
}
