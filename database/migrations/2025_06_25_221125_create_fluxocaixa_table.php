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
        Schema::create('fluxocaixa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idfilial');
            $table->enum('tipo', ['entrada', 'saida']);
            $table->decimal('valor', 10, 2);
            $table->string('descricao')->nullable();
            $table->timestamp('dataregistro')->nullable();
            $table->timestamps();

            // Foreign key para tabela filiais, se ela existir
            // $table->foreign('idfilial')->references('id')->on('filiais')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('fluxocaixa');
    }
};