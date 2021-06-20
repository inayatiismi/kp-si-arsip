<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('status_id')->nullable();
            $table->string('nomor_berkas');
            $table->mediumText('alamat_penerima');
            $table->date('tanggal_keluar');
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
        Schema::dropIfExists('surat_keluars');
    }
}
