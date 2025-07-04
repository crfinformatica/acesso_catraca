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
            // Cria a coluna caixa_header_id do tipo unsignedBigInteger (padrão para id no Laravel)
            $table->unsignedBigInteger('caixa_header_id')->after('id'); // Ajuste 'after' conforme preferir

            // Define a foreign key para caixa_header(id)
            $table->foreign('caixa_header_id')->references('id')->on('caixa_header')->onDelete('cascade');
            // onDelete('cascade') para deletar os itens se o cabeçalho for deletado (opcional)
        });
    }

    public function down()
    {
        Schema::table('caixa_item', function (Blueprint $table) {
            // Remove a foreign key e a coluna no rollback
            $table->dropForeign(['caixa_header_id']);
            $table->dropColumn('caixa_header_id');
        });
    }
};
