<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpertSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expert_subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_privateteacher');
            $table->foreign('id_privateteacher')->references('id')->on('privateteachers')->onDelete('restrict');
            $table->string('id_subject');
            $table->foreign('id_subject')->references('id')->on('subjects')->onDelete('restrict');
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
        Schema::dropIfExists('expert_subjects');
    }
}
