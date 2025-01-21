<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('program_batch', function (Blueprint $table) {
            $table->id();
            $table->foreignId('program_layanan_id')->constrained('program_layanan')->onDelete('cascade');
            $table->string('nama_batch');
            $table->integer('batch_ke');
            $table->date('tanggal_mulai_pendaftaran');
            $table->date('tanggal_selesai_pendaftaran');
            $table->date('tanggal_mulai_program');
            $table->date('tanggal_selesai_program');
            $table->integer('kuota');
            $table->integer('harga');
            $table->string('external_link')->nullable();
            $table->enum('status', ['draft', 'aktif', 'selesai'])->default('draft');
            $table->text('catatan_batch')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('program_batch');
    }
};
