<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbJasaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jasa', function (Blueprint $table) {
            $table->id('id_jasa');
            $table->string('nama_jasa')->nullable(false);
            $table->integer('harga_jasa')->nullable(false);
            $table->string('deskripsi_jasa')->nullable(false);
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
        Schema::dropIfExists('tb_jasa');
    }
}
