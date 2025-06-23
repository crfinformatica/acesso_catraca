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
    Schema::table('caixa_item', function (Blueprint $table) {
        $table->unsignedBigInteger('qrcode_id')->nullable()->after('iduser');

        // Se quiser garantir integridade:
        $table->foreign('qrcode_id')->references('id')->on('qrcodes')->onDelete('set null');
    });
}

public function down()
{
    Schema::table('caixa_item', function (Blueprint $table) {
        $table->dropForeign(['qrcode_id']);
        $table->dropColumn('qrcode_id');
    });
}

};
