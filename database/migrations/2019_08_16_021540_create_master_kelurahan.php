<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterKelurahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_kelurahan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_kecamatan');
            $table->string("nama_kelurahan");
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_kecamatan')->references('id')->on('m_kecamatan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_kelurahan');
    }
}
