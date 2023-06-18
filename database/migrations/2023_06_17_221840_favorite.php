<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favorite', function (Blueprint $table) {
            $table->id('id_favorite');
            $table->unsignedBigInteger('id_pembeli');
            $table->unsignedBigInteger('id_produk');
            $table->timestamps();

            // Add the foreign key constraints
            $table->foreign('id_pembeli')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_produk')->references('id_produk')->on('produk')->onDelete('cascade');

            // Add unique constraints
            $table->unique(['id_pembeli', 'id_produk']);
        }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
