<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
               $table->id('TransaksiID'); // Primary Key (INT IDENTITY)

            // Kolom tanggal dengan default GETDATE()
            $table->dateTime('Tanggal')
                  ->default(DB::raw('GETDATE()'));

            $table->string('JenisTransaksi', 20); // 'Pembelian' atau 'Penjualan'
            $table->string('Keterangan', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};
