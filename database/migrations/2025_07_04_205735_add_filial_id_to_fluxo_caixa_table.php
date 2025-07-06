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
    Schema::table('fluxo_caixa', function (Blueprint $table) {
        $table->unsignedBigInteger('filial_id')->nullable()->after('id_caixa');

        // Se quiser criar a FK:
        $table->foreign('filial_id')->references('id')->on('filial')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('fluxo_caixa', function (Blueprint $table) {
        $table->dropForeign(['filial_id']);
        $table->dropColumn('filial_id');
    });
}
};
