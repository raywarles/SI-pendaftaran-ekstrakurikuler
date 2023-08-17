<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ekstrakurikuler_id')->unsigned();
            $table->foreign('ekstrakurikuler_id')->references('id')->on('ekstrakurikulers');
             $table->string('nama_kegiatan');
              $table->text('keterangan');
              $table->date('tanggal');
              $table->time('jam');
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
        Schema::dropIfExists('kegiatans');
    }
}
