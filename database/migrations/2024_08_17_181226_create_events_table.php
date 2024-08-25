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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail')->nullable();
            $table->string('judul');
            $table->string('tema');
            $table->date('tanggal_dilaksanakan');
            $table->date('tanggal_akhir_pendaftaran');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->string('lokasi');
            $table->decimal('harga_tiket_masuk', 8, 2);
            $table->text('kegiatan');
            $table->integer('kuota');
            $table->text('deskripsi')->nullable();
            $table->string('link_pendaftaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
