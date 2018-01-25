<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrivateteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privateteachers', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->integer('auth_id')->unsigned();
            $table->foreign('auth_id')->references('id')->on('auths')->onDelete('restrict');
            $table->string('nama');
            $table->string('nip')->unique();
            $table->string('nidn')->unique()->nullable();
            $table->date('tanggal_lahir');
            $table->string('nomor_telp',15);
            $table->string('alamat');
            $table->string('universitas');
            $table->string('fakultas');
            $table->string('jurusan_kuliah');
            $table->year('tahun_masuk');
            $table->year('tahun_lulus');
            $table->integer('id_work_status')->unsigned();
            $table->foreign('id_work_status')->references('id')->on('work_statuss')->onDelete('restrict');
            $table->string('url_foto');
            $table->boolean('isBreak');
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
        Schema::dropIfExists('privateteacher');
    }
}
