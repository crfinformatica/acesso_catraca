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
    Schema::create('produtos', function (Blueprint $table) {
        $table->increments('idproduto');       // chave primária personalizada
        $table->string('descricao');
        $table->decimal('valor', 10, 2);
        $table->unsignedBigInteger('user_ins')->nullable();
        $table->timestamp('data_ins')->nullable();
        $table->unsignedBigInteger('user_upd')->nullable();
        $table->timestamp('data_upd')->nullable();

        $table->timestamps();  // created_at e updated_at, opcional
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
