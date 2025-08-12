<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detailtransaksi', function (Blueprint $table) {
            $table->id('DetailID'); // INT IDENTITY(1,1) PRIMARY KEY

            $table->unsignedBigInteger('TransaksiID');
            $table->unsignedBigInteger('ProdukID');

            $table->integer('Jumlah');
            $table->decimal('Harga', 18, 2);

            // Laravel tidak punya method langsung untuk computed column,
            // nanti kita tambahkan lewat raw SQL
        });

        // Tambahkan kolom computed Subtotal (PERSISTED)
        DB::statement("
            ALTER TABLE detailtransaksi
            ADD Subtotal AS (Jumlah * Harga) PERSISTED
        ");

        // Tambahkan foreign key
        Schema::table('detailtransaksi', function (Blueprint $table) {
            $table->foreign('TransaksiID')
                  ->references('TransaksiID')
                  ->on('Transaksi')
                  ->onDelete('cascade');

            $table->foreign('ProdukID')
                  ->references('ProdukID')
                  ->on('Produk')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detailtransaksi');
    }
};
