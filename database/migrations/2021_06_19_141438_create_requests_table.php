<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('surat_masuk_id')->nullable();
            $table->unsignedBigInteger('jenis_surat_id')->nullable();
            $table->mediumText('keterangan')->nullable();
            $table->timestamps();

            $table->index('surat_masuk_id');
            $table->index('jenis_surat_id');

            $table->foreign('surat_masuk_id')->references('id')->on('surat_masuk')->onDelete('CASCADE')->onUpdate('NO ACTION');
            $table->foreign('jenis_surat_id')->references('id')->on('jenis_surat')->onDelete('NO ACTION')->onUpdate('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
