<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_data_donatur', function (Blueprint $table) {
            $table->id();

            // Relasi ke data_donatur
            $table->foreignId('data_donatur_id')->constrained('data_donatur')->onDelete('cascade');

            $table->string('nama_donatur');
            $table->string('email');
            $table->string('no_whatsapp');
            $table->string('kategori_donasi');
            $table->decimal('nominal', 15, 2);
            $table->string('metode_pembayaran');
            $table->string('status');
            $table->timestamp('tanggal_transaksi')->useCurrent();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_data_donatur');
    }
};
