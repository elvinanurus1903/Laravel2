<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
           $table->bigIncrements('id_barang');
           $table->unsignedBigInteger('ruangan_id');
           $table->string('nama_barang', 50);
           $table->bigInteger('total');
           $table->bigInteger('broken');
           $table->unsignedBigInteger('created_by');
           $table->unsignedBigInteger('updated_by');
           $table->string('image');
           $table->timestamps();

           $table->foreign('ruangan_id')->references('id_ruangan')->on('ruangan')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
           $table->foreign('created_by')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->foreign('updated_by')->references('id')->on('users')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('barang');
    }
}
