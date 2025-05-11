<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('data_donatur', function (Blueprint $table) {
            $table->id();

            // Relasi ke user (jika ada user yang login)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');

            // Relasi ke kategori donasi
            $table->foreignId('kategori_donasi_id')->constrained('kategori_donasi')->onDelete('cascade');

            // Relasi ke midtrans_transactions
            $table->foreignId('transaction_id')->nullable()->constrained('midtrans_transactions')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('data_donatur');
    }
};
