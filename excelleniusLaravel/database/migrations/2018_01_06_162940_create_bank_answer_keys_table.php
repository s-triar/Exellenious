<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBankAnswerKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_answer_keys', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->string('id_bank_question_test');
            $table->foreign('id_bank_question_test')->references('id')->on('bank_question_tests')->onDelete('restrict');
            $table->string('id_admin');
            $table->foreign('id_admin')->references('id')->on('admins')->onDelete('restrict');
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
        Schema::dropIfExists('bank_answer_keys');
    }
}
