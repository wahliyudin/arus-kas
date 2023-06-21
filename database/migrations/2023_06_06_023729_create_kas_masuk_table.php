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
        Schema::create('kas_masuk', function (Blueprint $table) {
            $table->string('kode', 6)->primary();
            $table->string('kode_akun', 11);
            $table->string('kode_jurnal', 11);
            $table->integer('siswa_id')->nullable();
            $table->integer('pemasok_id')->nullable();
            $table->integer('guru_id')->nullable();
            $table->enum('dari', [1, 2, 3, 4]);
            $table->date('tanggal');
            $table->string('keterangan', 30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_masuk');
    }
};
