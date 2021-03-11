<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetugasShelviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas_shelvia', function (Blueprint $table) {
            $table->bigIncrements('id_petugas');
            $table->string('nama_petugas');
            $table->string('username');
            $table->string('password');
            $table->string('telp', 13);
            $table->string('email');
            $table->enum('level', ['admin', 'petugas']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('petugas_shelvia');
    }
}
