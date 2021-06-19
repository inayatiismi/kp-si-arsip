<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratmasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratmasuk', function (Blueprint $table) {
            $table->integer('id_suratmasuk');
            $table->string('nomorberkas');
            $table->string('alamatpengirim');
            $table->date('tanggalmasuk');
            $table->string('perihal');
            $table->string('nomorpetunjuk');
            $table->enum('status', ['proses', 'sukses', 'gagal'])->default('proses');
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
        Schema::dropIfExists('suratmasuk');
    }
}
