<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fluxo_caixa', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('iduser');
            $table->string('descricao');
            $table->decimal('valor', 10, 2);
            $table->enum('tipo', ['ENTRADA', 'SAIDA']);
            $table->string('categoria')->nullable();
            $table->dateTime('data_movimento');
            $table->string('formadepagamento')->nullable();
            $table->unsignedBigInteger('id_caixa')->nullable();
            $table->timestamps();

            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('id_caixa')->references('id')->on('caixa_header')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fluxo_caixa');
    }
};
