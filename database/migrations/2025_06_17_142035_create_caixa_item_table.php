<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('caixa_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->dateTime('datetime');
            $table->unsignedBigInteger('idproduto');
            $table->decimal('valor', 10, 2);
            $table->decimal('desconto', 10, 2)->default(0);
            $table->decimal('acrescimo', 10, 2)->default(0);
            $table->decimal('valorapagar', 10, 2);
            $table->string('formadepagamento');
            $table->timestamps();

            // Exemplo de chave estrangeira, se quiser depois
            // $table->foreign('iduser')->references('id')->on('users');
            // $table->foreign('idproduto')->references('id')->on('produtos');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('caixa_item');
    }
};
