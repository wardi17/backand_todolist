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
        Schema::create('produk', function (Blueprint $table) {
          $table->id('ProdukID'); // Primary Key auto increment
            $table->string('NamaProduk', 150);
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('SupplierID')->nullable();
            $table->decimal('HargaBeli', 18, 2);
            $table->decimal('HargaJual', 18, 2);
            $table->string('Satuan', 50)->nullable();
            $table->boolean('Status')->default(1); // BIT DEFAULT 1
            $table->timestamps(); // created_at & updated_at

            // Foreign keys
            $table->foreign('id')
                  ->references('id')
                  ->on('Kategori')
                  ->onDelete('cascade');

            $table->foreign('SupplierID')
                  ->references('SupplierID')
                  ->on('Suppliers')
                  ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
