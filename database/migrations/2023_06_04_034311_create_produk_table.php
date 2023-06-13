<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->id('id_produk');
            $table->unsignedBigInteger('id_penjual');
            $table->unsignedBigInteger('id_kategori');
            $table->string('nama_produk', 100);
            $table->unsignedBigInteger('harga_produk');
            $table->string('berat_produk', 255);
            $table->string('foto_produk', 255);
            $table->text('deskripsi_produk');
            $table->unsignedInteger('stok_produk');
            $table->timestamps();

            // Add the foreign key constraints
            $table->foreign('id_penjual')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');

            // Add unique constraints
            $table->unique('harga_produk');
            $table->unique('stok_produk');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produk', function (Blueprint $table) {
            // Drop the foreign key constraints
            $table->dropForeign(['id_penjual']);
            $table->dropForeign(['id_kategori']);

            // Drop the unique constraints
            $table->dropUnique(['harga_produk']);
            $table->dropUnique(['stok_produk']);
        });

        Schema::dropIfExists('produk');
    }
}
