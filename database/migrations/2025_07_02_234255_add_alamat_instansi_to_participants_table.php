<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('participants', function (Blueprint $table) {
        $table->text('alamat_instansi')->nullable()->after('instansi');
    });
}

public function down()
{
    Schema::table('participants', function (Blueprint $table) {
        $table->dropColumn('alamat_instansi');
    });
}

};
