<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFotoShelviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foto_shelvia', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pengaduan_id')->unsigned();
            $table->string('foto');
            $table->foreign('pengaduan_id')
                    ->references('id_pengaduan')->on('pengaduan_shelvia')
                    ->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('foto_shelvia');
    }
}
