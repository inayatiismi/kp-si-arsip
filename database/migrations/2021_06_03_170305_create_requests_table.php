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
            $table->integer('id_requests');
            $table->integer('id_suratmasuk')->nullable();
            $table->integer('id_suratkeluar')->nullable();
            $table->string('nomorberkas');
            $table->string('jenissurat');
            $table->string('alamatsurat');
            $table->date('tanggalsurat');
            $table->string('perihal');
            $table->string('nomorpetunjuk');
            $table->string('status');
            $table->mediumText('keterangan')->nullable();
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
        Schema::dropIfExists('requests');
    }
}
