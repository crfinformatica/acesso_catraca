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
    Schema::create('caixa', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('iduser');
        $table->timestamp('abertura');
        $table->timestamp('fechamento')->nullable();
        $table->decimal('valor_inicial', 10, 2)->nullable();
        $table->decimal('valor_final', 10, 2)->nullable();
        $table->timestamps();

        $table->foreign('iduser')->references('id')->on('users');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caixa');
    }
};
