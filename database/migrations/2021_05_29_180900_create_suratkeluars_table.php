<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratkeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suratkeluar', function (Blueprint $table) {
            
            $table->integer('id_suratkeluar');
            $table->integer('nomorberkas');
            $table->string('alamatpenerima');
            $table->date('tanggalkeluar');
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
        Schema::dropIfExists('suratkeluar');
    }
}
