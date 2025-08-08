<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUniqueConstraintOnParticipantsTable extends Migration
{
    public function up()
    {
        Schema::table('participants', function (Blueprint $table) {
            // Hapus constraint unik lama di kolom `wa`
            $table->dropUnique('participants_wa_unique');

            // Tambahkan constraint unik baru: kombinasi wa + batch_id
            $table->unique(['wa', 'batch_id']);
        });
    }

    public function down()
    {
        Schema::table('participants', function (Blueprint $table) {
            // Balik ke constraint lama
            $table->dropUnique(['wa', 'batch_id']);
            $table->unique('wa');
        });
    }
}
