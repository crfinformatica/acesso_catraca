<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaixaHeaderTable extends Migration
{
    public function up()
    {
        Schema::create('caixa_header', function (Blueprint $table) {
            $table->id(); // id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('iduser'); // Usuário que abriu o caixa
            $table->timestamp('datahora_abertura')->nullable();
            $table->dateTime('datahora_fechamento')->nullable();
            $table->unsignedBigInteger('idfilial');
            $table->date('datafechamento')->nullable();
            $table->decimal('total_bruto', 10, 2)->nullable();
            $table->decimal('total_desconto', 10, 2)->nullable();
            $table->decimal('total_acrescimo', 10, 2)->nullable();
            $table->decimal('total_liquido', 10, 2)->nullable();
            $table->string('formadepagamento', 100)->nullable();

            $table->timestamps(); // created_at e updated_at

            // Índices e chaves estrangeiras (opcional: adicione se as tabelas existirem)
            $table->index('iduser');
            $table->index('idfilial');
            // $table->foreign('iduser')->references('id')->on('users');
            // $table->foreign('idfilial')->references('id')->on('filiais');
        });
    }

    public function down()
    {
        Schema::dropIfExists('caixa_header');
    }
}
