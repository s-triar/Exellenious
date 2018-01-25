<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->integer('auth_admin_id')->unsigned();
            $table->foreign('auth_admin_id')->references('id')->on('auth_admins')->onDelete('restrict');
            $table->string('nama');
            $table->string('nomor_telp',15);
            $table->string('status');
            $table->string('divisi');
            $table->string('alamat');
            $table->string('url_foto');
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
        Schema::dropIfExists('admins');
    }
}
