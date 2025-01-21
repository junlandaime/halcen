<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('program_layanan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_program');
            $table->string('nama_banner');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->text('deskripsi_lengkap');
            $table->enum('tipe_kelas', ['online', 'offline', 'hybrid']);
            $table->string('durasi');
            $table->json('materi')->nullable();
            $table->json('manfaat')->nullable();
            $table->json('persyaratan')->nullable();
            $table->json('alur_proses')->nullable();
            $table->json('jalur_pelatihan')->nullable();
            $table->string('gambar_banner')->nullable();
            $table->string('icon_class')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_layanan');
    }
};
