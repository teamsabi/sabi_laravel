<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumentasi_penyerahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_donasi_id')
                  ->constrained('kategori_donasi')
                  ->onDelete('cascade'); // Jika kategori dihapus, dokumentasi juga ikut terhapus
            $table->string('judul_dokumentasi');
            $table->date('tgl_penyerahan');
            $table->string('nama_penerima');
            $table->text('deskripsi');
            $table->string('bukti'); // simpan nama file gambar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumentasi_penyerahan');
    }
};
