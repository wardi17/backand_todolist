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
        Schema::create('stokproduk', function (Blueprint $table) {
            $table->id('StokID');
            $table->unsignedBigInteger('ProdukID');
            $table->integer('Jumlah')->default(0);
            $table->string('LokasiGudang',100);
            $table->timestamps();
             // Foreign keys
            $table->foreign('ProdukID')
                  ->references('ProdukID')
                  ->on('produk')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stokproduk');
    }
};
