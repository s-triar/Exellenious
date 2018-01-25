<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolHistoryPrivateteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_history_privateteachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_privateteacher');
            $table->foreign('id_privateteacher')->references('id')->on('privateteachers')->onDelete('restrict');
            $table->integer('id_school')->unsigned();
            $table->foreign('id_school')->references('id')->on('schools')->onDelete('restrict');
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
        Schema::dropIfExists('school_history_privateteachers');
    }
}
