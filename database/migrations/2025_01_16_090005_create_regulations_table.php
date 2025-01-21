<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('regulations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regulation_category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('number');
            $table->year('year');
            $table->text('description');
            $table->date('enacted_date');
            $table->string('external_link')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('regulations');
    }
};
