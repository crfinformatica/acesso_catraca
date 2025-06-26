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
        Schema::create('acessos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('qrcode_id');
            $table->timestamp('data_hora')->nullable();
            $table->timestamps();

            // Foreign keys (ajuste os nomes das tabelas se forem diferentes)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('qrcode_id')->references('id')->on('qrcodes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('acessos');
    }
};