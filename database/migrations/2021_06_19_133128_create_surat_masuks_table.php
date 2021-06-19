<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('nomor_berkas');
            $table->string('alamat_pengirim');
            $table->date('tanggal_masuk');
            $table->string('perihal');
            $table->string('nomor_petunjuk');
            $table->timestamps();

            $table->index('status_id');

            $table->foreign('status_id')->references('id')->on('statuses')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuks');
    }
}
