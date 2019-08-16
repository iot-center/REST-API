<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMLantai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_lantai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_gedung');
            $table->string('nama_lantai');
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_gedung')->references('id')->on('m_gedung');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_lantai');
    }
}
