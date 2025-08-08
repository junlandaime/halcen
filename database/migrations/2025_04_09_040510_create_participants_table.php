<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('program_layanan_id')->nullable();
            $table->unsignedBigInteger('batch_id')->nullable();

            $table->foreign('program_layanan_id')->references('id')->on('program_layanan')->onDelete('cascade');
            $table->foreign('batch_id')->references('id')->on('program_batch')->onDelete('cascade');

            $table->string('nama');
            $table->string('email')->unique();
            $table->enum('kelamin', ['pria', 'wanita']);
            $table->unsignedTinyInteger('usia');

            $table->string('sapaan')->nullable();
            $table->string('wa', 20);

            $table->text('alamat_ktp')->nullable();

            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();

            $table->string('pendidikan')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('instansi')->nullable();

            $table->string('info_dari')->nullable();
            $table->string('info_lainnya')->nullable();

            $table->enum('pernah_mengikuti', ['Ya', 'Tidak'])->nullable();
            $table->string('batch_lama')->nullable();

            $table->enum('siap_mengikuti', ['Ya', 'Insyaallah diusahakan'])->nullable();

            $table->boolean('syarat')->default(false);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
