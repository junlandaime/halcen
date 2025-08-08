<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // migration file
public function up()
{
    Schema::table('program_batch', function (Blueprint $table) {
        $table->string('whatsapp_group_link')->nullable()->after('external_link');
    });
}

public function down()
{
    Schema::table('program_batch', function (Blueprint $table) {
        $table->dropColumn('whatsapp_group_link');
    });
}

};
