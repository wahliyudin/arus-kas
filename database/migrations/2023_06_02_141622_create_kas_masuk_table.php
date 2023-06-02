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
            $table->id();
            $table->string('no');
            $table->date('tanggal');
            $table->unsignedBigInteger('siswa_id')->nullable();
            $table->unsignedBigInteger('pemasok_id')->nullable();
            $table->enum('dari', [1, 2, 3]);
            $table->string('keterangan');
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
