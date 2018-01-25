<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankQuestionTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_question_tests', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('restrict');
            $table->string('nama');
            $table->string('id_subject');
            $table->foreign('id_subject')->references('id')->on('subjects')->onDelete('restrict');
            $table->string('paket',1);
            $table->smallInteger('kelas');
            $table->string('tipe_soal');
            $table->string('url');
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
        Schema::dropIfExists('bank_question_tests');
    }
}
