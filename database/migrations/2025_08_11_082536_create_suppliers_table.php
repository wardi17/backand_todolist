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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id('SupplierID'); // sama seperti INT IDENTITY + PRIMARY KEY
            $table->string('NamaSupplier', 150); // NVARCHAR(150)
            $table->string('Alamat', 255)->nullable(); // NVARCHAR(255) nullable
            $table->string('Telepon', 20)->nullable(); // NVARCHAR(20)
            $table->string('Email', 100)->nullable(); // NVARCHAR(100)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
