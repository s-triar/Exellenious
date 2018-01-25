<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolHistoryStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_history_students', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_student');
            $table->foreign('id_student')->references('id')->on('students')->onDelete('restrict');
            $table->integer('id_school')->unsigned();
            $table->foreign('id_school')->references('id')->on('schools')->onDelete('restrict');
            $table->enum('tingat',['SD','SMP','SMA']);
            $table->smallInteger('kelas');
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
        Schema::dropIfExists('school_history_students');
    }
}
