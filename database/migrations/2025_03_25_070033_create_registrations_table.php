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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('title')->constrained('program_layanan');
            $table->string('slug')->unique();
            $table->string('jadwal_pertemuan');
            $table->string('narahubung');
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->string('link')->nullable();
            $table->foreignId('program_batch_id')->nullable()->constrained('program_batch');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
