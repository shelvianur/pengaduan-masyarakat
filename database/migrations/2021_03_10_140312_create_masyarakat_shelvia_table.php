<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasyarakatShelviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masyarakat_shelvia', function (Blueprint $table) {
            $table->bigIncrements('id_masyarakat');
            $table->char('nik', 16);
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->string('telp');
            $table->string('email');
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
        Schema::dropIfExists('masyarakat_shelvia');
    }
}
