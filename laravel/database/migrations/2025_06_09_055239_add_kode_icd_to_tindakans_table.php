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
    Schema::table('tindakans', function (Blueprint $table) {
        $table->string('kode_icd', 20)->nullable()->after('nama_tindakan');
    });
}

public function down()
{
    Schema::table('tindakans', function (Blueprint $table) {
        $table->dropColumn('kode_icd');
    });
}
};
