<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->unsignedBigInteger('id_penjual');
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_produk', 100);
            $table->integer('harga_produk');
            $table->string('berat_produk', 255);
            $table->string('foto_produk', 255);
            $table->text('deskripsi_produk');
            $table->integer('stok_produk');
            $table->timestamps();

            $table->foreign('id_penjual')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            $table->dropForeign(['id_penjual']);
            $table->dropForeign(['id_kategori']);
        });

        Schema::dropIfExists('produk');
    }
}
