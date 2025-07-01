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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal'); // ⛳ Gunakan date karena "tanggal" hanya tanggal, bukan datetime
            $table->time('jamKerja'); // ⛳ Gunakan time, karena ini tampaknya berisi jam kerja (bukan date)
            $table->string('namaProyek');
            $table->text('taskList')->nullable();;
            $table->date('deadlineTask'); // ⛳ Gunakan date jika ini hanya tanggal deadline
            $table->string('status')->nullable();;
            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
