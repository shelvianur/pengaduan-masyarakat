<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengaduanShelviaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengaduan_shelvia', function (Blueprint $table) {
            $table->bigIncrements('id_pengaduan');
            $table->bigInteger('masyarakat_id')->unsigned();
            $table->dateTime('tgl_pengaduan');
            $table->text('isi_laporan');
            $table->string('foto');
            $table->enum('status', ['0', 'proses', 'selesai']);
            $table->foreign('masyarakat_id')
                    ->references('id_masyarakat')->on('masyarakat_shelvia')
                    ->onDelete('cascade');
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
        Schema::dropIfExists('pengaduan_shelvia');
    }
}
