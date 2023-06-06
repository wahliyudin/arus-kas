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
        Schema::create('kas_keluar', function (Blueprint $table) {
            $table->string('kode')->primary();
            $table->string('kode_akun');
            $table->string('kode_jurnal');
            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->unsignedBigInteger('pemasok_id')->nullable();
            $table->unsignedBigInteger('guru_id')->nullable();
            $table->enum('penerima', [1, 2, 3]);
            $table->date('tanggal');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_keluar');
    }
};
