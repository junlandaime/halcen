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
        // Membuat tabel registration_forms
        Schema::create('registration_forms', function (Blueprint $table) {
            $table->id();

            // Relasi dengan program_batch
            $table->unsignedBigInteger('program_batch_id');
            $table->foreign('program_batch_id')->references('id')->on('program_batch')->onDelete('cascade');

            // Kolom-kolom lainnya untuk tabel registration_forms
            $table->string('title'); // Nama title dari form
            $table->string('slug')->unique(); // Slug unik untuk URL
            $table->string('jadwal_pertemuan');
            $table->string('narahubung');
            $table->boolean('is_active')->default(true); // Status aktif
            $table->integer('order')->default(0); // Order untuk urutan
            $table->string('link')->nullable(); // Link opsional
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak perlu drop kolom program_layanan_id karena tidak ditambahkan oleh migrasi ini
        Schema::dropIfExists('registration_forms');
    }
};
