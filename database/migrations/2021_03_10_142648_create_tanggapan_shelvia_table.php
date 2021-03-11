<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanggapanShelviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanggapan_shelvia', function (Blueprint $table) {
             $table->bigIncrements('id_tanggapan');
            $table->bigInteger('pengaduan_id')->unsigned();
            $table->bigInteger('petugas_id')->unsigned();
            $table->dateTime('tgl_tanggapan');
            $table->text('tanggapan');
            $table->foreign('pengaduan_id')
                    ->references('id_pengaduan')->on('pengaduan_shelvia')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('petugas_id')
                    ->references('id_petugas')->on('petugas_shelvia')
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
        Schema::dropIfExists('tanggapan_shelvia');
    }
}
