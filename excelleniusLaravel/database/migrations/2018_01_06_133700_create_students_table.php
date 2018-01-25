<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->integer('auth_id')->unsigned();
            $table->foreign('auth_id')->references('id')->on('auths')->onDelete('restrict');
            $table->string('nama');
            $table->enum('jenis_kelamin',['laki-laki', 'perempuan']);
            $table->string('nis')->nullable();
            $table->date('tanggal_lahir');
            $table->string('nomor_telp',15);
            $table->string('alamat');
            $table->string('id_parent');
            $table->foreign('id_parent')->references('id')->on('parents')->onDelete('restrict');
            $table->string('url_foto')->nullable();
            $table->string('universitas')->nullable();
            $table->boolean('vip');
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
        Schema::dropIfExists('students');
    }
}
