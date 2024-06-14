<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbBookingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_booking', function (Blueprint $table) {
            $table->id('id_booking');
            $table->foreignId('id_cust')
                  ->constrained('tb_cust', 'id_cust');
            $table->foreignId('id_jasa')
                  ->constrained('tb_jasa', 'id_jasa')
                  ->onDelete('cascade');                              
            $table->time('jam_booking')->nullable(false);
            $table->date('tanggal_booking')->nullable(false);
            $table->string('metode_pembayaran')->nullable(false);
            $table->enum('val', ['Y', 'N']);
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
        Schema::dropIfExists('tb_booking');
    }
}
