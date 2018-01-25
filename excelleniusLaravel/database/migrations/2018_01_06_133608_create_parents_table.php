<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->string('id');
            $table->primary('id');
            $table->integer('auth_id')->unsigned();
            $table->foreign('auth_id')->references('id')->on('auths')->onDelete('restrict');
            $table->string('nama');
            $table->string('nomor_telp',15);
            $table->string('alamat');
            $table->string('url_foto')->nullable();
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
        Schema::dropIfExists('parents');
    }
}
