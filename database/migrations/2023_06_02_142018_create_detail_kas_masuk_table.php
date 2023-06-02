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
        Schema::create('detail_kas_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('no_kas_masuk');
            $table->string('kode_akun');
            $table->unsignedBigInteger('klasifikasi_id');
            $table->bigInteger('debet');
            $table->bigInteger('kredit');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kas_masuk');
    }
};
