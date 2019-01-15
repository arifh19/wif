<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_transaksis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('transaksi_id');
            $table->unsignedInteger('barang_id');
            $table->foreign('transaksi_id')->references('id')->on('transaksis')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('barang_id')->references('id')->on('barangs')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->unsignedInteger('kuantitas');
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
        Schema::dropIfExists('barang_transaksis');
    }
}
