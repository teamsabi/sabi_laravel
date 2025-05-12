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
        Schema::create('kategori_donasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade');
            $table->string('judul_donasi');
            $table->string('gambar');
            $table->text('deskripsi');
            $table->decimal('target_dana', 15, 2);
            $table->integer('jumlah_donatur')->default(0);
            $table->decimal('donasi_terkumpul', 15, 2)->default(0);
            $table->date('dedline');
            $table->timestamp('tanggal_buat')->useCurrent();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategori_donasi');
    }
};

