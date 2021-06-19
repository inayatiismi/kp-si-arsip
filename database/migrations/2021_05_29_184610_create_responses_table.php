<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('response', function (Blueprint $table) {
            $table->integer('id_request');
            $table->integer('nomorberkas');
            $table->string('alamatsurat');
            $table->date('tanggalsurat');
            $table->string('perihal');
            $table->string('nomorpetunjuk');
            $table->string('status');
            $table->string('keterangan');
            $table->string('aksi');
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
        Schema::dropIfExists('response');
    }
}
